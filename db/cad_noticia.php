<?php
  require_once("db_conect.php");
      date_default_timezone_set('America/Sao_Paulo');
    
    

    if(isset($_POST['acao'])){
      $titulo = $_POST['titulo'];
      $texto = $_POST['texto'];
      
                    
      
      
      $estado = null;
      //verificando o select
      if(isset($_POST['estado'])){
        $estados = $_POST['estado'];
        for($i=0; $i<count($estados); $i++){
          $estado = $estados[$i];
        }
      } else {
        echo "Deu pau no excel";
      }
      
     
      $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
      $novo_nome = md5(time()) . $extensao;
      $diretorio = "upload/";
    
      move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);
     
      $sql = "INSERT INTO cad_noticia VALUES (null,'$titulo','$texto','$estado',NOW(),'$novo_nome')";
      if(mysqli_query($conn, $sql)){
        echo "<script>
                    location.href='http://localhost/bootstrap2/';
              </script>";
      } else {
        echo "Deu pau no excel: " . $sql . "</br>" . mysqli_error($conn);
      }

     
     // $sql = $pdo->prepare("INSERT INTO cad_user (nome, sobrenome, email, cidade, id_estado_fk, senha) VALUES (null, ?,?,?,?,?,?)");
  
    //  $sql->execute(array($nome,$sobrenome,$email,$cidade,$estado,$senha));
      /*
      echo "<script>
        alert('Usuário Cadastrado com sucesso');
        location.href='http://localhost/bootstrap2/';
      </script>";
      */
    }
 