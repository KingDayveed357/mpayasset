<!-- Success Modal -->
<div class="modal successful-modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Success</h2>
            </div>
            <div class="modal-body">
                <div class="done-img">
                    <img class="img-fluid" src="assets/images/svg/done.svg" alt="done">
                </div>
                <h2 id="successMessage">Success</h2> <!-- You can update this dynamically -->
                

                {{-- <a href="/crypto" class="btn theme-btn successfully w-100">Back to home</a> --}}
            </div>
            <button type="button" class="btn close-btn" data-bs-dismiss="modal">
                <i class="icon" data-feather="x"></i>
            </button>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal error-modal fade" id="errorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Error</h2>
            </div>
            <div class="modal-body">
                <div class="error-img">
                    <img class="img-fluid" src="assets/images/svg/error.svg" alt="error">
                </div>
                <h3 id="errorMessage">An error occurred</h3>

                <button type="button" class="btn theme-btn error w-100" data-bs-dismiss="modal">Close</button>
            </div>
            <button type="button" class="btn close-btn" data-bs-dismiss="modal">
                <i class="icon" data-feather="x"></i>
            </button>
        </div>
    </div>
</div>

<!-- Log out Modal (in your shared layout Blade file or modal.blade.php) -->
<div class="modal error-modal fade" id="delate" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="error-img">
                    <img class="img-fluid" src="assets/images/svg/delate.svg" alt="Logout">
                </div>
                <h3>Are you sure you want to sign out?</h3>
               
                    <!-- Confirm Logout -->
                    <a href="javascript:void(0);" class="btn theme-btn successfully w-100" onclick="document.getElementById('logout-form').submit();">Yes, Logout</a>
                    
            
            </div>
            <button type="button" class="btn close-btn" data-bs-dismiss="modal">
                <i class="icon" data-feather="x"></i>
            </button>
        </div>
    </div>
</div>


<script>
    // Listen for the Livewire event to show the modal
    Livewire.on('triggerLogoutModal', () => {
        $('#logoutModal').modal('show');
    });
</script>
