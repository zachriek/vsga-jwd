<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  // warning error
  // karena file bebas.php tidak ditemukan
  include("bebas.php");

  echo $a;

  function showMessage()
  {
    echo "hello";
    // fatal error
    // karena function alert tidak ada di php
    alert("hello");
  }
  showMessage();
  ?>
</body>

</html>