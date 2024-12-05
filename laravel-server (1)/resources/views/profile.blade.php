<x-layout>
  <x-slot:heading>
    Profile
  </x-slot:heading>

  <!-- profile section start -->
  <section class="section-b-space">
    <div class="custom-container">
      <div class="profile-section">
        <div class="profile-banner">
          <div class="profile-image">
            <!-- Use the user's profile picture if it exists or a default image -->
            <img
              class="img-fluid profile-pic"
              src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('assets/images/profileavatar.jpg') }}"
              alt="Profile Picture"
            />
          </div>
        </div>
        <!-- Display user's full name and email -->
        <h2>{{ $user->name }}</h2>
        <h5>{{ $user->email }}</h5>
        
      </div>

      <ul class="profile-list">
        <li>
          <a href="my-account" class="profile-box">
            <div class="profile-img">
              <i class="icon" data-feather="user"></i>
            </div>
            <div class="profile-details">
              <h4>My Account</h4>
              <img
                class="img-fluid arrow"
                src="assets/images/svg/arrow.svg"
                alt="arrow"
              />
            </div>
          </a>
        </li>

        <li>
          <a href="change-pin" class="profile-box">
            <div class="profile-img">
              <i class="icon" data-feather="settings"></i>
            </div>
            <div class="profile-details">
              <h4>Change Pin</h4>
              <img
                class="img-fluid arrow"
                src="assets/images/svg/arrow.svg"
                alt="arrow"
              />
            </div>
          </a>
        </li>
        <li>
          <a href="setting" class="profile-box">
            <div class="profile-img">
              <i class="icon" data-feather="lock"></i>
            </div>
            <div class="profile-details">
              <h4>Settings</h4>
              <img
                class="img-fluid arrow"
                src="assets/images/svg/arrow.svg"
                alt="arrow"
              />
            </div>
          </a>
        </li>

        <li>
          <a href="/faq" class="profile-box">
            <div class="profile-img">
              <i class="icon" data-feather="help-circle"></i>
            </div>
            <div class="profile-details">
              <h4>FAQ</h4>
              <img
                class="img-fluid arrow"
                src="assets/images/svg/arrow.svg"
                alt="arrow"
              />
            </div>
          </a>
        </li>
        <li>
          {{-- <a  class="pages" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="sidebar-icon" data-feather="log-out"></i>
            <h3>Log out</h3>
          </a> --}}
          
          <!-- Hidden Logout Form -->
      

          <a class="profile-box" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="profile-img">
              <i class="icon" data-feather="log-out"></i>
            </div>
            <div class="profile-details">
              <h4>Log Out</h4>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </a>
        </li>
      </ul>
    </div>
  </section>
  <!-- profile section end -->

  <!-- Include your modals (ensure they have IDs like successModal) -->
@include('components.modals')

@if(session('success_modal') || session('error_modal'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success_modal'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            document.getElementById('successMessage').textContent = "{{ session('success_modal') }}";
            successModal.show();

            // Delay redirect by 3 seconds (adjust as needed)
            setTimeout(function () {
                window.location.href = "{{ session('redirect') }}";
            }, 2000);
        @endif

        @if(session('error_modal'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            document.getElementById('errorMessage').textContent = "{{ session('error_modal') }}";
            errorModal.show();
        @endif
    });
</script>
@endif
</x-layout>
