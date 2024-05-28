<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas HItung BMI</title>
  <link rel="stylesheet" href="../materi/css/bootstrap.min.css">
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
          <h4 class="mb-4">Form Hitung BMI</h4>
          <form action="proses_bmi.php" method="POST">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="mb-3">
              <label for="berat" class="form-label">Berat Badan (kg)</label>
              <input type="number" name="berat" id="berat" class="form-control">
              <div class="form-text">Masukkan dengan angka</div>
            </div>
            <div class="mb-3">
              <label for="tinggi" class="form-label">Tinggi Badan (m)</label>
              <input type="decimal" name="tinggi" id="tinggi" class="form-control">
              <div class="form-text">Masukkan dengan angka</div>
            </div>
            <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- End --- BMI Form -->

  <script src="../materi/js/bootstrap.bundle.min.js"></script>
</body>

</html>