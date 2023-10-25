document.addEventListener("DOMContentLoaded", function () {
    // Ambil elemen input pencarian berdasarkan ID
    var searchInput = document.getElementById("search-input");

    // Saat kolom input menerima focus, hapus isinya
    searchInput.addEventListener("focus", function () {
        searchInput.value = "";
    });
});