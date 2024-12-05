/*====================
 display & hide history
=======================*/

const toggleCheckbox = document.getElementById("toggle-checkbox");
const spanId = document.getElementById("span_id");

toggleCheckbox.addEventListener("change", function () {
  if (toggleCheckbox.checked) {
    spanId.style.display = "block";
  } else {
    spanId.style.display = "none";
  }
});

// Function to handle wallet selection
function selectWallet(element) {
  const options = document.querySelectorAll(".wallet-option");
  options.forEach((option) => option.classList.remove("active"));
  element.classList.add("active");

  // Get wallet image and description
  const walletImgSrc = element.querySelector("img").src;
  const walletName = element.querySelector("span").innerText;

  // Update modal image and description
  document.getElementById("modalWalletImage").src = walletImgSrc;
  document.getElementById("modalWalletImage").alt = walletName;
  document.getElementById("modalWalletDescription").innerText = walletName;

  // Show the modal
  var myModal = new bootstrap.Modal(document.getElementById("walletModal"));
  myModal.show();
}

// Connect wallet button action
document
  .getElementById("connectWalletBtn")
  .addEventListener("click", function () {
    var myModal = bootstrap.Modal.getOrCreateInstance(
      document.getElementById("walletModal")
    );
    myModal.hide();

    window.location.href = "connect-wallet-scan.html";
  });

// history page dark screen function
