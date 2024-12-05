<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KycController extends Controller
{
    /**
     * Display the user's KYC information.
     */
    public function viewKyc()
    {
        $user = Auth::user(); // Assuming user authentication
        return view('kyc', compact('user'));
    }

    /**
     * Show the form for uploading KYC documents.
     */
    public function uploadKycForm()
    {
        return view('upload-kyc');
    }

    /**
     * Handle the KYC document upload.
     */
public function uploadKyc(Request $request)
{
    $request->validate([
        'document1' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'document2' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    $user = Auth::user();

    // Upload files and save paths to database
    if ($request->hasFile('document1')) {
        $path1 = $request->file('document1')->store('kyc-documents', 'root');
        $user->kyc_document_1 = $path1;
    }

    if ($request->hasFile('document2')) {
        $path2 = $request->file('document2')->store('kyc-documents', 'root');
        $user->kyc_document_2 = $path2;
    }

    $user->kstatus = 'pending'; // Set initial KYC status
    $user->save();

    return redirect()->route('kyc.view')->with('success_modal', 'KYC documents uploaded successfully!');
}

}
