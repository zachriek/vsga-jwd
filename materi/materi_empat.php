<?php
// menulis variabel di php, dimulai dengan tanda $
$nama = 'Micheal';
$nama = 10;

$pertama = 5;
$kedua = 10;

$jumlah = $pertama + $kedua;

$dariFunction = penjumlahan(60, 80);

function penjumlahan($a, $b)
{
    return $a + $b;
}

function tarifParkir(2 parameter)
{
    // hasil perkalian tarif * harga;
    return 800000;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="get">
        No Polisi : <input type="text" name="pertama" /> <br>
        Angka Kedua : <input type="number" name="kedua" /> <br>
        <input type="submit" name="btnHitung" value="penjumlahan" />
    </form>

    <?php
        // mengambil data dari URL GET
        if (isset($_GET['btnHitung'])) {
            $angka_pertama = $_GET['pertama'];
            $angka_kedua = $_GET['kedua'];

            $hasil = penjumlahan($angka_pertama, $angka_kedua);
            echo $hasil;
            echo " tarif parkir = ";
            echo ....... ?
        }
        ?>
</body>

</html>