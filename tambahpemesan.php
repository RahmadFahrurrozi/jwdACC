<?php
function tambah($data_pemesan, $connectdb) {
    // Mengambil data_pemesan dari formulir atau inputan
    $nama = htmlspecialchars($data_pemesan["namapemesan"]); // Mengambil nama pemesan
    $jenis = htmlspecialchars($data_pemesan["jenistiket"]); // Mengambil jenis tiket
    $peserta = htmlspecialchars($data_pemesan["jumlahorang"]); // Mengambil jumlah orang
    $tanggal = htmlspecialchars($data_pemesan["tanggal"]); // Mengambil tanggal
    
    $hargaperorang = 0; // Inisialisasi harga per orang
    
    // Menghitung harga per orang berdasarkan jenis tiket
    if ($jenis == "dewasa") {
        $hargaperorang = 25000;
    } elseif ($jenis == "anak") {
        $hargaperorang = 15000;
    } elseif ($jenis == "RumahSegitiga") {
        $hargaperorang = 10000;
    } elseif ($jenis == "infinityworld") {
        $hargaperorang = 20000;
    }

    // Menghitung total biaya berdasarkan harga per orang dan jumlah peserta
    $total = $hargaperorang * $peserta;

    // Diskon jika jumlah peserta di atas 5
    if ($peserta > 5) {
        $diskon = $total * 0.05; // 5% diskon
        $total -= $diskon;
        $_SESSION["diskon"] = $diskon;
    } else {
        $_SESSION["diskon"] = 0;
    }

    // Menyiapkan query untuk memasukkan data ke dalam database
    $query = "INSERT INTO wisatawan VALUES ('', '$nama','$jenis','$peserta','$hargaperorang','$total','$tanggal')"; 
    
    // Menjalankan query menggunakan koneksi database yang diberikan
    mysqli_query($connectdb, $query);

    $_SESSION["pesanan_berhasil"] = true;

    // Simpan data pemesanan dalam session untuk ditampilkan di halaman detilpemesanan.php
    $_SESSION["nama"] = $nama;
    $_SESSION["jenis"] = $jenis;
    $_SESSION["peserta"] = $peserta;
    $_SESSION["hargaperorang"] = $hargaperorang;
    $_SESSION["tanggal"] = $tanggal;
    $_SESSION["total"] = $total;
    // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
    return mysqli_affected_rows($connectdb);
}
?>
