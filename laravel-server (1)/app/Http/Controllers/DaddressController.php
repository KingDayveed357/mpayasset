<?php

namespace App\Http\Controllers;

use App\Models\Daddress;  
use Illuminate\Http\Request;

class DaddressController extends Controller
{
    public function showAddress($cryptoType)
    {
        // Fetch the address and QR code from the database based on the cryptoType
        $address = Daddress::where('dname', $cryptoType)->first();

        if (!$address) {
            return redirect()->back()->withErrors(['error' => 'Address not found']);
        }

        // Pass the address and QR code to the view
        return view('receive.show', compact('address', 'cryptoType'));
    }

   // Function to fetch address and QR code dynamically based on the selected cryptocurrency
    public function showAddressForRequest($cryptoType = 'bitcoin')
    {
        $address = Daddress::where('dname', $cryptoType)->first();

        if (!$address) {
            return response()->json(['error' => 'Address not found'], 404);
        }

        // Return the address and QR code as JSON response
        return response()->json([
            'address' => $address->daddress,
            'qr_code' => $address->dqrcode,
        ]);
    }

public function fetchAllCryptos()
{
    // Fetch only the dname (coin names) from the Daddress table
    $cryptos = Daddress::select('dname')->get();

    // Return the coin names as JSON
    return response()->json($cryptos);
}


    public function showAllAddresses()
    {
        // Fetch all addresses from the daddress table
        $addresses = Daddress::all();

        // Pass the addresses to the view
        return view('address-book', compact('addresses'));
    }
}

