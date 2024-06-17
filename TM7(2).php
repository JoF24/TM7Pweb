<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tugas PWeb TM 7 Form Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .judul{
            font-family: Lucida Bright;
        }
        .warna-hijau{
            background-color: #9BCF53;
        }
        .warna-biru{
            background-color: #7BD3EA;
        }
        .warna-kuning{
            background-color: #FDFFAB;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center judul" style="height: 250px">
        <h1>Formulir Tambah Data Baru</h1>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card text-center" style="width: 700px">
            <h3 class="card-header">Formulir Transaksi Ojek Online</h3>
            <div class="card-body">
                <form action="TM7(3).php" method="post">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                        <label for="tanggal">Tanggal :</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control warna-hijau" id="jumlah_gojek" name="jumlah_gojek">
                        <label for="jumlah_gojek">Jumlah Aplikasi Gojek</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control warna-biru" id="jumlah_grab" name="jumlah_grab">
                        <label for="jumlah_grab">Jumlah Aplikasi Grab</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control warna-kuning" id="jumlah_maxim" name="jumlah_maxim">
                        <label for="jumlah_maxim">Jumlah Aplikasi Maxim</label>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <button type="submit" class="btn btn-success btn-lg">Kirim</button>
                        </div>
                        <div class="col-6 mb-3">
                            <button type="button" class="btn btn-danger btn-lg" onclick="window.location.href='TM7.php';">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>