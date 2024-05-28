<?php

if (isset($_POST['nama']) && isset($_POST['berat']) && isset($_POST['tinggi'])) {
  // mengambil data dari method POST
  $nama = $_POST['nama'];
  $berat = $_POST['berat'];
  $tinggi = $_POST['tinggi'];

  $nilai_bmi = $berat / ($tinggi * $tinggi);
  $bmi_msg = "Nilai BMI Anda Adalah : ";

  echo $nama . "<br>";
  echo $bmi_msg . $nilai_bmi . "<br>";

  function get_grade($bmi)
  {
    $status_msg = "Status BMI : ";
    if ($bmi > 30.0) {
      echo $status_msg . "Obesitas <br>";
    } else if ($bmi > 25.0) {
      echo $status_msg . "Kegemukan <br>";
    } else if ($bmi > 18.5) {
      echo $status_msg . "Normal";
    } else {
      echo $status_msg . "Kurus";
    }
  }

  get_grade($nilai_bmi);
}
