<?php
include 'database.php'; //impor file yang berisi kode koneksi ke database.
include 'layoutatas.php'; //impor file untuk tata letak bagian atas halaman web
include 'tambahpemesan.php'; // file yang berisi logika untuk operasi tambah Pemesan.

session_start();

$massageSuccess = [];
$massageError = [];

if (isset($_POST["submit"])) {
    if (tambah($_POST, $connectdb) > 0) {
        $massageSuccess[] = "Berhasil Memesan Tiket.";
    } else {
        $massageError[] = "Gagal Memesan Tiket.";
    }
}

// Ambil nilai total tagihan dari session
$totalTagihan = isset($_SESSION["total"]) ? $_SESSION["total"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pemesanan Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>
<body style="
      background: rgb(0, 0, 0);
      background: -moz-linear-gradient(
        180deg,
        rgba(0, 0, 0, 1) 0%,
        rgba(0, 62, 109, 1) 100%
      );
      background: -webkit-linear-gradient(
        180deg,
        rgba(0, 0, 0, 1) 0%,
        rgba(0, 62, 109, 1) 100%
      );
      background: linear-gradient(
        180deg,
        rgba(0, 0, 0, 1) 0%,
        rgba(0, 62, 109, 1) 100%
      );
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000',endColorstr='#003e6d',GradientType=1);
    ">
  <h2 class="text-center mt-5 fw-semibold text-white">Formulir Pemesanan</h2>
  <hr class="text-center" style="color: white;">
  <div class="container mt-3 d-flex justify-content-center">
    <div class="row">
      <div class="col-md-12">
        <?php if (!empty($massageSuccess)) { ?>
          <div class="alert alert-success" role="alert">
            <?php foreach ($massageSuccess as $message) { ?>
              <?php echo $message; ?><br>
            <?php } ?>
          </div>
        <?php } ?>
        <?php if (!empty($massageError)) { ?>
          <div class="alert alert-danger" role="alert">
            <?php foreach ($massageError as $message) { ?>
              <?php echo $message; ?><br>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="container mt-3 d-flex justify-content-center">
    <form action="" method="post" class="mb-3 p-4" style="border-radius: 20px; width: 50%;">
      <label for="namapemesan" class="form-label fw-normal text-white mt-2">Nama Pemesan</label>
      <input type="text" class="form-control" id="namapemesan" name="namapemesan" placeholder="contoh: Maman" required>
      <label for="jenistiket" class="form-label fw-normal text-white mt-2">Jenis Tiket & Wahana</label>
        <select class="form-select" id="jenistiket" name="jenistiket" required>
          <option value="">Pilih jenis tiket</option>
          <option value="dewasa">Kolam Renang (Dewasa)</option>
          <option value="anak">Kolam Renang (Anak)</option>
          <option value="RumahSegitiga">Rumah Segitiga</option>
          <option value="infinityworld">Infinity World</option>
        </select>
      <label for="jumlahorang" class="form-label fw-normal text-white mt-2">Jumlah Orang</label>
      <input type="number" class="form-control" id="jumlahorang" name="jumlahorang" placeholder="contoh: 5" required>
      <label for="tanggal" class="form-label fw-normal text-white mt-2">Tanggal</label>
      <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" placeholder="" min="<?= date('Y-m-d\TH:i'); ?>" required>
      <!-- Menampilkan Total Tagihan -->
      <div class="text-white mt-3" id="totalTagihan"></div>
      <div class="d-flex justify-content-center">
        <a href="beranda.php" class="btn btn-danger mt-3 py-2 px-5">Kembali ke Halaman Beranda</a>
        <button name="submit" type="submit" class="mt-3 py-2 px-5 mx-2 btn btn-primary">Pesan Sekarang</button>
        <?php if (isset($totalTagihan) && $totalTagihan) : ?>
        <a href="detilpesanan.php">
            <button name="lihat_detail" type="button" class="mt-3 py-2 px-3 btn btn-success">Lihat Detail Pemesanan</button>
        </a>
        <?php endif; ?>
      </div>
    </form>
  </div>

 <!-- menghitung dan menampilkan total tagihan secara langsung -->
<script>
// cek perubahan pada input jumlah orang dan jenis tiket
document.getElementById('jumlahorang').addEventListener('input', hitungTotalTagihan);
document.getElementById('jenistiket').addEventListener('change', hitungTotalTagihan);

// Fungsi untuk menghitung total tagihan
function hitungTotalTagihan() {
  let jumlahOrang = parseInt(document.getElementById('jumlahorang').value) || 0;
  let jenisTiket = document.getElementById('jenistiket').value;

  // penghitungan sesuai dengan logika
  let hargaTiket = 0; // Atur harga tiket sesuai dengan jenis tiket
  if (jenisTiket === "dewasa") {
    hargaTiket = 25000;
  } else if (jenisTiket === "anak") {
    hargaTiket = 15000;
  } else if (jenisTiket === "RumahSegitiga") {
    hargaTiket = 10000;
  } else if (jenisTiket === "infinityworld") {
    hargaTiket = 20000;
  }

  let totalTagihan = jumlahOrang * hargaTiket;

  // Diskon jika jumlah peserta di atas 5
  if (jumlahOrang > 5) {
    let diskon = totalTagihan * 0.05; // 5% diskon
    totalTagihan -= diskon;
  }

  // Tampilkan total tagihan
  document.getElementById('totalTagihan').innerText = 'Total Tagihan: ' + totalTagihan;
}
</script>


  </>
</body>
</html>
