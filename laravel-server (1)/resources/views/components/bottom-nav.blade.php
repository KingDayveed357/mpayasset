<div class="navbar-menu">
  <div class="scanner-bg">
    <a href="#" class="scanner-btn">
      <img class="img-fluid" src="{{ asset('assets/images/svg/scan.svg') }}" alt="scan" />
    </a>
  </div>

  <ul>
    <li class="{{ Request::is('crypto') ? 'active' : '' }}">
      <a href="{{ url('crypto') }}">
        <div class="icon">
          <img class="unactive" src="{{ asset('assets/images/svg/bitcoin.svg') }}" alt="mPay" />
          <img class="active" src="{{ asset('assets/images/svg/bitcoin-fill.svg') }}" alt="mPay" />
        </div>
        <h5>Crypto</h5>
      </a>
    </li>

    <li class="{{ Request::is('insight') ? 'active' : '' }}">
      <a href="{{ url('insight') }}">
        <div class="icon">
          <img class="unactive" src="{{ asset('assets/images/svg/bar-chart.svg') }}" alt="categories" />
          <img class="active" src="{{ asset('assets/images/svg/bar-chart-fill.svg') }}" alt="categories" />
        </div>
        <h5>Insight</h5>
      </a>
    </li>

    <li class="{{ Request::is('kyc') ? 'active' : '' }}">
      <a href="{{ url('kyc') }}">
        <div class="icon">
          <img class="unactive" src="{{ asset('assets/images/svg/user.svg') }}" alt="kyc" />
          <img class="active" src="{{ asset('assets/images/svg/user-fill.svg') }}" alt="kyc" />
        </div>
        <h5>KYC</h5>
      </a>
    </li>

    <li class="{{ Request::is('profile') ? 'active' : '' }}">
      <a href="{{ url('profile') }}">
        <div class="icon">
          <img class="unactive" src="{{ asset('assets/images/svg/user.svg') }}" alt="profile" />
          <img class="active" src="{{ asset('assets/images/svg/user-fill.svg') }}" alt="profile" />
        </div>
        <h5>Profile</h5>
      </a>
    </li>
  </ul>
</div>
