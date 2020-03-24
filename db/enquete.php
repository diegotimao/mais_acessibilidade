<?php
date_default_timezone_set('America/Sao_Paulo');
require_once("db_conect.php");
    

    
  if(isset($_POST['acao'])){
        $pergunta = $_POST['pergunta'];
        $date = date('Y-m-d H:i');
        
       
        $sql = "INSERT INTO cad_enquete VALUES (null,'$pergunta','$date','','')";
        if(mysqli_query($conn, $sql)){
          echo "<script>
                      location.href='http://localhost/bootstrap2/';
                </script>";
        } else {
          echo "Deu pau no excel: " . $sql . "</br>" . mysqli_error($conn);
        }
    
      }
        

?>