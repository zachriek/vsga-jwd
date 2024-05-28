<?php

if (isset($_POST['nama']) && isset($_POST['berat']) && isset($_POST['tinggi'])) {
  // mengambil data dari method POST
  $nama = $_POST['nama'];
  $berat = $_POST['berat'];
  $tinggi = $_POST['tinggi'];

  $nilai_bmi = $berat / ($tinggi * $tinggi);

  function get_grade($bmi)
  {
    if ($bmi > 30.0) {
      return "Obesitas";
    } else if ($bmi > 25.0) {
      return "Kegemukan";
    } else if ($bmi > 18.5) {
      return "Normal";
    } else {
      return "Kurus";
    }
  }

  $status_bmi = get_grade($nilai_bmi);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas HItung BMI</title>
  <link rel="stylesheet" href="../materi/css/bootstrap.min.css">
  <style>
    .max-width-td {
      max-width: 10px;
    }
  </style>
</head>

<body>
  <!-- Start --- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Aplikasi Hitung BMI</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <!-- End --- Navbar -->

  <!-- Start --- BMI Form -->
  <section id="bmi-section" class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <table class="table">
            <tbody>
              <tr>
                <td class="max-width-td">Nama</td>
                <td>: <?= $nama ?? ''; ?></td>
              </tr>
              <tr>
                <td class="max-width-td">Nilai BMI</td>
                <td>: <?= $nilai_bmi ?? ''; ?></td>
              </tr>
              <tr>
                <td class="max-width-td">Status BMI</td>
                <td>: <?= $status_bmi ?? ''; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- End --- BMI Form -->

  <script src="../materi/js/bootstrap.bundle.min.js"></script>
</body>

</html>