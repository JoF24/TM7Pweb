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
    <title>Tugas PWeb TM 7 Halaman Hapus Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .judul{
            font-family: Lucida Bright;
        }
        .warna-merah{
            background-color: #FF204E;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center judul" style="height: 250px">
        <h1>Halaman Hapus Data</h1>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-6 mb-3" style="width: 640px">
                <div class="card text-center">
                    <h3 class="card-header">Data Aplikasi Gojek</h3>
                    <div class="card-body">
                        <table class="table table-striped table-success table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= htmlspecialchars($data['tanggal']) ?></td>
                                    <td><?= htmlspecialchars($data['jumlah_gojek']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 md-3">
                <div class="card text-center" style="width: 640px">
                    <h3 class="card-header">Data Aplikasi Grab</h3>
                    <div class="card-body">
                        <table class="table table-striped table-primary table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                    
                                    <td><?= htmlspecialchars($data['tanggal']) ?></td>
                                    <td><?= htmlspecialchars($data['jumlah_grab']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-6 mb-3">
                <div class="card text-center" style="width: 640px">
                    <h3 class="card-header">Data Aplikasi Maxim</h3>
                    <div class="card-body">
                        <table class="table table-striped table-warning table-hover">
                            <thead>
                                <tr>                                    
                                    <th>Tanggal</th>
                                    <th>Jumlah Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= htmlspecialchars($data['tanggal']) ?></td>
                                    <td><?= htmlspecialchars($data['jumlah_maxim']) ?></td>
                                </tr>                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body bg-danger text-white">
                <form action="TM7(11).php" method="post">
                    <div class="col-12 mb-3">
                        <label for="tanggal">Apakah Anda Yakin Ingin Menghapus Seluruh Data Pada Tanggal :</label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal" value ="<?= htmlspecialchars($data['tanggal']) ?>" readonly>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <button type="submit" class="btn warna-merah text-white">Hapus</button>
                        </div>
                        <div class="col-6 mb-3">
                            <button type="button" onclick="window.location.href='TM7.php';" class="btn btn-success">Tidak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>