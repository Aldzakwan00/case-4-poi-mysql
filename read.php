<?php
include 'koneksi.php';

$sql = "SELECT * FROM POI";
$result = $conn->query($sql);

$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();
