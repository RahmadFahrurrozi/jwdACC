<<?php
// Mengimpor file database.php dan tambahpemesan.php
require 'database.php'; // Mengimpor file database.php yang berisi koneksi ke database.
include 'tambahpemesan.php'; // Mengimpor file tambahpemesan.php yang mungkin berisi fungsi-fungsi terkait pemesanan.

// cek apakah parameter id_pemesan dikirim melalui URL
if(isset($_GET['id_pemesan'])) { // Memeriksa apakah parameter 'id_pemesan' telah dikirim melalui URL.
    $id_pemesan = $_GET['id_pemesan']; // Mengambil nilai 'id_pemesan' dari URL dan menyimpannya dalam variabel $id_pemesan.
    
    // Mengambil data pemesan berdasarkan id_pemesan
    $query = "SELECT * FROM wisatawan WHERE id_pemesan = $id_pemesan"; // Membuat query SQL untuk mengambil data pemesan berdasarkan id_pemesan yang diberikan.
    $result = mysqli_query($connectdb, $query); // Menjalankan query SQL menggunakan koneksi database yang sudah terbuka.
    $dataPemesan = mysqli_fetch_assoc($result); // Mengambil hasil query dan menyimpannya dalam bentuk array asosiatif $dataPemesan.
}

if(isset($_POST['update'])) { // Memeriksa apakah form telah disubmit dengan tombol bernama 'update'.
    // Mengambil nilai yang dikirimkan melalui formulir dan melakukan sanitasi
    $id_pemesan = $_POST['id_pemesan']; // Mengambil nilai 'id_pemesan' dari formulir yang disubmit.
    $namapemesan = mysqli_real_escape_string($connectdb, $_POST['namapemesan']); // Mengambil nama pemesan dari formulir dan melindunginya dari serangan SQL injection menggunakan fungsi mysqli_real_escape_string.
    $jenistiket = mysqli_real_escape_string($connectdb, $_POST['jenistiket']); // Mengambil jenis tiket dari formulir dan melindunginya dari serangan SQL injection menggunakan fungsi mysqli_real_escape_string.
    $jumlahorang = $_POST['jumlahorang']; // Mengambil jumlah orang dari formulir yang disubmit.
    
    // Mengatur harga per orang berdasarkan jenis tiket yang dipilih
    $harga_per_orang = 0; // Inisialisasi variabel harga_per_orang.
    if ($jenistiket == "Kolam Renang (Dewasa)") { // Memeriksa jenis tiket yang dipilih.
        $harga_per_orang = 25000; // Mengatur harga per orang sesuai dengan jenis tiket.
    } elseif ($jenistiket == "Kolam Renang (Anak)") {
        $harga_per_orang = 15000;
    } elseif ($jenistiket == "Rumah Segitiga") {
        $harga_per_orang = 10000;
    } elseif ($jenistiket == "Infinity World") {
        $harga_per_orang = 20000;
    }
    $diskon = 0;
    // Hitung total harga berdasarkan jumlah orang dan harga per orang
    $total = $harga_per_orang * $jumlahorang; // Menghitung total harga berdasarkan harga per orang dan jumlah orang.
    if ($jumlahorang > 5) {
    $diskon = $total * 0.05; // 5% diskon
    $total -= $diskon;
    $_SESSION["diskon"] = $diskon; // Simpan informasi diskon dalam sesi
    } else {
    $_SESSION["diskon"] = 0; // Jika tidak ada diskon, set nilai sesi diskon menjadi 0
    }
    $tanggal = $_POST['tanggal']; // Mengambil tanggal dari formulir yang disubmit.
    
    // Query untuk update data pemesan
    $query = "UPDATE wisatawan SET namapemesan='$namapemesan', jenistiket='$jenistiket', jumlahorang='$jumlahorang', total='$total', tanggal='$tanggal' WHERE id_pemesan='$id_pemesan'";
    // Membuat query SQL untuk mengupdate data pemesan berdasarkan id_pemesan yang diberikan.
    $result = mysqli_query($connectdb, $query); // Menjalankan query SQL menggunakan koneksi database yang sudah terbuka.

    // Memeriksa apakah query berhasil dieksekusi
    if($result) { // Jika query berhasil dieksekusi:
        // Redirect kembali ke halaman utama setelah mengupdate data
        header("Location: dashboardadmin.php"); // Mengarahkan pengguna kembali ke halaman dashboard admin.
        exit; // Menghentikan eksekusi skrip PHP.
    } else {
        echo "Error updating record: " . mysqli_error($connectdb); // Jika terjadi kesalahan dalam proses update, menampilkan pesan error.
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Pemesan</title>
  <link rel="stylesheet" href="style.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
  />
</head>
<body>
  <div class="container mt-5">
    <h1>Edit Data Pemesan</h1>
    <hr>
    <form method="POST">
      <div class="mb-3">
        <label for="namapemesan" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" id="namapemesan" name="namapemesan" value="<?= $dataPemesan['namapemesan']; ?>">
      </div>
      <div class="mb-3">
        <label for="jenistiket" class="form-label fw-normal">Jenis Tiket & Wahana</label>
        <select class="form-select" id="jenistiket" name="jenistiket" required>
          <option value="Kolam Renang (Dewasa)" <?= ($dataPemesan['jenistiket'] == 'Kolam Renang (Dewasa)') ? 'selected' : ''; ?>>Kolam Renang (Dewasa)</option>
          <option value="Kolam Renang (Anak)" <?= ($dataPemesan['jenistiket'] == 'Kolam Renang (Anak)') ? 'selected' : ''; ?>>Kolam Renang (Anak)</option>
          <option value="Rumah Segitiga" <?= ($dataPemesan['jenistiket'] == 'Rumah Segitiga') ? 'selected' : ''; ?>>Rumah Segitiga</option>
          <option value="Infinity World" <?= ($dataPemesan['jenistiket'] == 'Infinity World') ? 'selected' : ''; ?>>Infinity World</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="jumlahorang" class="form-label">Jumlah Tiket</label>
        <input type="number" class="form-control" id="jumlahorang" name="jumlahorang" value="<?= $dataPemesan['jumlahorang']; ?>">
      </div>
      <div class="mb-3">
        <label for="total" class="form-label">Total</label>
        <input type="text" class="form-control" id="total" name="total" value="<?= $dataPemesan['total']; ?>">
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal Order</label>
       <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d\TH:i'); ?>" min="<?= date('Y-m-d\TH:i'); ?>">

      <input type="hidden" name="id_pemesan" value="<?= $dataPemesan['id_pemesan']; ?>">
      <a href="dashboardadmin.php">
        <button type="button" class="btn btn-danger">Kembali</button>
      </a>
      <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"
  ></script>
</body>
</html>
