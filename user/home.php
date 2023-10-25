<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo.png" type="image/png">
    <title>Jadwal Tuweb dan TTM Universitas Terbuka Padang</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css?v2">
</head>
<body>
    <header class="bg-primary text-white text-center py-4">
        <h1 class="mb-0"><img src="../images/jadwal_tuweb.png" alt="Gambar" style="max-width: 100%; height: auto;"></h1>
    </header>
    <main class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="search-form">
                            <div class="input-group mb-3">
                                <input type="text" id="search-input" name="searchNIM" class="form-control" placeholder="Cari data by NIM...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="search-results" class="mt-4">
                    <!-- Hasil pencarian akan ditampilkan di sini -->
                </div>
            </div>
        </div>
    </main>
    <script src="../modules/script.js"></script>
    <script src="../modules/clear.js"></script>
</body>
</html>
