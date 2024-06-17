<?php
$server = '127.0.0.1';
$username = 'joe';
$password = '12345678';
$dbname = 'transaksiojol';

$conn = mysqli_connect($server, $username, $password, $dbname);

$tanggal = $_GET['tanggal'] ?? '';

$sql = "SELECT * FROM jumlah_transaksi WHERE tanggal = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $tanggal);
$stmt->execute();
$hasil = $stmt->get_result();
$data = $hasil->fetch_assoc();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PWeb TM 7 Form Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .judul{
            font-family: Lucida Bright;
        }
        .warna-hijau{
            background-color: #9BCF53;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center judul" style="height: 250px">
        <h3>Halaman Edit Data</h3>
    </div>
    <div class="d-flex justify-content-center align-items-start" style="height: 300px">
        <div class="card" style="width: 400px">
            <h3 class="card-header text-center">Data Saat Ini</h3>
            <div class="card-body bg-success text-white">
                <form action="#">
                    <div class="col-6 mb-3">
                        <label>Tanggal:</label>
                        <input class="form-control" type="text" name="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>" readonly>
                    </div>
                    <div class="col-6 mb-3">
                        <label>Jumlah Transaksi Gojek:</label>
                        <input class="form-control" type="text" name="jumlah_gojek" value="<?= htmlspecialchars($data['jumlah_gojek']) ?>" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 300px">
        <div class="card" style="width: 400px">
            <h3 class="card-header text-center">Data Baru</h3>
            <div class="card-body warna-hijau">
                <form action="TM7(5).php" method="post">
                    <div class="col-6 mb-3">
                        <label>Tanggal:</label>
                        <input class="form-control" type="text" name="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>" readonly>
                    </div>
                    <div class="col-6 mb-3">
                        <label>Jumlah Transaksi Gojek:</label>
                        <input class="form-control" type="text" name="jumlah_gojek" value="<?= htmlspecialchars($data['jumlah_gojek']) ?>">
                    </div>
                    <div class="row text-center">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
