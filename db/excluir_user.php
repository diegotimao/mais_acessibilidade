<?php

session_start();
if ($_SESSION['id_perfil_fk'] == 1) {
    header("Location:../index.php?erro=1");
} else {
   
    
    require_once("db_conect.php");
    
    $id = $_GET['id'];

    $sql = "DELETE FROM cad_user WHERE id = $id";

    $resultado = mysqli_query($conn, $sql);

    if ($resultado == true) {
        echo "<script>
           location.href='http://localhost/bootstrap2/lista_user.php';
        </script>";
    }
}  

?>