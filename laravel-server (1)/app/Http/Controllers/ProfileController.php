<?php

// ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();  // Get the authenticated user
        return view('profile', compact('user'));
    }

    public function showAccountPage()
    {
        $user = auth()->user(); // This retrieves the currently authenticated user
        return view('my-account', compact('user'));
    }
  
    public function showChangePin(){
        $user = auth()->user(); // This retrieves the currently authenticated user
        return view('change-pin', compact('user'));
    }

    public function changePin(Request $request)
    {
        // Validate the input for old pin, new pin, and confirmation
        $request->validate([
            'old_pin' => 'required|array|size:4',
            'new_pin' => 'required|array|size:4|confirmed',
            'new_pin_confirmation' => 'required|array|size:4|same:new_pin',
        ]);
    
        $user = Auth::user();
        
        // Combine pin arrays to form strings
        $oldPin = implode('', $request->old_pin);
        $newPin = implode('', $request->new_pin);
        
        // Check if the old pin matches the stored pin
        if (!Hash::check($oldPin, $user->pin)) {
            return redirect()->back()->withErrors(['old_pin' => 'The old pin is incorrect.']);
        }
    
        // Update the pin
        $user->pin = Hash::make($newPin);
        $user->save();
    
        return redirect()->route('profile')->with('success_modal', 'Pin updated successfully.');
    }
    
    public function updateProfile(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('public/profile_pictures');
            $user->profile_picture = basename($path);
        }

        $user->save();

        return redirect()->route('profile')->with('success_modal', 'Profile updated successfully.');
    }

    // New method to update email and name
    public function updateUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'name' => 'required|string|max:255',
        ]);
    
        $user = Auth::user();
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->save();
    
        return redirect()->route('profile')->with('success_modal', 'User details updated successfully.');
    }
    
}

