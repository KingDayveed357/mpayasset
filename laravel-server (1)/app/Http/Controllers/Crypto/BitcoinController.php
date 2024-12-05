<?php

namespace App\Http\Controllers\Crypto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use App\Services\CryptoPriceService;

class BitcoinController extends Controller
{
    protected $cryptoPriceService;

    public function __construct(CryptoPriceService $cryptoPriceService)
    {
        $this->cryptoPriceService = $cryptoPriceService;
    }

    public function fetchBitcoinPrice(Request $request)
    {
        Log::info('Fetching Bitcoin price');
        $bitcoinPrice = $this->cryptoPriceService->getPrice('bitcoin');

        if (is_null($bitcoinPrice)) {
            Log::error('Failed to fetch Bitcoin price');
            return response()->json(['error' => 'Unable to fetch Bitcoin price'], 500);
        }

        $amount = $request->input('amount', 1); // Default to 1 BTC if not provided
        $equivalentInUsd = $bitcoinPrice * $amount;

        return response()->json([
            'price' => $bitcoinPrice,
            'equivalent_in_usd' => $equivalentInUsd,
        ]);
    }

    public function sendBitcoin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
            'address' => 'required|string|exists:users,crypto_address',
            'pin_1' => 'required|digits:1',
            'pin_2' => 'required|digits:1',
            'pin_3' => 'required|digits:1',
            'pin_4' => 'required|digits:1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $enteredPin = $request->input('pin_1') . $request->input('pin_2') . $request->input('pin_3') . $request->input('pin_4');
        $user = Auth::user();

        if (!Hash::check($enteredPin, $user->pin)) {
            return back()->with('error_modal', 'Incorrect PIN entered.');
        }

        $recipientAddress = $request->input('address');
        $recipient = User::where('crypto_address', $recipientAddress)->where('id', '!=', $user->id)->first();

        if (!$recipient) {
            return back()->with('error_modal', 'The recipient address does not exist or belongs to you.');
        }

        $amountToSend = $request->input('amount');
        $bitcoinPrice = $this->cryptoPriceService->getPrice('bitcoin');

        if (is_null($bitcoinPrice)) {
            return back()->with('error_modal', 'Unable to fetch Bitcoin price');
        }

        $usdAmount = $amountToSend * $bitcoinPrice;

        if ($user->bitcoin_balance < $usdAmount) {
            return back()->with('error_modal', 'Insufficient Bitcoin balance.');
        }

        $user->bitcoin_balance -= $usdAmount;

        if ($user->save()) {
            try {
                $transactionData = [
                    'userid' => $user->userid,
                    'crypto_type' => 'bitcoin',
                    'amount' => $amountToSend,
                    'crypto_amount' => $usdAmount,
                    'recipient_address' => $recipientAddress,
                    'status' => 'completed',
                    'transaction_reference' => uniqid('btc_txn_'),
                    'transaction_type' => 'debit'
                ];
                Log::info('Attempting transaction creation', $transactionData);

                $transaction = Transaction::create($transactionData);
                if (!$transaction) {
                    return back()->with('error_modal', 'Transaction creation failed.');
                }
            } catch (\Exception $e) {
                Log::error('Transaction error: ' . $e->getMessage());
                return back()->with('error_modal', 'Transaction error.');
            }

            return back()->with('success_modal', 'Transaction successful. Bitcoin debited: ' . $amountToSend . ' BTC (USD equivalent: $' . number_format($usdAmount, 2) . ')');
        }

        return back()->with('error_modal', 'Transaction failed. Please try again.');
    }

    public function showSendBitcoin()
    {
        return view('send.bitcoin-send');
    }

    public function showRequestBitcoin()
    {
        return view('request.bitcoin-request');
    }

    public function showBitcoinTransactions()
    {
        // Get authenticated user
        $user = Auth::user();
         
        // Fetch transactions for the authenticated user, filtered by Bitcoin
        $transactions = Transaction::where('userid', $user->userid)
            ->where('crypto_type', 'bitcoin')
            ->orderBy('created_at', 'desc')
            ->get();
    
        // Return view with the transactions
        return view('coins.bitcoin', ['transactions' => $transactions]);
    }
    
}
