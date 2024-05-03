<?php
include 'database.php'; //impor file yang berisi kode koneksi ke database.
include 'layoutatas.php'; //impor file untuk tata letak bagian atas halaman web
include 'logicBukuTamu.php'; // file yang berisi logika untuk mengoperasikan buku tamu.


$massageSuccess = []; // Inisialisasi array untuk menyimpan pesan sukses.
$massageError = []; // Inisialisasi array untuk menyimpan pesan error.
 
if (isset($_POST["submit"])) { // ceek/Periksa apakah formulir telah disubmit.
    if (tambah($_POST, $connectdb) > 0) { // Panggil fungsi 'tambah' untuk menambahkan entri buku tamu.
        $massageSuccess[] = "Terimakasih sudah mengisi buku tamu!"; // menambahkan pesan sukses jika operasi berhasil.
    } else {
        $massageError[] = "Gagal mengisi data tamu."; // menambahkan pesan error jika operasi gagal.
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulir Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>
<body>
    <h2 class="text-center mt-5 fw-semibold text-white">Formulir Buku Tamu</h2>
    <hr class="text-center" style="color: white" />
    <div class="container mt-3 d-flex justify-content-center">
        <div class="row">
            <!-- menampilkan pesan sukses atau error -->
            <div class="col-md-12">
                <?php if (!empty($massageSuccess)) { ?>
                <div class="alert alert-success" role="alert"> <!-- Menampilkan pesan sukses -->
                    <?php foreach ($massageSuccess as $message) { ?>
                    <?php echo $message; ?><br />
                    <?php } ?>
                </div>
                <?php } ?>
                <?php if (!empty($massageError)) { ?> <!-- Menampilkan pesan error -->
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($massageError as $message) { ?>
                    <?php echo $message; ?><br />
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container mt-3 d-flex justify-content-center">
        <form action="" method="post" class="mb-3 p-4" style="border-radius: 20px; width: 50%">
            <label for="nama_pengunjung" class="form-label fw-normal text-white mt-2">Nama</label>
            <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" placeholder="contoh: Maman" required />
            
            <label for="telepon_pengunjung" class="form-label fw-normal text-white mt-2">Telepon</label>
            <input type="text" class="form-control" id="telepon_pengunjung" name="telepon_pengunjung" placeholder="contoh: 081234567890" required />
            
            <label for="pesan_pengunjung" class="form-label fw-semibold mt-2 text-white">Pesan</label>
            <textarea class="form-control" id="pesan_pengunjung" name="pesan_pengunjung" placeholder="Masukkan pesan..." rows="3"></textarea>
            
            <label for="tanggal" class="form-label fw-normal text-white mt-2">Tanggal</label>
            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" min="<?= date('Y-m-d\TH:i'); ?>" required />
            
            <div class="text-white mt-3"></div>
            <div class="d-flex justify-content-center">
                <a href="beranda.php" class="mt-3 py-2 px-5 btn btn-danger mx-2">Kembali ke Halaman Beranda</a>
                <button name="submit" type="submit" class="mt-3 py-2 px-5 btn btn-primary">Submit</button>
                <button id="detailButton" class="mt-3 py-2 px-5 btn btn-success d-none">Detail Pemesanan</button>
            </div>
        </form>
    </div>
</body>
</html>
