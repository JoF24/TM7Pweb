<?php
$server = '127.0.0.1';
$username = 'joe';
$password = '12345678';
$dbname = 'transaksiojol';

$conn = mysqli_connect($server, $username, $password, $dbname);
$tanggal = $_POST['tanggal'];
$jumlah_gojek = $_POST['jumlah_gojek'];
$query = "UPDATE jumlah_transaksi SET jumlah_gojek=? WHERE tanggal=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("is", $jumlah_gojek, $tanggal);
$stmt->execute();
$stmt->close();
$conn->close();
header("location: TM7.php")
?>