<?php

$servername = "localhost";
$database = "id11064789_maisacessibilidade";
$username = "id11064789_dr4g0nb4ll2";
$password = "!mAU3tiyuCukoNfbvG%P";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  die("Deu pau no excel: " + mysqli_connect_error());
}

if(isset($_GET['erro'])){
    if($_GET['erro'] == 1){
       $erro = "Acesso Negado, por favor realize seu login";
    }
}else{
    $erro = "";
}


?>