    <!-- display & hide balance  -->
    <script>
        // Get the elements
        const balanceElement = document.getElementById("wallet-balance");
        const eyeOpen = document.getElementById("eye-open");
        const eyeClose = document.getElementById("eye-close");
  
        // Function to hide balance and show eye-close icon
        eyeOpen.addEventListener("click", () => {
          balanceElement.textContent = "****"; // Hide the balance
          eyeOpen.style.display = "none"; // Hide the open eye
          eyeClose.style.display = "inline"; // Show the closed eye
        });
  
        // Function to show balance and show eye-open icon
        eyeClose.addEventListener("click", () => {
          balanceElement.textContent =
            balanceElement.getAttribute("data-balance"); // Show the actual balance
          eyeClose.style.display = "none"; // Hide the closed eye
          eyeOpen.style.display = "inline"; // Show the open eye
        });
      </script>
  
      <!-- bootstrap js -->
      <script src="assets/js/bootstrap.bundle.min.js"></script>
  
      <!-- swiper js -->
      <script src="assets/js/swiper-bundle.min.js"></script>
      <script src="assets/js/custom-swiper.js"></script>
  
      <!-- apexcharts js -->
      <script src="assets/js/apexcharts.js"></script>
      <script src="assets/js/custom-candlestick-chart.js"></script>
  
      <script src="assets/js/custom-chart2.js"></script>
       
      <!-- feather js -->
      <script src="assets/js/feather.min.js"></script>
      <script src="assets/js/custom-feather.js"></script>
  
      <!-- iconsax js -->
      <script src="assets/js/iconsax.js"></script>
      <!-- script js -->
      <script src="assets/js/script.js"></script>
  
      {{-- <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"
      ></script> --}}