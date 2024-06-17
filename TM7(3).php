<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tugas PWeb TM 7 Insert Data </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .judul{
        font-family: Lucida Bright;
    }
    </style>
</head>
<body>
<?php
function myPost($key)
{
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }
    return '';
}

$tanggal = myPost('tanggal');
$jumlah_gojek = myPost('jumlah_gojek');
$jumlah_grab = myPost('jumlah_grab');
$jumlah_maxim = myPost('jumlah_maxim');

$server = '127.0.0.1';
$username = 'joe';
$password = '12345678';
$dbname = 'transaksiojol';

$conn = mysqli_connect($server, $username, $password, $dbname);
$query = "SELECT COUNT(*) as count FROM jumlah_transaksi WHERE tanggal = '$tanggal'";
$hasil = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($hasil);
$count = $row['count'];

if($count > 0){
    $conn->close();
    ?>
    <div class="d-flex justify-content-center align-items-center judul" style="height: 250px">
        <h3>Data Sudah Ada Di Database</h3>
    </div>
    <div class="d-flex justify-content-center">
        <a href="TM7.php" class="btn btn-danger btn-lg">Kembali</a>
    </div>
    <?php
}else{
    $stmt = $conn->prepare("insert into jumlah_transaksi (tanggal,jumlah_gojek,jumlah_grab,jumlah_maxim) values(?,?,?,?)");
    $stmt->bind_param("siii", $tanggal, $jumlah_gojek, $jumlah_grab, $jumlah_maxim);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    ?>
    <div class="d-flex justify-content-center align-items-center judul" style="height: 250px">
        <h3>Data Berhasil Disimpan</h3>
    </div>
    <div class="d-flex justify-content-center">
        <a href="TM7.php" class="btn btn-success btn-lg">Kembali</a>
    </div>
    <?php
}
?>
</body>
</html>

