require('./bootstrap');

require('alpinejs');

function myFunction() {
    const iso = document.getElementById("bisa")
    document.getElementById("alert").setTimeout(() => {
        iso.innerHTML = "Bisa"
    }, 1000);
}