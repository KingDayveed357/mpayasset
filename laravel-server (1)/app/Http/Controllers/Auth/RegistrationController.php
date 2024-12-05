<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\OtpMail;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full-name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'pin_1' => 'required|numeric|digits:1',
            'pin_2' => 'required|numeric|digits:1',
            'pin_3' => 'required|numeric|digits:1',
            'pin_4' => 'required|numeric|digits:1',
            're_pin_1' => 'required|numeric|digits:1',
            're_pin_2' => 'required|numeric|digits:1',
            're_pin_3' => 'required|numeric|digits:1',
            're_pin_4' => 'required|numeric|digits:1',
            
        ]);
    
        // Construct the PIN and re-entered PIN strings
        $pin = $request->input('pin_1') . $request->input('pin_2') . $request->input('pin_3') . $request->input('pin_4');
        $rePin = $request->input('re_pin_1') . $request->input('re_pin_2') . $request->input('re_pin_3') . $request->input('re_pin_4');
    
        // Check if the entered PINs match
        if ($pin !== $rePin) {
            return back()->withErrors(['re_pin' => 'The PINs do not match.']);
        }
         
        $userid = Str::uuid();
        // Generate OTP and hash the PIN for storage
        $otp = random_int(1000, 9999);
        
        $user = User::create([
            'userid' => (string) $userid,
            'name' => $request->input('full-name'),
            'email' => $request->input('email'),
            'pin' => Hash::make($pin), // Store hashed pin in password field
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10), // Set OTP expiration
            'status' => 'unverified',
            'kyc_document_1' => null,
        ]);
    
        // Send OTP email to the user
        Mail::to($user->email)->send(new OtpMail($otp));
    

        //  // Redirect to OTP verification page
        return redirect()->route('verifyOtp', ['email' => $user->email])
            ->with('success_modal', 'Account created successfully. Please verify your email.')
            ->with('redirect', route('verifyOtp', ['email' => $user->email]));

        
    }
    
}
