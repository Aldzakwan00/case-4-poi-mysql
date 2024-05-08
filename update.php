<?php
include 'koneksi.php';

if (
    isset($_POST['original_latitude']) && isset($_POST['original_longitude']) && 
    isset($_POST['new_latitude']) && isset($_POST['new_longitude']) && 
    isset($_POST['nama_lokasi']) && isset($_POST['deskripsi_lokasi']) && 
    isset($_POST['rating']) && isset($_POST['kategori']) && 
    isset($_POST['waktu_buka']) && isset($_POST['kontak_lokasi'])
) {
    $original_latitude = $_POST['original_latitude'];
    $original_longitude = $_POST['original_longitude'];
    $new_latitude = $_POST['new_latitude'];
    $new_longitude = $_POST['new_longitude'];
    $nama_lokasi = $_POST['nama_lokasi'];
    $deskripsi = $_POST['deskripsi_lokasi'];
    $rating = $_POST['rating'];
    $kategori = $_POST['kategori'];
    $waktu_buka = $_POST['waktu_buka'];
    $kontak = $_POST['kontak_lokasi'];

    $update_query = "UPDATE Informasi SET 
        Nama_Lokasi = '$nama_lokasi', 
        Koordinat_Latitude = $new_latitude, 
        Koordinat_Longitude = $new_longitude, 
        Deskripsi_Lokasi = '$deskripsi', 
        Rating = $rating, 
        Kategori = '$kategori', 
        Waktu_Buka = '$waktu_buka', 
        Kontak_Lokasi = '$kontak'
    WHERE 
        Koordinat_Latitude = '$original_latitude' AND Koordinat_Longitude = '$original_longitude'";

    if ($stmt = $conn->prepare($update_query)) {
        if ($stmt->execute()) {
            header("Location: index.html");
            exit();
        } 
    } 
}
