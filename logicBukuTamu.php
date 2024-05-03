<?php
function tambah($data_pengunjung, $connectdb) {
    // Mengambil data_pengunjung dari formulir atau inputan
    $nama_pengunjung = htmlspecialchars($data_pengunjung["nama_pengunjung"]);
    $telepon_pengunjung = htmlspecialchars($data_pengunjung["telepon_pengunjung"]);
    $pesan_pengunjung = htmlspecialchars($data_pengunjung["pesan_pengunjung"]);
    $tanggal = htmlspecialchars($data_pengunjung["tanggal"]);
    
    // membuat query untuk memasukkan data pemesan baru ke dalam tabel pengunjung
    $query = "INSERT INTO pengunjung VALUES ('', '$nama_pengunjung','$telepon_pengunjung','$pesan_pengunjung','$tanggal')"; 
    mysqli_query($connectdb, $query);

    // Mengembalikan jumlah baris yang terpengaruh oleh operasi query
    return mysqli_affected_rows($connectdb);

  }


