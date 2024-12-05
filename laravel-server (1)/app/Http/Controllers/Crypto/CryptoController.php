<?php

namespace App\Http\Controllers\Crypto;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CryptoController extends Controller
{
    public function index()
    {
        $cacheKey = 'crypto_prices'; // Unique key for caching prices
        $cacheDuration = 10; // Cache duration in minutes, adjust as needed
    
        try {
            // Fetching crypto data from the CoinGecko API for specified cryptocurrencies
            $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
                'ids' => 'bitcoin,ethereum,tether,binancecoin,dogecoin,tron,usd-coin',
                'vs_currencies' => 'usd',
                'include_24hr_change' => 'true',
                'include_market_cap' => 'false',
                'include_last_updated_at' => 'true',
            ]);
    
            if ($response->successful()) {
                $cryptoData = $response->json();
                // Store the successfully fetched data in the cache
                Cache::put($cacheKey, $cryptoData, now()->addMinutes($cacheDuration));
            } else {
                throw new \Exception('API call failed');
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Handling timeout error by retrieving the cached data
            $cryptoData = Cache::get($cacheKey, []);
        } catch (\Exception $e) {
            // Handling other possible exceptions by retrieving the cached data
            $cryptoData = Cache::get($cacheKey, []);
        }

        // Fetch the user's balances for each crypto
        $user = auth()->user(); // Assuming you're using authentication

        $userBalances = [
            'bitcoin' => $user->bitcoin_balance ?? 0,
            'ethereum' => $user->ethereum_balance ?? 0,
            'tether' => $user->tether_balance ?? 0,
            'binancecoin' => $user->binancecoin_balance ?? 0,
            'dogecoin' => $user->doge_balance ?? 0,
            'tron' => $user->tron_balance ?? 0,
            'usd-coin' => $user->{'usd-coin_balance'}  ?? 0,
        ];

        // Calculate the total main wallet balance in USDT
        $mainWalletBalance = 0;
        foreach ($userBalances as $crypto => $balance) {
            $priceInUsd = $cryptoData[$crypto]['usd'] ?? 0;
            $mainWalletBalance += $balance * $priceInUsd;
        }

        // Mapping fetched data to your structure with a fallback
        $cryptos = [
            'bitcoin' => [
                'symbol' => 'BTC',
                'price' => $cryptoData['bitcoin']['usd'] ?? 89000,
                'change_24h' => $cryptoData['bitcoin']['usd_24h_change'] ?? 0,
                'img' => 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png',
                'network' => 'Bitcoin'
            ],
            'ethereum' => [
                'symbol' => 'ETH',
                'price' => $cryptoData['ethereum']['usd'] ?? 0,
                'change_24h' => $cryptoData['ethereum']['usd_24h_change'] ?? 0,
                'img' => 'https://assets.coingecko.com/coins/images/279/large/ethereum.png',
                'network' => 'Ethereum'
            ],
            'tether' => [
                'symbol' => 'USDT',
                'price' => $cryptoData['tether']['usd'] ?? 0,
                'change_24h' => $cryptoData['tether']['usd_24h_change'] ?? 0,
                'img' => 'https://assets.coingecko.com/coins/images/325/large/Tether-logo.png',
                'network' => 'Tether (Ethereum)'
            ],
            'binancecoin' => [
                'symbol' => 'BNB',
                'price' => $cryptoData['binancecoin']['usd'] ?? 0,
                'change_24h' => $cryptoData['binancecoin']['usd_24h_change'] ?? 0,
                'img' => 'https://assets.coingecko.com/coins/images/825/large/binance-coin-logo.png',
                'network' => 'Binance Smart Chain'
            ],
            'dogecoin' => [
                'symbol' => 'DOGE',
                'price' => $cryptoData['dogecoin']['usd'] ?? 0,
                'change_24h' => $cryptoData['dogecoin']['usd_24h_change'] ?? 0,
                'img' => 'https://assets.coingecko.com/coins/images/5/large/dogecoin.png',
                'network' => 'Dogecoin'
            ],
            'tron' => [
                'symbol' => 'TRX',
                'price' => $cryptoData['tron']['usd'] ?? 0,
                'change_24h' => $cryptoData['tron']['usd_24h_change'] ?? 0,
                'img' => 'https://assets.coingecko.com/coins/images/1094/large/tron-logo.png',
                'network' => 'Tron'
            ],
            'usd-coin' => [
                'symbol' => 'USDC',
                'price' => $cryptoData['usd-coin']['usd'] ?? 0,
                'change_24h' => $cryptoData['usd-coin']['usd_24h_change'] ?? 0,
                'img' => 'https://assets.coingecko.com/coins/images/6319/large/USD_Coin_icon.png',
                'network' => 'USD Coin'
            ]
        ];

        return view('crypto', compact('mainWalletBalance', 'cryptos'));
    }
}

