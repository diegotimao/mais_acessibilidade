<?php
date_default_timezone_set('America/Sao_Paulo');

require_once("db_conect.php");

//if (isset($_POST['acao'])) {
/*
  $msg = false;

  if (isset($_FILES['arquivo'])) {

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "upload/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);

    //$sql = "INSERT INTO cad_denuncia (arquivo) VALUES ('$novo_nome')";

    if ($conn->query($sql)) {
      $msg = "Arquivo enviado com sucesso";
    } else {
      $msg = "Arquivo não enviado";
    }
  }
  */
//}
session_start();
if (isset($_POST['acao'])) {
  $titulo = $_POST['titulo'];
  $descricao = $_POST['descricao'];
  $rua = $_POST['rua'];
  $bairro  = $_POST['bairro'];
  $cidade  = $_POST['cidade'];
  
  $iduser = $_SESSION['id'];


  $estado = null;
  //verificando o select
  if (isset($_POST['estado'])) {
    $estados = $_POST['estado'];
    for ($i = 0; $i < count($estados); $i++) {
      $estado = $estados[$i];
    }
  } else {
    echo "Deu pau no excel";
  }


  $date = date('Y-m-d H:i');

  
  $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
  $novo_nome = md5(time()) . $extensao;
  $diretorio = "upload/";

  move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);    

  //$sql = "INSERT INTO cad_denuncia (arquivo) VALUES ('$novo_nome')";
/*
  if ($conn->query($sql)) {
    $msg = "Arquivo enviado com sucesso";
  } else {
    $msg = "Arquivo não enviado";
  }
*/
  $sql = "INSERT INTO cad_denuncia VALUES (null,'$titulo','$descricao','$rua','$bairro','$cidade','$estado','$novo_nome',$iduser,1,'$date')";
  
  if (mysqli_query($conn, $sql)) {
    
    /*
      Base para envio de email
    */
  //Inicio Enviar e-mail

  //Fim Enviar e-mail


  /*if(mysqli_affected_rows($conn) != 0){
      //echo "
      //    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/76/sucesso.php'>
        //  <script type=\"text/javascript\">
          //    alert(\"E-mail recebido com Sucesso.\");
          //</script>
      //";
  }else{
      echo "
          <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/76/falha.php'>
          <script type=\"text/javascript\">
              alert(\"Falha no cadastro do e-mail.\");
          </script>
      ";
  }
    
    
/*
    $nome = $_SESSION['nome']; // resgatando o nome do usuário
    $email = $_SESSION['email']; // resgatando email do usuário
    $assunto = $titulo; // O assunto 
    $mensagem = $descricao; // pegar os dados da denuncia do formulário de cadastro da denuncia e jogar nessa variável
    
    
    // Dados da conta de e-mail que fará o envio
   
    
    $smtp = new Smtp("smtp.gmail.com"); //Endereço do SMTP, geralmente localhost.
    $smtp->user = "maisacessibilidade15@gmail.com"; //Conta de email para envio
    $smtp->pass = "cete12020"; //Senha da Conta de e-mail.
    $smtp->debug = false; //Somente para usuários avançados que desejam o log do envio para testes.
    
    
    // Envio do formulário
   
    
    $to = "email@destino.com.br"; //Resgatar email do usuário
    $from = $email;
    $subject = "Contato – " . $assunto;
    $msg = $mensagem;
    
    if (isset($_POST['acao'])) {
      if($nome && $email && $assunto && $mensagem) {
        if($smtp->Send($to, $from, $subject, $msg)){
          echo "<script>alert(‘Contato enviado!’);</script>";
          echo "<script>window.location = ‘http://localhost/bootstrap2/index.php’;</script>"; // aqui o endereço de sua página.
          exit;
        }
      } else {
        echo "<script>alert(‘Preencha todos os campos!’);</script>";
        echo "<script>window.location = ‘http://localhost/bootstrap2/’;</script>"; //aqui o endereço de seu formulário
        exit;
      }
      
    
    }*/


   // echo "<script> location.href='http://localhost/bootstrap2/'; </script>";
  }
   else {
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
