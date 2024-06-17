<?php
$server = '127.0.0.1';
$username = 'joe';
$password = '12345678';
$dbname = 'transaksiojol';

$conn = mysqli_connect($server, $username, $password, $dbname);
$tanggal = $_POST['tanggal'];
$jumlah_grab = $_POST['jumlah_grab'];
$query = "UPDATE jumlah_transaksi SET jumlah_grab=? WHERE tanggal=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("is", $jumlah_grab, $tanggal);
$stmt->execute();
$stmt->close();
$conn->close();
header("location: TM7.php")
?>