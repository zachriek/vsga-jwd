<?php

$daftar_jenis_kelamin = ['Laki-laki', 'Perempuan'];
$daftar_agama = ['Islam', 'Kristen', 'Hindu', 'Buddha', 'Konghucu'];
$daftar_jurusan = ['Teknik Informatika', 'Kedokteran', 'Ekonomi', 'Hukum', 'Psikologi', 'Teknik Elektro', 'Sastra Inggris'];
$daftar_mata_kuliah = ['Pemrograman Dasar', 'Matematika Diskrit', 'Basis Data', 'Algoritma dan Struktur Data', 'Fisika Dasar', 'Akuntansi Keuangan', 'Pengantar Hukum', 'Psikologi Umum', 'Bahasa Inggris', 'Manajemen Proyek'];

// Pesan Error
$error_messages = [
  "nim" => [null, null],
  "alamat" => [null],
  "nama" => [null],
  "no_telepon" => [null, null, null],
  "jenis_kelamin" => [null, null],
  "email" => [null, null],
  "tempat_lahir" => [null],
  "jurusan" => [null, null],
  "tanggal_lahir" => [null, null],
  "mata_kuliah" => [null, null],
  "agama" => [null, null],
  "nilai" => [null, null, null],
];

// Folder Data Mahasiswa
$file_data_mahasiswa = "data/data_mahasiswa.json";

// Mengambil Data Mahasiswa
$isi_data_mahasiswa = file_get_contents($file_data_mahasiswa);

// Mengubah Data Menjadi Array
$daftar_mahasiswa = json_decode($isi_data_mahasiswa, true) ?? [];

// Jika Tombol Submit Diklik
if (isset($_POST['btn_save_mahasiswa'])) {
  // Validasi Data yang Dimasukkan
  $is_save = validateInput();

  // Jika Validasi Berhasil
  if ($is_save) {
    // Masukkan Data ke Dalam variabel 'data_mahasiswa'
    $data_mahasiswa = [
      "nim" => $_POST["nim"],
      "alamat" => $_POST["alamat"],
      "nama" => $_POST["nama"],
      "no_telepon" => $_POST["no_telepon"],
      "jenis_kelamin" => $_POST["jenis_kelamin"],
      "email" => $_POST["email"],
      "tempat_lahir" => $_POST["tempat_lahir"],
      "jurusan" => $_POST["jurusan"],
      "tanggal_lahir" => $_POST["tanggal_lahir"],
      "mata_kuliah" => $_POST["mata_kuliah"],
      "agama" => $_POST["agama"],
      "nilai" => $_POST["nilai"],
    ];

    // Masukkan ke variabel 'daftar_mahasiswa'
    array_push($daftar_mahasiswa, $data_mahasiswa);

    // Ubah Menjadi JSON
    $data_mahasiswa_encode = json_encode($daftar_mahasiswa, JSON_PRETTY_PRINT);

    // Masukkan Data Baru
    file_put_contents($file_data_mahasiswa, $data_mahasiswa_encode);
  }
}

// Validasi data yang dimasukkan
function validateInput()
{
  // penggunaan 'global' agar bisa memakai variabel di luar scope function ini
  global $error_messages;
  global $daftar_jenis_kelamin;
  global $daftar_jurusan;
  global $daftar_mata_kuliah;
  global $daftar_agama;

  $is_save = true;

  if ($_POST['nim'] == "") {
    $error_messages["nim"][0] = "NIM harus diisi!";
    $is_save = false;
  }
  if (!(int)$_POST["nim"]) {
    $error_messages["nim"][1] = "NIM tidak sesuai!";
    $is_save = false;
  }

  if ($_POST["alamat"] == "") {
    $error_messages["alamat"][0] = "Alamat harus diisi!";
    $is_save = false;
  }

  if ($_POST["nama"] == "") {
    $error_messages["nama"][0] = "Nama harus diisi!";
    $is_save = false;
  }

  if ($_POST["no_telepon"] == "") {
    $error_messages["no_telepon"][0] = "No Telepon harus diisi!";
    $is_save = false;
  }
  if (!(int)$_POST["no_telepon"]) {
    $error_messages["no_telepon"][1] = "No Telepon tidak sesuai!";
    $is_save = false;
  }
  if (strlen($_POST["no_telepon"]) < 10) {
    $error_messages["no_telepon"][2] = "No Telepon harus diisi minimal 10 angka!";
    $is_save = false;
  }

  if ($_POST["jenis_kelamin"] == "") {
    $error_messages["jenis_kelamin"][0] = "Jenis Kelamin harus diisi!";
    $is_save = false;
  }
  if (!in_array($_POST["jenis_kelamin"], $daftar_jenis_kelamin)) {
    $error_messages["jenis_kelamin"][1] = "Jenis Kelamin tidak sesuai!";
    $is_save = false;
  }

  if ($_POST["email"] == "") {
    $error_messages["email"][0] = "Email harus diisi!";
    $is_save = false;
  }
  if (!isValidEmail($_POST["email"])) {
    $error_messages["email"][1] = "Email tidak sesuai!";
    $is_save = false;
  }

  if ($_POST["tempat_lahir"] == "") {
    $error_messages["tempat_lahir"][0] = "Tempat Lahir harus diisi!";
    $is_save = false;
  }

  if ($_POST["jurusan"] == "") {
    $error_messages["jurusan"][0] = "Jurusan harus diisi!";
    $is_save = false;
  }
  if (!in_array($_POST["jurusan"], $daftar_jurusan)) {
    $error_messages["jurusan"][1] = "Jurusan tidak sesuai!";
    $is_save = false;
  }

  if ($_POST["tanggal_lahir"] == "") {
    $error_messages["tanggal_lahir"][0] = "Tanggal Lahir harus diisi!";
    $is_save = false;
  }
  if (!isValidBirth($_POST["tanggal_lahir"])) {
    $error_messages["tanggal_lahir"][1] = "Tanggal Lahir tidak sesuai!";
    $is_save = false;
  }

  if ($_POST["mata_kuliah"] == "") {
    $error_messages["mata_kuliah"][0] = "Mata Kuliah harus diisi!";
    $is_save = false;
  }
  if (!in_array($_POST["mata_kuliah"], $daftar_mata_kuliah)) {
    $error_messages["mata_kuliah"][1] = "Mata Kuliah tidak sesuai!";
    $is_save = false;
  }

  if ($_POST["agama"] == "") {
    $error_messages["agama"][0] = "Agama harus diisi!";
    $is_save = false;
  }
  if (!in_array($_POST["agama"], $daftar_agama)) {
    $error_messages["agama"][1] = "Agama tidak sesuai!";
    $is_save = false;
  }

  if ($_POST["nilai"] == "") {
    $error_messages["nilai"][0] = "Nilai harus diisi!";
    $is_save = false;
  }
  if ($_POST["nilai"] < 0) {
    $error_messages["nilai"][1] = "Nilai tidak boleh lebih kecil dari 0!";
    $is_save = false;
  }
  if ($_POST["nilai"] > 100) {
    $error_messages["nilai"][2] = "Nilai tidak boleh lebih besar dari 100!";
    $is_save = false;
  }

  return $is_save;
}

// Cek Apakah Email Valid/Tidak
function isValidEmail($email)
{
  return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Cek Tanggal Lahir Valid/Tidak
function isValidBirth($date)
{
  // Cek apakah ada separator untuk memisahkan tanggal, bulan, dan tahun
  if (!str_contains($date, "-")) return false;

  // Buat menjadi array
  $date_array = explode("-", $date);

  // Cek apakah ada 3 item, yaitu tanggal, bulan dan tahun
  if (count($date_array) != 3) return false;

  // Cek apakah tanggal, bulan, tahun yang dimasukkan adalah angka/bukan
  if (!(int)($date_array[0]) || !(int)($date_array[1]) || !(int)($date_array[2])) return false;

  // Cek apakah tanggal valid/tidak (valid = range 1-31)
  if ((int)($date_array[2]) < 0 || (int)($date_array[2]) > 31) return false;

  // Cek apakah bulan valid/tidak (valid = range 1-12)
  if ((int)($date_array[1]) < 0 || (int)($date_array[1]) > 12) return false;

  // Cek apakah tahun valid/tidak (valid = kurang/sama dari tahun sekarang)
  if ((int)($date_array[0]) < 0 || (int)($date_array[0]) > date('Y')) return false;

  return true;
}

// Cek apakah data array semuanya null/tidak
function allValuesAreNull($array)
{
  $filteredArray = array_filter($array, function ($value) {
    return !is_null($value);
  });
  return empty($filteredArray);
}

// Mendapatkan Nilai Huruf berdasarkan nilai
function determineGrade($score)
{
  if ($score >= 91 && $score <= 100) {
    return 'A';
  } elseif ($score >= 81 && $score < 91) {
    return 'B';
  } elseif ($score >= 71 && $score < 81) {
    return 'C';
  } elseif ($score >= 61 && $score < 71) {
    return 'D';
  } elseif ($score >= 0 && $score < 61) {
    return 'E';
  } else {
    return 'Nilai tidak valid!';
  }
}

// Mendapatkan status lulus/tidak berdasarkan nilai
function determinePassStatus($score)
{
  if ($score >= 71 && $score <= 100) {
    return 'Lulus';
  } elseif ($score >= 0 && $score <= 70) {
    return 'Tidak Lulus';
  } else {
    return 'Nilai tidak valid!';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Mahasiswa</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <!-- Start | Section Form Mahasiswa -->
  <section id="section-form-mahasiswa" class="py-5">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12 text-center">
          <img src="./img/logo_unila.png" alt="unila" width="150">
          <h2 class="mt-3">Form Mahasiswa</h2>
        </div>
      </div>
      <form action="" method="POST">
        <div class="row mb-3">
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="nim" class="form-label fw-semibold">NIM</label>
            <?php if (!allValuesAreNull($error_messages["nim"])) : ?>
              <input type="number" class="form-control is-invalid" name="nim" id="nim" placeholder="Masukkan NIM" value="<?= $_POST['nim'] ?? null ?>">
            <?php else : ?>
              <input type="number" class="form-control" name="nim" id="nim" placeholder="Masukkan NIM" value="<?= $_POST['nim'] ?? null ?>">
            <?php endif; ?>

            <?php foreach ($error_messages["nim"] as $error_nim) : ?>
              <?php if ($error_nim != null) : ?>
                <div class="invalid-feedback"><?= $error_nim; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="alamat" class="form-label fw-semibold">Alamat</label>
            <?php if (!allValuesAreNull($error_messages["alamat"])) : ?>
              <input type="text" class="form-control is-invalid" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="<?= $_POST['alamat'] ?? null ?>">
            <?php else : ?>
              <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="<?= $_POST['alamat'] ?? null ?>">
            <?php endif; ?>

            <?php foreach ($error_messages["alamat"] as $error_alamat) : ?>
              <?php if ($error_alamat != null) : ?>
                <div class="invalid-feedback"><?= $error_alamat; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="nama" class="form-label fw-semibold">Nama</label>
            <?php if (!allValuesAreNull($error_messages["nama"])) : ?>
              <input type="text" class="form-control is-invalid" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $_POST['nama'] ?? null ?>">
            <?php else : ?>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $_POST['nama'] ?? null ?>">
            <?php endif; ?>

            <?php foreach ($error_messages["nama"] as $error_nama) : ?>
              <?php if ($error_nama != null) : ?>
                <div class="invalid-feedback"><?= $error_nama; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="no_telepon" class="form-label fw-semibold">No Telepon</label>
            <?php if (!allValuesAreNull($error_messages["no_telepon"])) : ?>
              <input type="number" class="form-control is-invalid" name="no_telepon" id="no_telepon" placeholder="Masukkan No Telepon" value="<?= $_POST['no_telepon'] ?? null ?>">
            <?php else : ?>
              <input type="number" class="form-control" name="no_telepon" id="no_telepon" placeholder="Masukkan No Telepon" value="<?= $_POST['no_telepon'] ?? null ?>">
            <?php endif; ?>

            <?php foreach ($error_messages["no_telepon"] as $error_no_telepon) : ?>
              <?php if ($error_no_telepon != null) : ?>
                <div class="invalid-feedback"><?= $error_no_telepon; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
            <?php
            $jenis_kelamin_class = "form-select";
            if (!allValuesAreNull($error_messages["jenis_kelamin"])) {
              $jenis_kelamin_class = "form-select is-invalid";
            }
            ?>
            <select class="<?= $jenis_kelamin_class; ?>" name="jenis_kelamin" id="jenis_kelamin" aria-label="Jenis Kelamin">
              <?php foreach ($daftar_jenis_kelamin as $jenis_kelamin) : ?>
                <?php if ($_POST['jenis_kelamin'] == $jenis_kelamin) : ?>
                  <option value="<?= $_POST['jenis_kelamin']; ?>" selected><?= $_POST['jenis_kelamin']; ?></option>
                <?php else : ?>
                  <option value="<?= $jenis_kelamin; ?>"><?= $jenis_kelamin; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

            <?php foreach ($error_messages["jenis_kelamin"] as $error_jenis_kelamin) : ?>
              <?php if ($error_jenis_kelamin != null) : ?>
                <div class="invalid-feedback"><?= $error_jenis_kelamin; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="email" class="form-label fw-semibold">E-mail</label>
            <?php if (!allValuesAreNull($error_messages["email"])) : ?>
              <input type="email" class="form-control is-invalid" name="email" id="email" placeholder="Masukkan E-mail" value="<?= $_POST['email'] ?? null ?>">
            <?php else : ?>
              <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan E-mail" value="<?= $_POST['email'] ?? null ?>">
            <?php endif; ?>

            <?php foreach ($error_messages["email"] as $error_email) : ?>
              <?php if ($error_email != null) : ?>
                <div class="invalid-feedback"><?= $error_email; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="tempat_lahir" class="form-label fw-semibold">Tempat Lahir</label>
            <?php if (!allValuesAreNull($error_messages["tempat_lahir"])) : ?>
              <input type="text" class="form-control is-invalid" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $_POST['tempat_lahir'] ?? null ?>">
            <?php else : ?>
              <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $_POST['tempat_lahir'] ?? null ?>">
            <?php endif; ?>

            <?php foreach ($error_messages["tempat_lahir"] as $error_tempat_lahir) : ?>
              <?php if ($error_tempat_lahir != null) : ?>
                <div class="invalid-feedback"><?= $error_tempat_lahir; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="jurusan" class="form-label fw-semibold">Jurusan</label>
            <?php
            $jurusan_class = "form-select";
            if (!allValuesAreNull($error_messages["jurusan"])) {
              $jurusan_class = "form-select is-invalid";
            }
            ?>
            <select class="<?= $jurusan_class; ?>" name="jurusan" id="jurusan" aria-label="Jurusan">
              <?php foreach ($daftar_jurusan as $jurusan) : ?>
                <?php if ($_POST['jurusan'] == $jurusan) : ?>
                  <option value="<?= $_POST['jurusan']; ?>" selected><?= $_POST['jurusan']; ?></option>
                <?php else : ?>
                  <option value="<?= $jurusan; ?>"><?= $jurusan; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

            <?php foreach ($error_messages["jurusan"] as $error_jurusan) : ?>
              <?php if ($error_jurusan != null) : ?>
                <div class="invalid-feedback"><?= $error_jurusan; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
            <?php if (!allValuesAreNull($error_messages["tanggal_lahir"])) : ?>
              <input type="date" class="form-control is-invalid" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?= $_POST['tanggal_lahir'] ?? null ?>">
            <?php else : ?>
              <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?= $_POST['tanggal_lahir'] ?? null ?>">
            <?php endif; ?>

            <?php foreach ($error_messages["tanggal_lahir"] as $error_tanggal_lahir) : ?>
              <?php if ($error_tanggal_lahir != null) : ?>
                <div class="invalid-feedback"><?= $error_tanggal_lahir; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="mata_kuliah" class="form-label fw-semibold">Mata Kuliah</label>
            <?php
            $mata_kuliah_class = "form-select";
            if (!allValuesAreNull($error_messages["mata_kuliah"])) {
              $mata_kuliah_class = "form-select is-invalid";
            }
            ?>
            <select class="<?= $mata_kuliah_class; ?>" name="mata_kuliah" id="mata_kuliah" aria-label="Mata Kuliah">
              <?php foreach ($daftar_mata_kuliah as $mata_kuliah) : ?>
                <?php if ($_POST['mata_kuliah'] == $mata_kuliah) : ?>
                  <option value="<?= $_POST['mata_kuliah']; ?>" selected><?= $_POST['mata_kuliah']; ?></option>
                <?php else : ?>
                  <option value="<?= $mata_kuliah; ?>"><?= $mata_kuliah; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

            <?php foreach ($error_messages["mata_kuliah"] as $error_mata_kuliah) : ?>
              <?php if ($error_mata_kuliah != null) : ?>
                <div class="invalid-feedback"><?= $error_mata_kuliah; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="agama" class="form-label fw-semibold">Agama</label>
            <?php
            $agama_class = "form-select";
            if (!allValuesAreNull($error_messages["agama"])) {
              $agama_class = "form-select is-invalid";
            }
            ?>
            <select class="<?= $agama_class; ?>" name="agama" id="agama" aria-label="Agama">
              <?php foreach ($daftar_agama as $agama) : ?>
                <?php if ($_POST['agama'] == $agama) : ?>
                  <option value="<?= $_POST['agama']; ?>" selected><?= $_POST['agama']; ?></option>
                <?php elseif ($agama == $daftar_agama[0]) : ?>
                  <option value="<?= $agama; ?>" selected><?= $agama; ?></option>
                <?php else : ?>
                  <option value="<?= $agama; ?>"><?= $agama; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

            <?php foreach ($error_messages["agama"] as $error_agama) : ?>
              <?php if ($error_agama != null) : ?>
                <div class="invalid-feedback"><?= $error_agama; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <div class="col-12 col-md-6 mb-3 mb-md-0">
            <label for="nilai" class="form-label fw-semibold">Nilai</label>
            <?php if (!allValuesAreNull($error_messages["nilai"])) : ?>
              <input type="decimal" class="form-control is-invalid" name="nilai" id="nilai" placeholder="Masukkan Nilai" value="<?= $_POST['nilai'] ?? null ?>">
            <?php else : ?>
              <input type="decimal" class="form-control" name="nilai" id="nilai" placeholder="Masukkan Nilai" value="<?= $_POST['nilai'] ?? null ?>">
            <?php endif; ?>

            <?php foreach ($error_messages["nilai"] as $error_nilai) : ?>
              <?php if ($error_nilai != null) : ?>
                <div class="invalid-feedback"><?= $error_nilai; ?></div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-primary btn-block" type="submit" name="btn_save_mahasiswa">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- End | Section Form Mahasiswa -->

  <!-- Cek apakah data mahasiswa ada/tidak -->
  <?php if ($daftar_mahasiswa != null && count($daftar_mahasiswa) != 0) : ?>

    <!-- Start | Section Daftar Mahasiswa -->
    <section id="section-daftar-mahasiswa" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center mb-5">Daftar Mahasiswa</h2>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Mata Kuliah</th>
                    <th>Nilai</th>
                    <th>NH</th>
                    <th>KET</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($daftar_mahasiswa as $mahasiswa) : ?>
                    <tr>
                      <td><?= $mahasiswa["nim"]; ?></td>
                      <td><?= $mahasiswa["nama"]; ?></td>
                      <td><?= $mahasiswa["jenis_kelamin"]; ?></td>
                      <td><?= $mahasiswa["jurusan"]; ?></td>
                      <td><?= $mahasiswa["mata_kuliah"]; ?></td>
                      <td><?= $mahasiswa["nilai"]; ?></td>
                      <td><?= determineGrade($mahasiswa["nilai"]); ?></td>
                      <td><?= determinePassStatus($mahasiswa["nilai"]); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End | Section Daftar Mahasiswa -->

  <?php endif; ?>

  <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>