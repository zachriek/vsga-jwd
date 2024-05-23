<?php
// buat tampilan sesuai dengan tugas

function hitungTarif($lama_parkir, $tarif_per_jam)
{
  return $lama_parkir * $tarif_per_jam;
};

?>

<html>

<form action="" method="">
  No Polisi : <input type="text" name="no_polisi">
  <br>
  Lama Parkir : <input type="number" name="lama_parkir">
  <br>
  Tarif / Jam : <input type="number" name="tarif_per_jam">
  <br>
  <input type="submit" name="btn_hitung" value="Hitung">
</form>

<?php
// mengambil data dari URL
// panggil function hitungTarif
if (isset($_GET['btn_hitung'])) {
  $lama_parkir = $_GET['lama_parkir'];
  $tarif_per_jam = $_GET['tarif_per_jam'];
  $jumlah_tarif = hitungTarif($lama_parkir, $tarif_per_jam);
  echo "<p>Jumlah Tarif : $jumlah_tarif</p>";
}
?>

</html>