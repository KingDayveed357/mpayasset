<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Include the User model if not already included
use App\Models\Transaction; // Include the Transaction model
use Illuminate\Support\Facades\Auth; // Assuming you are using Laravel Auth

class TransactionController extends Controller
{
    public function getUserDetails()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Retrieve transactions for the user
        $transactions = Transaction::where('userid', $user->userid)
            ->orderBy('date', 'desc')
            ->get();

        // Pass user and transactions data to the view
        return view('history', compact('user', 'transactions'));
    }
}
