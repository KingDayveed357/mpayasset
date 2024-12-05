<x-layout>  
  <x-slot:heading>  
    Identity Verification
  </x-slot:heading> 

  <x-slot:calendar>  
    <a href="#calendar" class="back-btn" data-bs-toggle="modal">
      <i class="icon" data-feather="help-circle"></i>
    </a>
  </x-slot:calendar> 

  <!-- balance section starts -->
  <section>
    <div class="custom-container">
      <div style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
        <img class="img-fluid profile-pic" src="assets/images/profileavatar2.png" alt="p3" style="width: 100px; height: 100px" />
        
        <div style="text-align: center">
          {{-- Displaying partially masked email --}}
          <p class="mb-3">
            {{ substr($user->email, 0, 4) . '***@****' }}
          </p>
          
          {{-- Displaying kstatus --}}
          <p style="color: #6c757d; font-size: 13px" class="mb-3">
            @if($user->kstatus === 'pending')
              <span>
                <img style="width: 13px; height: 13px" src="assets/images/clock.png" alt="Pending" />
              </span>
            @elseif($user->kstatus === 'verified')
              <span>
                <img style="width: 13px; height: 13px" src="assets/images/verified-icon.png" alt="Verified" />
              </span>
            @endif
            {{ $user->kstatus ?? 'pending' }}
          </p>
          
        </div>
      </div>

      <div class="mt-3 borda">
        <div class="transfer-section">
          <div>
            <h1 class="fs-4 fw-semibold">Personal info</h1>

            <div class="fs-6">
              <p style="font-size: 13px">Name: {{ $user->name ?? 'N/A' }}</p>
              <p style="font-size: 13px">Document ID: {{ $user->id ?? 'N/A' }}</p>
              <p style="font-size: 13px">Country/Region of Issue: {{ $user->country ?? 'N/A' }}</p>
            </div>
          </div>

          <div>
            <h1 class="fw-normal" style="font-size: 15px">Identity Transfer</h1>
            <div class="text-end">
              <p class="mb-1">***</p>
              <p class="mb-1">**** **** ****</p>
              <p class="mb-1">********</p>
            </div>
          </div>
        </div>
      </div>

      {{-- Displaying documents and their count --}}
      <div class="mt-3">
        <h3>Documents Uploaded</h3>
        @php
          $documents = collect([$user->kyc_document_1, $user->kyc_document_2])->filter(); // Collect documents
        @endphp
      
        <p>Total Uploaded: {{ $documents->count() }}</p>
        <ul >
          @foreach($documents as $index => $document)
            <li style="display: block">Document {{ $index + 1 }}: {{ $document }}</li>
          @endforeach
        </ul>
      </div>
      
    </div>
  </section>

  <section>
    <div class="custom-container">
      <div>
        <p class="fw-semibold" style="text-wrap: nowrap; font-size: 13px">
          Complete Identity Verification Advanced Now
        </p>
      </div>
    </div>
  </section>
  <!-- Proof of address section start -->
  <section class="custom-container mt-3">
    <div class="borda">
      <div class="identity">
        <div >
          <h1 class="fs-6 fw-semibold">Proof of Address</h1>
          <div class="fs-6" >
            <p style="font-size: 10px; color: #6c757d">
              Please submit a proof of address document, issued within the
              last three (3) months that clearly shows your name and address.
            </p>
          </div>
        </div>

        <div>
          <!-- <h1 class="fw-normal" style="font-size: 15px">Identity Transfer</h1> -->
          <div class="text-end">
            <a href="{{ route('kyc.uploadForm') }}" class="verify-button">Upload</a>

          </div>
        </div>
      </div>
    </div>
  </section>

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


