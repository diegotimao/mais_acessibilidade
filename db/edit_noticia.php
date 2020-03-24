<?php
require_once("db_conect.php");
date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST['editar'])) {
  $titulo = $_POST['titulo'];
  $texto = $_POST['texto'];
  $estado = $_POST['estado'];
  $id = $_GET['id'];


  $sql = "UPDATE cad_noticia SET  
            titulo = '$titulo',
            texto = '$texto',
            id_estado_fk = '$estado',
            data = 'current_date()' 
  
            WHERE id = $id";
            
  if (mysqli_query($conn, $sql)) {
    echo "<script>
                    location.href='http://localhost/bootstrap2/';
          </script>";
  } else {
    echo "Deu pau no excel: " . $sql . "</br>" . mysqli_error($conn);
  }

}
