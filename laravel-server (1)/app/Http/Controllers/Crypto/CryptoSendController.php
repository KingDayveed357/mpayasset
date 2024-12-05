<?php

namespace App\Http\Controllers\Crypto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Services\CryptoPriceService;
use App\Models\Transaction;

class CryptoSendController extends Controller
{
    protected $cryptoPriceService;

    // Inject the CryptoPriceService
    public function __construct(CryptoPriceService $cryptoPriceService)
    {
        $this->cryptoPriceService = $cryptoPriceService;
    }

    public function sendCrypto(Request $request)
{
    // Validate the request
    $validator = Validator::make($request->all(), [
        'currency' => 'required|string|max:10',
        'amount' => 'required|numeric',
        'address' => 'required|string',
        'pin_1' => 'required|digits:1',
        'pin_2' => 'required|digits:1',
        'pin_3' => 'required|digits:1',
        'pin_4' => 'required|digits:1',
    ]);

    // Check validation
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Combine the PIN
    $enteredPin = $request->input('pin_1') . $request->input('pin_2') . $request->input('pin_3') . $request->input('pin_4');

    // Fetch the authenticated user
    $user = Auth::user();

    // Verify user's PIN using the Hash facade
    if (!Hash::check($enteredPin, $user->pin)) {
        return back()->with('error_modal', 'Incorrect PIN entered.');
    }

    \Log::info('Authenticated User ID:', ['userid' => $user->userid]);

    // Fetch the current price of the selected cryptocurrency
    $currency = strtolower($request->input('currency'));
    $cryptoPrice = $this->cryptoPriceService->getPrice($currency);

    if (!$cryptoPrice) {
        return back()->with('error_modal', 'Unable to fetch the current price for the selected cryptocurrency.');
    }

    // Calculate the total amount in the selected currency's value
    $amountToDebit = $request->amount;

    // Get the corresponding balance for the selected cryptocurrency
    $cryptoBalanceField = $currency . '_balance'; // Example: 'btc_balance', 'eth_balance', etc.
    $userBalance = $user->{$cryptoBalanceField}; // Access user's crypto balance dynamically

    // Check if the user has sufficient balance
    if ($userBalance < $amountToDebit) {
        return back()->with('error_modal', 'Insufficient ' . strtoupper($currency) . ' balance for this transaction.');
    }

    // Deduct the amount from the user's cryptocurrency balance
    $user->{$cryptoBalanceField} -= $amountToDebit;

    if ($user->save()) {
        try {
            // Create transaction data
            $transactionData = [
                'userid' => $user->userid,
                'crypto_type' => $currency,
                'amount' => $request->amount,
                'crypto_amount' => $amountToDebit,
                'recipient_address' => $request->address,
                'status' => 'completed',
                'transaction_reference' => uniqid('txn_'),
                'transaction_type' => 'debit'
            ];
            \Log::info('Attempting transaction creation:', $transactionData);
    
            // Create the transaction
            $transaction = Transaction::create($transactionData);
            if (!$transaction) {
                return back()->with('error_modal', 'Transaction creation failed due to unknown reasons.');
            }
        } catch (\Exception $e) {
            \Log::error('Failed to create transaction: ' . $e->getMessage());
            return back()->with('error_modal', 'Failed to insert into the transaction table.');
        }

        return back()->with('success_modal', 'Transaction completed successfully. Amount debited: ' . $amountToDebit);
    }

    // Handle failure to save user balance
    return back()->with('error_modal', 'Failed to complete the transaction. Please try again.');
}


    public function index()
    {
        // Fetching crypto data from the CoinGecko API for specified cryptocurrencies
        $response = Http::timeout(30)->get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => 'bitcoin,ethereum,tether,binancecoin,dogecoin,tron,usd-coin',
            'vs_currencies' => 'usd',
            'include_24hr_change' => 'true',
            'include_market_cap' => 'false',
            'include_last_updated_at' => 'true',
        ]);

        $cryptos = [];

        // Handle API response
        if ($response->successful()) {
            $cryptoData = $response->json();
            \Log::info('CoinGecko Response:', $cryptoData);

            // Map data to required format
            foreach (['bitcoin', 'ethereum', 'tether', 'binancecoin', 'dogecoin', 'tron', 'usd-coin'] as $crypto) {
                if (isset($cryptoData[$crypto])) {
                    $cryptos[strtolower($crypto)] = [
                        'price' => $cryptoData[$crypto]['usd'] ?? 0,
                        'symbol' => strtoupper($crypto),
                        'change_24h' => $cryptoData[$crypto]['usd_24h_change'] ?? 0,
                        'img' => 'https://assets.coingecko.com/coins/images/' . $this->getImageId($crypto) . '/large/' . $this->getImageFileName($crypto),
                        'network' => $this->getNetworkName($crypto),
                    ];
                }
            }
        } else {
            \Log::error('CoinGecko API failed to fetch data');
            // Fallback data
            foreach (['bitcoin', 'ethereum', 'tether', 'binancecoin', 'dogecoin', 'tron', 'usd-coin'] as $crypto) {
                $cryptos[strtolower($crypto)] = [
                    'price' => 0,
                    'symbol' => strtoupper($crypto),
                    'change_24h' => 0,
                    'img' => '',
                    'network' => '',
                ];
            }
        }

        // Pass data to the view
        return view('crypto-send', compact('cryptos'));
    }

    // Helper functions
    private function getImageId($crypto)
    {
        $imageIds = [
            'bitcoin' => '1',
            'ethereum' => '279',
            'tether' => '325',
            'binancecoin' => '825',
            'dogecoin' => '5',
            'tron' => '1094',
            'usd-coin' => '6319',
        ];
        return $imageIds[strtolower($crypto)] ?? '';
    }

    private function getImageFileName($crypto)
    {
        $imageFiles = [
            'bitcoin' => 'bitcoin.png',
            'ethereum' => 'ethereum.png',
            'tether' => 'Tether-logo.png',
            'binancecoin' => 'binance-coin-logo.png',
            'dogecoin' => 'dogecoin.png',
            'tron' => 'tron-logo.png',
            'usd-coin' => 'USD_Coin_icon.png',
        ];
        return $imageFiles[strtolower($crypto)] ?? '';
    }

    private function getNetworkName($crypto)
    {
        $networkNames = [
            'bitcoin' => 'Bitcoin',
            'ethereum' => 'Ethereum',
            'tether' => 'Tether (Ethereum)',
            'binancecoin' => 'Binance Smart Chain',
            'dogecoin' => 'Dogecoin',
            'tron' => 'Tron',
            'usd-coin' => 'USD Coin',
        ];
        return $networkNames[strtolower($crypto)] ?? '';
    }
}
