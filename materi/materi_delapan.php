<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
    <!-- BAGIAN NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Aplikasi VSGA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">VSGA</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END BAGIAN NAVBAR -->

    <?php
    $daftarKota = array("Jakarta", "Lampung", "Surabaya", "Semarang", "Padang", "Medan");

    $daftarKotaLain = ["Pontianak", "Palembang"];
    ?>

    <div class="container">
        <h4>Form Data Karyawan</h4>
        <form action="" method="post">
            <div class="mb-3"> <!-- Input nama karyawan -->
                <label for="nama" class="form-label">Nama Karyawan</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="mb-3"> <!-- Input Jenis Kelamin -->
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender">
                    <label class="form-check-label" for="gender">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender">
                    <label class="form-check-label" for="gender">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="golongan" class="form-label">Golongan</label>
                <select class="form-select">
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Asal Kota</label>
                <select class="form-select">
                    <?php
                    //untuk menampilkan array di combo box
                    foreach ($daftarKotaLain as $bebas) {
                        echo "<option value='$bebas'> $bebas </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="kendaraan" class="form-label">Kendaraan</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Mobil" name="kendaraan[]" id="kendaraanMobil">
                    <label class="form-check-label" for="kendaraanMobil">
                        Mobil
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Motor" name="kendaraan[]" id="kendaraanMotor">
                    <label class="form-check-label" for="kendaraanMotor">
                        Motor
                    </label>
                </div>
            </div>
        </form>
    </div>
</body>

<script src="js/bootstrap.js"></script>

</html>