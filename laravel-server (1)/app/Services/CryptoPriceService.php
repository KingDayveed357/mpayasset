<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class CryptoPriceService
{
    /**
     * Fetches the current price of a cryptocurrency in USD.
     *
     * @param string $currency The cryptocurrency symbol (e.g., 'bitcoin', 'ethereum')
     * @return float|null The current price or null if fetching fails
     */
    public function getPrice(string $currency)
    {
        $cacheKey = "crypto_price_{$currency}";
        try {
            // Make a GET request to a public API (CoinGecko in this example)
            $response = Http::get("https://api.coingecko.com/api/v3/simple/price", [
                'ids' => $currency,
                'vs_currencies' => 'usd',
            ]);

            // Log the response for debugging purposes
            Log::info("CoinGecko API Response: ", $response->json());

            // Check if the request was successful and return the price
            if ($response->successful()) {
                $priceData = $response->json();
                // Check if the price exists for the currency
                if (isset($priceData[$currency]['usd'])) {
                    $price = $priceData[$currency]['usd'];

                    // Cache the latest price with a reasonable expiration time (e.g., 1 hour)
                    Cache::put($cacheKey, $price, 3600);

                    return $price;
                } else {
                    Log::error("Price data not available for {$currency}");
                }
            } else {
                Log::error("API request failed with status: " . $response->status());
            }
        } catch (\Exception $e) {
            Log::error('CryptoPriceService Error: ' . $e->getMessage());
        }

        // Return the last known price from cache if available
        $cachedPrice = Cache::get($cacheKey);
        if ($cachedPrice !== null) {
            Log::warning("Returning cached price for {$currency}");
            return $cachedPrice;
        }

        return null; // Return null if no cached price is available
    }
}

