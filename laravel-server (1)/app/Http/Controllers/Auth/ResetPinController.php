<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPinMail; // Import the Mailable class
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPinController extends Controller
{
    // Display the form to request a pin reset
    public function showForgotPinForm()
    {
        return view('auth.forgot-pin');
    }

    // Handle the form submission to send reset link
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'No account found with that email.',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        // Generate a reset token
        $resetToken = Str::random(60);
        $user->reset_token = $resetToken;
        $user->save();
    
        // Generate the reset link
        $resetLink = url('/reset-pin/' . $resetToken);
    
        // Send the reset link via email
        Mail::to($user->email)->send(new ResetPinMail($resetLink));

        return redirect()->back()->with('success_modal', 'A reset link has been sent to your email.');
    }

    // Display the reset pin form
    public function showResetPinForm($token)
    {
        return view('auth.reset-pin', ['token' => $token]);
    }

    // Handle the pin reset submission
    public function resetPin(Request $request)
    {
        $request->validate([
            'new_pin_1' => 'required|digits:1',
            'new_pin_2' => 'required|digits:1',
            'new_pin_3' => 'required|digits:1',
            'new_pin_4' => 'required|digits:1',
            'new_pin_confirmation_1' => 'required|digits:1',
            'new_pin_confirmation_2' => 'required|digits:1',
            'new_pin_confirmation_3' => 'required|digits:1',
            'new_pin_confirmation_4' => 'required|digits:1',
            'token' => 'required|exists:users,reset_token',
        ]);

        // Concatenate the four parts of the new PIN
        $newPin = $request->new_pin_1 . $request->new_pin_2 . $request->new_pin_3 . $request->new_pin_4;
        $newPinConfirmation = $request->new_pin_confirmation_1 . $request->new_pin_confirmation_2 . $request->new_pin_confirmation_3 . $request->new_pin_confirmation_4;

        // Confirm that the two concatenated PINs match
        if ($newPin !== $newPinConfirmation) {
            return redirect()->back()->withErrors(['new_pin' => 'The new PIN and confirmation do not match.']);
        }

        $user = User::where('reset_token', $request->token)->firstOrFail();

        // Update the user's pin and clear the reset token
        $user->pin = Hash::make($newPin);
        $user->reset_token = null;
        $user->save();

        return redirect()->route('login')->with('success_modal', 'Your pin has been reset successfully.');
    }
}

