<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function store(Request $request)
    {
        // Start the PHP session for session management
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Validate email and individual pin inputs
        $request->validate([
            'email' => 'required|email',
            'pin_1' => 'required|numeric|digits:1',
            'pin_2' => 'required|numeric|digits:1',
            'pin_3' => 'required|numeric|digits:1',
            'pin_4' => 'required|numeric|digits:1',
        ]);

        // Concatenate the 4 pin inputs
        $pin = $request->input('pin_1') . $request->input('pin_2') . $request->input('pin_3') . $request->input('pin_4');

        // Find the user by email
        $user = User::where('email', $request->input('email'))->first();

        // Check if the user exists, if the pin matches, and if the account is verified
        if ($user && Hash::check($pin, $user->pin) && $user->status === 'verified') {
            // Log in the user using Laravel's auth system
            auth()->login($user);

            // Check if the user is an admin
            if ($user->role === 'admin') {
                // Set the PHP admin session variables
                $_SESSION['admin'] = true;
                $_SESSION['email'] = $user->email;
                $_SESSION['userid'] = $user->userid;

                // Redirect to the raw PHP admin dashboard
                return redirect('/admin/dashboard.php');
            }

            // For regular users, redirect to the user dashboard
            return redirect()->route('login')
                             ->with('success_modal', 'Welcome back! You have successfully signed in.')
                             ->with('redirect', route('crypto.index'));
        }

        // Flash an error message to the session
        return back()->with('error_modal', 'Invalid credentials or account not verified.');
    }

    public function destroy()
    {
        // Log out the user using Laravel's auth system
        auth()->logout();

        // Also destroy the PHP session if it was set
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }

        // Redirect to the home page
        return redirect('/');
    }
}
