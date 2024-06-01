<?php
$daftarJenisKelamin = array("Laki-Laki", "Perempuan");
$daftarGolongan = ["I", "II", "III", "IV"];

// mengambil data file json
$fileDataKaryawan = "data/data_karyawan.json";
$isiDataKaryawan = file_get_contents($fileDataKaryawan);

$daftarKaryawan = array();
// mengubah data karyawan menjadi ke array associative
$daftarKaryawan = json_decode($isiDataKaryawan, true) ?? [];

if (isset($_POST['btnSimpan'])) { // jika btnSimpan di klik

  // get data dari post
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $jenisKelamin = $_POST['jeniskelamin'];
  $golongan = $_POST['golongan'];

  // data karyawan yang diinput ke dalam array
  $dataKaryawan = array(
    "nik" => $nik,
    "nama" => $nama,
    "jenisKelamin" => $jenisKelamin,
    "golongan" => $golongan
  );

  // memasukkan array data karyawan yang baru, ke daftar karyawan sebelumnya
  array_push($daftarKaryawan, $dataKaryawan);

  // mengubah array data karyawan ke json format
  $dataYangInginDitulisKeFile = json_encode($daftarKaryawan, JSON_PRETTY_PRINT);

  // tulis ke file data ke json
  file_put_contents($fileDataKaryawan, $dataYangInginDitulisKeFile);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project</title>

  <!-- Memanggil CSS Bootstrap-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <!-- Content -->
  <div class="container pt-4">
    <h1> Aplikasi Data Karyawan</h1>
    <hr>
    <form action="#" method="post">
      <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control">
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Karyawan</label>
        <input type="text" name="nama" id="nama" class="form-control">
      </div>
      <div class="mb-3">
        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
        <select class="form-select" name="jeniskelamin" id="jeniskelamin">
          <?php
          for ($jk = 0; $jk < count($daftarJenisKelamin); $jk++) {
            echo "<option value='$daftarJenisKelamin[$jk]'> $daftarJenisKelamin[$jk] </option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="golongan" class="form-label">Golongan</label>
        <select name="golongan" id="golongan" class="form-select">
          <?php
          foreach ($daftarGolongan as $gol) {
            echo "<option value='$gol'> $gol </option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary" name="btnSimpan" id="btnSimpan">
          Simpan
        </button>
      </div>
    </form>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <td>NIK</td>
          <td>Nama Karyawan</td>
          <td>Jenis Kelamin</td>
          <td>Golongan</td>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($daftarKaryawan as $karyawan) {
          echo "<tr>";
          echo "<td>" . $karyawan['nik'] . "</td>";
          echo "<td>" . $karyawan['nama'] . "</td>";
          echo "<td>" . $karyawan['jenisKelamin'] . "</td>";
          echo "<td>" . $karyawan['golongan'] . "</td>";
          //echo "<td>". $karyawan['']. "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
      <tfoot></tfoot>
    </table>
  </div>
  <!-- / Content -->

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>