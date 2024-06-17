<?php
$server = '127.0.0.1';
$username = 'joe';
$password = '12345678';
$dbname = 'transaksiojol';

$conn = mysqli_connect($server, $username, $password, $dbname);
$tanggal = $_POST['tanggal'];
$jumlah_maxim = $_POST['jumlah_maxim'];
$query = "UPDATE jumlah_transaksi SET jumlah_maxim=? WHERE tanggal=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("is", $jumlah_maxim, $tanggal);
$stmt->execute();
$stmt->close();
$conn->close();
header("location: TM7.php")
?>