<?php
include 'koneksi.php';

if (
    isset($_POST['original_latitude']) && isset($_POST['original_longitude'])
) {
    $original_latitude = $_POST['original_latitude'];
    $original_longitude = $_POST['original_longitude'];

    $update_query = "DELETE FROM Informasi
                        WHERE 
                        Koordinat_Latitude = '$original_latitude' AND Koordinat_Longitude = '$original_longitude'";

    if ($stmt = $conn->prepare($update_query)) {
        if ($stmt->execute()) {
            header("Location: index.html");
            exit();
        } 
    } 
}
