@extends('components.coinLayout')

@php
    // Define the crypto mapping at the top for use throughout the template
    $cryptoMapping = [
        'bitcoin' => 'BTC',
        'ethereum' => 'ETH',
        'tether' => 'USDT',
        'binancecoin' => 'BNB',
        'dogecoin' => 'DOGE',
        'tron' => 'TRX',
        'usd-coin' => 'USDC',
    ];

    // Determine the symbol to display based on the mapping
    $shortSymbol = $cryptoMapping[strtolower($crypto['network'])] ?? strtoupper($crypto['network']);
    $changeClass = $crypto['change_24h'] > 0 ? 'success-color' : 'error-color';
@endphp

@section('currency')
    <h2>{{ ucfirst($crypto['network']) }}</h2>
@endsection

@section('symbol')
    {{-- Display formatted symbol --}}
    {{ $shortSymbol }}/USD
@endsection

@section('crypto-links')
    <ul class="categories-list">
        <li id="sendBtn">
            <a href="{{ url('/send/' . strtolower($crypto['network'])) }}">
                <div class="categories-box">
                    <i class="categories-icon" data-feather="arrow-up"></i>
                </div>
                <h5 class="mt-2 text-center">Send</h5>
            </a>
        </li>
        <li>
            <a href="{{ url('/receive/' . strtolower($crypto['network'])) }}">
                <div class="categories-box">
                    <i class="categories-icon" data-feather="arrow-down"></i>
                </div>
                <h5 class="mt-2 text-center">Receive</h5>
            </a>
        </li>
        <li>
            <a href="{{ url('/crypto-exchange') }}">
                <div class="categories-box">
                    <i class="categories-icon" data-feather="repeat"></i>
                </div>
                <h5 class="mt-2 text-center">Swap</h5>
            </a>
        </li>
        <li>
            <a href="https://www.moonpay.com">
                <div class="categories-box">
                    <i class="iconsax categories-icon" data-icon="bank"></i>
                </div>
                <h5 class="mt-2 text-center">Buy</h5>
            </a>
        </li>
    </ul>
@endsection

@section('coin-chart-section')
<section>
    <div class="accordion coin-chart-accordion" id="accordionExample">
        <div class="accordion-item">
           <h2 class="accordion-header">
            <a class="accordion-button row" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
               <span style="display:block, font-size: 22px; font-weight: 900;" >  ${{ number_format($convertedBalance, 2) }}  </span>
            </a>
           </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="transaction-box">
                        <a class="d-flex gap-3">
                            <div class="transaction-image color1">
<!--                            @php-->
<!--    $defaultImages = [-->
<!--        'tron' => 'tron.svg',-->
<!--        'usd-coin' => 'usdc.png',-->
<!--    ];-->
<!--    $imageSrc = $crypto['img'] ?? asset('assets/images/svg/' . ($defaultImages[strtolower($crypto['network'])] ?? 'tron.svg'));-->
<!--@endphp-->

@if(strtolower($crypto['network']) == 'tron')
    <img class="img-fluid icon" src="{{ asset('assets/images/svg/tron.svg') }}" alt="{{ $crypto['symbol'] }}">

@elseif(strtolower($crypto['network']) == 'usd-coin')
    <img class="img-fluid icon" src="{{ asset('assets/images/svg/usdc.png') }}" alt="{{ $crypto['symbol'] }}">
 @elseif(strtolower($crypto['network']) == 'binancecoin')
    <img class="img-fluid icon" src="{{ asset('assets/images/svg/binance.svg') }}" alt="{{ $crypto['symbol'] }}">
@else
    <img class="img-fluid icon" src="{{ $crypto['img'] }}" alt="{{ $crypto['symbol'] }}">
@endif


 


                            </div>
                            <div class="transaction-details">
                                <div class="transaction-name">
                                    <h2 class="fw-bold dark-text">${{ number_format($crypto['price'], 2) }}</h2>
                                    <h3 class="{{ $changeClass }}">{{ number_format($crypto['change_24h'], 2) }}%</h3>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="light-text fw-semibold">{{ $crypto['symbol'] }} | {{ $crypto['network'] }}</h5>
                                    <h5 class="light-text">24h Change: ({{ number_format($crypto['change_24h'], 2) }})</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('transaction-section')
    <section class="transaction-section" id="transactionSection">
        <div class="row gy-3 m-2">
            @forelse($transactions as $transaction)
                @php
                    // Check if the crypto type exists in the mapping, otherwise use the original
                    $shortCryptoType = $cryptoMapping[strtolower($transaction->crypto_type)] ?? strtoupper($transaction->crypto_type);
                @endphp

                <div class="col-12">
                    <div class="transaction-box">
                        <a href="{{ url('/transaction-history/' . $transaction->transaction_reference) }}" class="d-flex gap-3">
                            <div class="transaction-image {{ $transaction->transaction_type === 'credit' ? 'color5' : 'color4' }}">
                                <img 
                                    class="img-fluid icon" 
                                    src="{{ asset($transaction->transaction_type === 'credit' ? 'assets/images/svg/sell.svg' : 'assets/images/svg/buy.svg') }}" 
                                    alt="{{ $transaction->crypto_type }}" 
                                />
                            </div>
                            <div class="transaction-details">
                                <div class="transaction-name">
                                    <h5>{{ $transaction->status }}</h5>
                                    <h3 style="color: {{ $transaction->transaction_type === 'debit' ? 'red' : 'green' }};">
                                        @if($transaction->transaction_type === 'debit')
                                            - 
                                        @else  
                                            +
                                        @endif
                                        {{ number_format($transaction->amount) }} {{ $shortCryptoType }}
                                    </h3>      
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="light-text">{{ $transaction->transaction_reference }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </section>
@endsection
