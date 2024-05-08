<?php
include 'koneksi.php';

// Ambil nilai langsung dari $_POST
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$nama_lokasi = $_POST['nama_lokasi'];
$deskripsi_lokasi = $_POST['deskripsi_lokasi']; 
$rating = $_POST['rating'];
$kategori = $_POST['kategori'];
$waktu_buka = $_POST['waktu_buka'];
$kontak_lokasi = $_POST['kontak_lokasi'];

// Query untuk memeriksa apakah koordinat sudah ada di database
$check_query = "SELECT * FROM Informasi WHERE Koordinat_Latitude='$latitude' AND Koordinat_Longitude='$longitude'";
$check_result = mysqli_query($conn, $check_query);

// Jika sudah ada, tampilkan pesan kesalahan
if (mysqli_num_rows($check_result) > 0) {
    echo "Koordinat tersebut sudah ada dalam database. Mohon masukkan koordinat yang berbeda.";
} else {
    // Jika belum ada, lakukan penyimpanan data
    $sql = "INSERT INTO Informasi (Koordinat_Latitude, Koordinat_Longitude, Nama_Lokasi, Deskripsi_Lokasi, Rating, Kategori, Waktu_Buka, Kontak_Lokasi) VALUES ('$latitude', '$longitude', '$nama_lokasi', '$deskripsi_lokasi', '$rating', '$kategori', '$waktu_buka', '$kontak_lokasi')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.html");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
