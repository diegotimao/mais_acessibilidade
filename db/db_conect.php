<?php

$servername = "localhost";
$database = "id11064789_maisacessibilidade";
$username = "id11064789_dr4g0nb4ll2";
$password = "!mAU3tiyuCukoNfbvG%P";

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn,'utf8');
if(!$conn){

  die("Deu pau no excel: " + mysqli_connect_error());
}



?>
