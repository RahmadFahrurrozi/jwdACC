<?php
session_start();

if (isset($_SESSION["pesanan_berhasil"]) && $_SESSION["pesanan_berhasil"]) {
    // Ambil data pemesanan dari session
    $nama = isset($_SESSION["nama"]) ? $_SESSION["nama"] : "";
    $jenis = isset($_SESSION["jenis"]) ? $_SESSION["jenis"] : "";
    $peserta = isset($_SESSION["peserta"]) ? $_SESSION["peserta"] : "";
    $hargaperorang = isset($_SESSION["hargaperorang"]) ? $_SESSION["hargaperorang"] : "";
    $tanggal = isset($_SESSION["tanggal"]) ? $_SESSION["tanggal"] : "";
    $total = isset($_SESSION["total"]) ? $_SESSION["total"] : "";
    $diskon = isset($_SESSION["diskon"]) ? $_SESSION["diskon"] : 0;
    // Hapus status pesanan berhasil dari session
    unset($_SESSION["pesanan_berhasil"]);

    // Hapus data pemesanan dari session jika sudah ditampilkan
    unset($_SESSION["nama"]);
    unset($_SESSION["jenis"]);
    unset($_SESSION["peserta"]);
    unset($_SESSION["hargaperorang"]);
    unset($_SESSION["tanggal"]);
    unset($_SESSION["total"]);
    unset($_SESSION["diskon"]);
} else {
    // Redirect ke halaman lain jika tidak ada data pemesanan yang tersedia
    header("Location: beranda.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detil Pemesanan</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center fw-semibold text-dark">Detail Penambahan Pemesanan</h2>
        <hr>
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <div class="card text-dark bg-transparent">
                    <div class="card-body">
                        <p class="card-title">Nama Pemesan: <?php echo $nama; ?></p>
                        <hr>
                        <p class="card-text">Jenis Tiket & Wahana: <?php echo $jenis; ?></p>
                        <hr>
                        <p class="card-text">Jumlah Orang: <?php echo $peserta; ?></p>
                        <hr>
                        <p class="card-text">Harga per Orang: <?php echo $hargaperorang; ?></p>
                        <hr>
                        <p class="card-text">Tanggal Pemesanan: <?php echo $tanggal; ?></p>
                        <hr>
                        <p class="card-text">Diskon: Rp. <?php echo $diskon; ?></p>
                        <hr>
                        <p class="card-text">Total Harga: Rp. <?php echo $total; ?></p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="dashboardadmin.php" class="btn btn-danger">Kembali Halaman Dashboard</a>
                    <a href="tambahDataPemesan.php" class="btn btn-success">Tambah Data Lagi?</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
