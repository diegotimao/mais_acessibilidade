<?php
      require_once("db_conect.php");
      

      if (isset($_POST['editar'])) {
        $pergunta = $_POST['pergunta'];
        
        $id = $_GET['id'];
      

  $sql = "UPDATE cad_enquete SET  
  pergunta = '$pergunta'
   
  WHERE id = $id";
  
if (mysqli_query($conn, $sql)) {
echo "<script>
alert.window='deu certo';
          location.href='http://localhost/bootstrap2/';
</script>";
} else {
echo "Deu pau no excel: " . $sql . "</br>" . mysqli_error($conn);
}

}

?>