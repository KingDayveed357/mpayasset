<x-layout>
  <x-slot:heading>
    Crypto Wallet
  </x-slot:heading>

  <!-- Main Wallet Section -->
  <section>
    <div class="custom-container">
      <div class="crypto-wallet-box">
        <div class="card-details">
          <div class="d-block w-75">
            <h5 class="fw-semibold">Main Wallet</h5>
            <span id="wallet-balance" 
                  data-balance="{{ number_format($mainWalletBalance ?? 0, 2) }}" 
                  style="font-size: 27px; font-weight: 900; color: white">
              ${{ number_format($mainWalletBalance ?? 0, 2) }}
            </span>
            <!-- Icons for toggling visibility -->
            <i id="eye-open" class="bi bi-eye-fill" style="cursor: pointer; color: white; margin-left: 10px"></i>
            <i id="eye-close" class="bi bi-eye-slash-fill" style="cursor: pointer; color: white; margin-left: 10px; display: none;"></i>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Categories Section -->
  <section class="categories-section section-b-space">
    <div class="custom-container">
      <ul class="categories-list">
        <li><a href="{{ url('crypto-send') }}"><div class="categories-box"><i class="categories-icon" data-feather="arrow-up"></i></div><h5 class="mt-2 text-center">Send</h5></a></li>
        <li><a href="{{ url('crypto-request') }}"><div class="categories-box"><i class="categories-icon" data-feather="arrow-down"></i></div><h5 class="mt-2 text-center">Request</h5></a></li>
        <li><a href="{{ url('crypto-exchange') }}"><div class="categories-box"><i class="categories-icon" data-feather="repeat"></i></div><h5 class="mt-2 text-center">Swap</h5></a></li>
        <li><a href="{{ url('history') }}"><div class="categories-box"><i class="bi bi-file-earmark-break-fill" style="font-size: 18px; color: #5a30dc"></i></div><h5 class="mt-2 text-center">History</h5></a></li>
      </ul>
    </div>
  </section>

  <!-- Crypto Assets Section -->
  <section>
    <div class="custom-container">
      <div class="title"><h2>Crypto Assets</h2></div>
       <div id="crypto-loader" style="display: flex; justify-content: center; align-items: center; height: 200px;">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
       <div id="crypto-content" style="display: none;">
      <div class="row gy-3">
        @if(isset($cryptos) && !empty($cryptos))
          @foreach($cryptos as $crypto)
            @php
              $changeClass = $crypto['change_24h'] > 0 ? 'success-color' : 'error-color';
              // Update the URL logic
              $network = strtolower($crypto['network']);
              if ($network === 'tether (ethereum)') {
                $network = 'tether';
              } elseif ($network === 'binance smart chain') {
                $network = 'binancecoin';
              }
             elseif ($network === 'usd coin') {
                $network = 'usd-coin';
              }
            @endphp
            <div class="col-12">
              <div class="transaction-box">
                <a href="{{ url('coins/' . $network) }}" class="d-flex gap-3">
                  <div class="transaction-image">
                    <img class="img-fluid icon" src="{{ $crypto['img'] }}" alt="{{ $crypto['symbol'] }}">
                  </div>
                  <div class="transaction-details">
                    <div class="transaction-name">
                      <h5>{{ $crypto['symbol'] }}</h5>
                      <h3 class="dark-text">${{ number_format($crypto['price'], 2) }}</h3>
                    </div>
                    <div class="d-flex justify-content-between">
                      <h5 class="light-text">{{ $crypto['network'] }}</h5>
                      <h5 class="{{ $changeClass }}">{{ number_format($crypto['change_24h'], 2) }}%  <span class="light-text">(24H)</span></h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          @endforeach
        @else
          <div class="col-12">
            <p>No crypto data available.</p>
          </div>
        @endif
      </div>
      </div>
    </div>
  </section>
  
   <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
      const cryptoLoader = document.getElementById("crypto-loader");
      const cryptoContent = document.getElementById("crypto-content");

      // Simulate API fetch delay
      setTimeout(() => {
        cryptoLoader.style.display = "none"; // Hide loader
        cryptoContent.style.display = "block"; // Show crypto content
      }, 3000); // Wait 3 seconds after fetching
    });
  </script>
  <script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/48333647.js"></script>
</x-layout>
