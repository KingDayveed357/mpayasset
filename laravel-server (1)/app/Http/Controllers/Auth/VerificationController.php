<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\OtpMail;

class VerificationController extends Controller
{
    public function create(Request $request)
    {
        $email = $request->query('email');
        return view('auth.verify-otp', ['email' => $email]);
    }
    

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp_1' => 'required|numeric|digits:1',
        'otp_2' => 'required|numeric|digits:1',
        'otp_3' => 'required|numeric|digits:1',
        'otp_4' => 'required|numeric|digits:1',
    ]);

    // Concatenate the OTP fields
    $otp = $request->input('otp_1') . $request->input('otp_2') . $request->input('otp_3') . $request->input('otp_4');

    // Find the user based on email
    $user = User::where('email', $request->email)->first();

    if (!$user || $user->otp !== $otp) {
        // Return with an error modal
        return back()->with('error_modal', 'Invalid OTP or email.');
    }

    // Check if the OTP has expired
    if (Carbon::now()->greaterThan($user->otp_expires_at)) {
        // Return with an error modal
        return back()->with('error_modal', 'OTP has expired.');
    }

    // Update the user's status to verified
    $user->update([
        'status' => 'verified',
        'otp' => null,
        'otp_expires_at' => null,
    ]);

    // Return with a success modal and redirect to login
    return redirect()->route('login')->with('success_modal', 'Account verified successfully! You will be redirected shortly.');
}

public function resendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    $user = User::where('email', $request->email)->first();

    try {
        // Generate new OTP
        $newOtp = random_int(1000, 9999); // 4-digit code
        $user->update([
            'otp' => $newOtp,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]); 

        // Send OTP to email
        Mail::to($user->email)->send(new OtpMail($newOtp));

        // Return success modal
        return back()->with('success_modal', 'A new OTP has been sent to your email.');
    } catch (\Exception $e) {
        // Return error modal if OTP could not be sent
        return back()->with('error_modal', 'An error occurred while sending the OTP. Please try again.');
    }
}

}
