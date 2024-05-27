<?php
// mengambil data dari method POST
$namaMahasiswa = $_POST['nama'];
$nilai = $_POST['nilai'];
echo $namaMahasiswa . "<br>";
echo $nilai . "<br>";

function cek_kelulusan($nilai_kelulusan)
{
  if ($nilai_kelulusan > 75) {
    echo "Selamat Anda Lulus <br>";
  } else {
    echo "Maaf, Anda Tidak Lulus <br>";
  }
}

function get_grade($n)
{
  if ($n > 100) {
    echo "Maaf, Nilai Yang Diinput Tidak Valid <br>";
  } else if ($n > 85) {
    echo "A";
  } else if ($n > 70) {
    echo "B";
  } else if ($n  > 50) {
    echo "C";
  } else if ($n > 30) {
    echo "D";
  } else {
    echo "E";
  }
}

cek_kelulusan($nilai);
get_grade($nilai);
