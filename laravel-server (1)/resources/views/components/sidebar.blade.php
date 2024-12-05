<div
class="offcanvas sidebar-offcanvas offcanvas-start"
tabindex="-1"
id="offcanvasLeft"
>
<div class="offcanvas-header sidebar-header">
  <div class="sidebar-logo">
    <img
      class="img-fluid logo"
      src="assets/images/logo/logo.png"
      alt="logo"
    />
  </div>
</div>
<div class="offcanvas-body">
  <div class="sidebar-content">
    <ul class="link-section">
      <li>
        <a href="crypto" class="pages">
          <i class="sidebar-icon" data-feather="file"></i>
          <h3>Main wallet</h3>
        </a>
      </li>
      <li>
        <a href="price-alerts" class="pages">
          <i class="sidebar-icon" data-feather="dollar-sign"></i>
          <h3>Price Alert</h3>
        </a>
      </li>
      <li>
        <a href="address-book" class="pages">
          <i class="sidebar-icon" data-feather="bookmark"></i>
          <h3>Address Book</h3>
        </a>
      </li>
      <hr />
      <li>
        <a href="connect-wallet" class="pages">
          <i class="sidebar-icon" data-feather="briefcase"></i>
          <h3>Connect Wallet</h3>
        </a>
      </li>

      <li>
        <a href="profile" class="pages">
          <i class="sidebar-icon" data-feather="lock"></i>
          <h3>Security</h3>
        </a>
      </li>

      <li>
        <a href="faq" class="pages">
          <i class="sidebar-icon" data-feather="help-circle"></i>
          <h3>Help center</h3>
        </a>
      </li>

      <hr />

      <li>
        <a href="https://www.twitter.com" target="_blank" class="pages">
          <i class="bi bi-twitter-x sidebar-icon"></i>
          <h3>Twitter</h3>
        </a>
      </li>

      <li>
        <a href="https://www.telegram.com" target="_blank" class="pages">
          <i class="bi bi-telegram sidebar-icon"></i>
          <h3>Telegram</h3>
        </a>
      </li>

      <li>
        <a href="https://www.facebook.com" target="_blank" class="pages">
          <i class="bi bi-facebook sidebar-icon"></i>
          <h3>Facebook</h3>
        </a>
      </li>

      <li>
        <a href="https://www.instagram.com" target="_blank" class="pages">
          <i class="bi bi-instagram sidebar-icon"></i>
          <h3>Instagram</h3>
        </a>
      </li>
      <li>
      
<!-- Log out link (in your Blade component) -->
<a class="pages" href="#delate" data-bs-toggle="modal" >
  <i class="sidebar-icon" data-feather="log-out"></i>
  <h3>Log out</h3>
</a>




<!-- Hidden Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>

<script>
  // Function to show the logout modal
  function showLogoutModal() {
      $('#delete').modal('show');
  }
</script>
      </li>
      <div class="mode-switch">
        <ul class="switch-section">
          <li>
            <h3>Dark</h3>
            <div class="switch-btn">
              <input id="dark-switch" type="checkbox" />
            </div>
          </li>
        </ul>
      </div>
    </ul>
    
  </div>
</div>
</div>
