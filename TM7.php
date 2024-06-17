<?php
$server = '127.0.0.1';
$username = 'joe';
$password = '12345678';
$dbname = 'transaksiojol';

$conn = mysqli_connect($server, $username, $password, $dbname);

$rows = [];
$query = $conn->query('select * from jumlah_transaksi order by tanggal asc');
if($query->num_rows > 0){
    while ($row = $query->fetch_assoc())
    {
        $rows[] = [
            'tanggal' => $row['tanggal'],
            'jumlah_gojek' => $row['jumlah_gojek'],
            'jumlah_grab' => $row['jumlah_grab'],
            'jumlah_maxim' => $row['jumlah_maxim'],
        ];
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tugas PWeb TM 7 Halaman 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .judul{
            font-family: Lucida Bright;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center judul" style="height: 250px">
        <h1>Jumlah Transaksi Yang Terjadi Di Aplikasi Ojek Online</h1>
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
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Transaksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 0; ?>
                                <?php foreach($rows as $row): ?>
                                    <?php $counter++; ?>
                                    <tr>
                                        <td><?= $counter ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['jumlah_gojek'] ?></td>
                                        <td>
                                            <a href="TM7(4).php?tanggal=<?= urlencode($row['tanggal']) ?>" class="btn btn-secondary">Edit</a>
                                            <a href="TM7(10).php?tanggal=<?= urlencode($row['tanggal']) ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Transaksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 0; ?>
                                <?php foreach($rows as $row): ?>
                                    <?php $counter++; ?>
                                    <tr>
                                        <td><?=$counter ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['jumlah_grab'] ?></td>
                                        <td>
                                            <a href="TM7(6).php?tanggal=<?= urlencode($row['tanggal']) ?>" class="btn btn-secondary">Edit</a>
                                            <a href="TM7(10).php?tanggal=<?= urlencode($row['tanggal']) ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Transaksi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 0; ?>
                                <?php foreach($rows as $row): ?>
                                    <tr>
                                        <?php $counter++; ?>
                                        <td><?=$counter ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['jumlah_maxim'] ?></td>
                                        <td>
                                            <a href="TM7(8).php?tanggal=<?= urlencode($row['tanggal']) ?>" class="btn btn-secondary">Edit</a>
                                            <a href="TM7(10).php?tanggal=<?= urlencode($row['tanggal']) ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 200px">
        <a href="TM7(2).php" class="btn btn-primary btn-lg">Tambah Data Baru</a>
    </div>
    <div class="d-flex justify-content-center judul" style="height: 150px">
        <h1>Visualisasi Data</h1>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 500px">
        <canvas id="myChart" width="400" height="250"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php foreach($rows as $row):?>"<?= $row['tanggal'] ?>",<?php endforeach; ?>],
                    datasets: [{
                        label: 'Gojek',
                        data: [<?php foreach($rows as $row):?>"<?= $row['jumlah_gojek'] ?>",<?php endforeach; ?>],
                        backgroundColor: 'rgba(0, 128, 0, 0.2)',
                        borderColor: 'rgba(0, 128, 0, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Grab',
                        data: [<?php foreach($rows as $row):?>"<?= $row['jumlah_grab'] ?>",<?php endforeach; ?>],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Maxim',
                        data: [<?php foreach($rows as $row):?>"<?= $row['jumlah_maxim'] ?>",<?php endforeach; ?>],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
</body>
</html>