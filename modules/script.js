document.addEventListener("DOMContentLoaded", function () {
  const searchForm = document.getElementById("search-form");
  const searchInput = document.getElementById("search-input");
  const searchResults = document.getElementById("search-results");

  searchForm.addEventListener("submit", function (e) {
      e.preventDefault(); // Mencegah pengiriman formulir langsung

      const searchTerm = searchInput.value;

      // Buat objek AJAX
      const xhr = new XMLHttpRequest();

      // Tentukan tindakan yang akan diambil ketika permintaan selesai
      xhr.onload = function () {
          if (xhr.status === 200) {
              // Hasil pencarian akan ditempatkan di dalam elemen "search-results"
              searchResults.innerHTML = xhr.responseText;
          } else {
              // Tampilkan pesan kesalahan jika ada masalah dengan server
              searchResults.innerHTML = "Terjadi masalah saat mengirim permintaan.";
          }
      };

      // Konfigurasikan permintaan
      xhr.open("POST", "../controller/search.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      // Kirim permintaan dengan data NIM yang akan dicari
      xhr.send("searchNIM=" + encodeURIComponent(searchTerm));
  });
});
