<?php

namespace App\Http\Controllers\Crypto;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Transaction;

class ShowCoinController extends Controller
{
    public function show($cryptoId)
    {
        // Set cache key and expiration time (e.g., 10 minutes)
        $cacheKey = "crypto_price_{$cryptoId}";
        $cacheTime = 10 ; 

        // Try to get the crypto price from the cache
        $cachedData = Cache::get($cacheKey);

        // Check if cached data exists and is an array
        if (is_array($cachedData) && isset($cachedData['price'])) {
            // Use cached data if available
            $cryptoPrice = $cachedData['price'];
            $change24h = $cachedData['change_24h'];
            \Log::info("Using cached data for {$cryptoId}");
        } else {
            try {
                // Fetch crypto data from the API
                $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
                    'ids' => $cryptoId,
                    'vs_currencies' => 'usd',
                    'include_24hr_change' => 'true',
                    'include_market_cap' => 'false',
                    'include_last_updated_at' => 'true',
                ]);

                // Check if the response is successful and the data is an array
                if ($response->successful()) {
                    $cryptoData = $response->json();

                    // Ensure that $cryptoData[$cryptoId] is an array and not some other type
                    if (is_array($cryptoData) && isset($cryptoData[$cryptoId])) {
                        $cryptoPrice = $cryptoData[$cryptoId]['usd'] ?? 0;
                        $change24h = $cryptoData[$cryptoId]['usd_24h_change'] ?? 0;

                        // Cache the data if fetched successfully
                        Cache::put($cacheKey, [
                            'price' => $cryptoPrice,
                            'change_24h' => $change24h,
                        ], $cacheTime);
                    } else {
                        throw new \Exception('Unexpected API response format');
                    }
                } else {
                    throw new \Exception('API call failed');
                }
            } catch (\Illuminate\Http\Client\ConnectionException $e) {
                // Use previous cached data if the API call fails
                $cryptoPrice = $cachedData['price'] ?? 0;
                $change24h = $cachedData['change_24h'] ?? 0;
                \Log::warning("API timeout, using cached data for {$cryptoId}");
            } catch (\Exception $e) {
                // Handle other exceptions, also fallback to cached data
                $cryptoPrice = $cachedData['price'] ?? 0;
                $change24h = $cachedData['change_24h'] ?? 0;
                \Log::error("Error fetching API data: " . $e->getMessage());
            }
        }

        // Fetch user transactions for the selected cryptoId
        $user = Auth::user();
        $userCryptoBalance = $user->{strtolower($cryptoId) . '_balance'} ?? 0;

        // Convert user's crypto balance to USD
        $convertedBalance = $cryptoPrice * $userCryptoBalance;

        // Handle network name transformation
        $network = strtolower($cryptoId);
        
        // Check for known network names and map them to the appropriate cryptocurrency ID
        if ($network === 'tether (ethereum)') {
            $network = 'tether';
        } elseif ($network === 'binance smart chain') {
            $network = 'binancecoin';
        } elseif ($network === 'usd coin') {
            $network = 'usd-coin';
        }

        // Prepare the crypto data array
        $crypto = [
            'symbol' => strtoupper($cryptoId),
            'price' => $cryptoPrice,
            'balance_usdt' => $convertedBalance, // Pass the converted balance
            'change_24h' => $change24h,
            'img' => 'https://assets.coingecko.com/coins/images/' . $this->getCoinImageId($cryptoId) . '/large/' . $cryptoId . '.png',
            'network' => ucfirst($network),
        ];

        // Get user transactions for the selected coin
        $transactions = Transaction::where('userid', $user->userid)
            ->where('crypto_type', $cryptoId)
            ->orderBy('created_at', 'desc')
            ->get();

        // Use the 'show' view for displaying crypto and transactions
        return view('coins.show', compact('crypto', 'transactions', 'user', 'userCryptoBalance', 'convertedBalance'));
    }

    // Helper function to map cryptoId to its corresponding image ID
    private function getCoinImageId($cryptoId)
    {
        return config("coins.images.$cryptoId", '1'); // Adjust this mapping based on your requirements
    }
}
