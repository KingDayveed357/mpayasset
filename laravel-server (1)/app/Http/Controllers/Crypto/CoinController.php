<?php


namespace App\Http\Controllers\Crypto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use App\Services\CryptoPriceService;
use Illuminate\Support\Facades\Hash;

class CoinController extends Controller
{
    protected $cryptoPriceService;

    // Define supported cryptocurrencies
    protected $supportedCryptos = [
        'bitcoin' => 'BTC',
        'ethereum' => 'ETH',
        'tron' => 'TRX',
        'dogecoin' => 'DOGE',
        'usd-coin' => 'USDC',
        'tether' => 'USDT',
        'binancecoin' => 'BNB',
    ];

    public function __construct(CryptoPriceService $cryptoPriceService)
    {
        $this->cryptoPriceService = $cryptoPriceService;
    }

    public function showSendForm(Request $request, $cryptoType)
    {
        if (!array_key_exists($cryptoType, $this->supportedCryptos)) {
            abort(404, "Cryptocurrency not supported");
        }

        // Fetch cryptocurrency data if needed
        $cryptoData = [
            'name' => ucfirst($cryptoType),
            'symbol' => $this->supportedCryptos[$cryptoType],
            'iconPath' => "../assets/images/svg/{$cryptoType}.svg", // Assumes icons are named by crypto type
        ];

        return view('send.show', compact('cryptoData', 'cryptoType'));
    }

    public function fetchCryptoPrice(Request $request, $cryptoType)
    {
        // Initial log to indicate the method has been called
        Log::info('fetchCryptoPrice method called with cryptoType: ' . $cryptoType);
        
        // Check if the provided cryptocurrency is supported
        if (!array_key_exists($cryptoType, $this->supportedCryptos)) {
            Log::warning('Unsupported cryptocurrency type: ' . $cryptoType);
            return response()->json(['error' => 'Unsupported cryptocurrency'], 400);
        }
    
        // Fetch crypto price
        try {
            Log::info('Attempting to fetch price for cryptoType: ' . $cryptoType);
            $cryptoPrice = $this->cryptoPriceService->getPrice($cryptoType);
    
            if (is_null($cryptoPrice)) {
                Log::error('Failed to fetch price for ' . $cryptoType);
                return response()->json(['error' => 'Unable to fetch price'], 500);
            }
    
            // Log fetched price
            Log::info('Fetched price for ' . $cryptoType . ': ' . $cryptoPrice);
    
            // Calculate equivalent USD value
            $amount = $request->input('amount', 1); 
            $equivalentUsd = $cryptoPrice * $amount;
            Log::info('Calculated equivalent USD value: ' . $equivalentUsd . ' for amount: ' . $amount);
    
            return response()->json([
                'price' => $cryptoPrice,
                'equivalent_in_usd' => $equivalentUsd,
            ]);
    
        } catch (\Exception $e) {
            // Log any unexpected errors
            Log::error('An error occurred while fetching price for ' . $cryptoType . ': ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
    

    public function processSend(Request $request, $cryptoType)
    {
        if (!array_key_exists($cryptoType, $this->supportedCryptos)) {
            abort(404, "Cryptocurrency not supported");
        }
    
        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
            'amount' => 'required|numeric',
            'pin_1' => 'required|numeric',
            'pin_2' => 'required|numeric',
            'pin_3' => 'required|numeric',
            'pin_4' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $enteredPin = $request->input('pin_1') . $request->input('pin_2') . $request->input('pin_3') . $request->input('pin_4');
        $user = Auth::user();
        $balanceField = strtolower("{$cryptoType}_balance") ; // Dynamic balance field (e.g., bitcoin_balance)
        Log::info('Balance field being used: ' . $balanceField);
    
        if (!Hash::check($enteredPin, $user->pin)) {
            return back()->with('error_modal', 'Incorrect PIN entered.');
        }
    
        if ($user->$balanceField < $request->amount) {
            return redirect()->back()->with('error_modal', 'Insufficient balance.');
        }
    
         

        // Fetch the current price of the cryptocurrency
        $cryptoPrice = $this->cryptoPriceService->getPrice($cryptoType);
    
        if (!$cryptoPrice) {
            return redirect()->back()->with('error_modal', 'Error fetching coin price.');
        }
    
        // Calculate the equivalent value in USD (or other currency as needed)
        $amountInUSD = $request->amount * $cryptoPrice;
    
        // Deduct the amount from the user's coin balance
        $user->$balanceField -= $request->amount;
        $user->save();
    
        // Generate a unique transaction reference using the symbol of the selected cryptocurrency
        $transactionReferencePrefix = strtolower($this->supportedCryptos[$cryptoType]) . '_txn_';
        $transactionReference = uniqid($transactionReferencePrefix);
    
        // Create a transaction record
        Transaction::create([
            'userid' => $user->userid,
            'crypto_type' => $cryptoType,
            'amount' => $request->amount,
            'crypto_amount' => $amountInUSD, // Store the equivalent value in USD
            'recipient_address' => $request->address,
            'status' => 'pending',
            'transaction_type' => 'debit',
            'transaction_reference' => $transactionReference,
            'date' => now()->addHour(),
            'method' => 'withdraw'
        ]);
    
        return redirect()->route('send.show', ['cryptoType' => $cryptoType])->with('success_modal', "{$cryptoType} sent successfully!");
    }
    
    
}
