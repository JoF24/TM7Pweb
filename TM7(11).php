<?php
$server = '127.0.0.1';
$username = 'joe';
$password = '12345678';
$dbname = 'transaksiojol';

$conn = mysqli_connect($server, $username, $password, $dbname);
$tanggal = $_POST['tanggal'];
$sql = "DELETE FROM jumlah_transaksi WHERE tanggal = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $tanggal); 
$stmt->execute();
$stmt->close();
$conn->close();
header('location: TM7.php');
?>