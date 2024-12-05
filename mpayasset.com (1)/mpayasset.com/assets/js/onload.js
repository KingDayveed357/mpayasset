/*====================
 onload rocket js
=======================*/
window.onload = function () {
    setTimeout(function () {
        var div = document.getElementById('onboardingLoader');
        var body = document.getElementById('onboardingBody');
        div.classList.add('highlight');
        body.classList.add('highlight');
    }, 1500);
};