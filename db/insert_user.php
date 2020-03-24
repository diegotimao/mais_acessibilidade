<?php

$servername = "localhost";
$database = "id11064789_maisacessibilidade";
$username =  "id11064789_dr4g0nb4ll2";
$password = "!mAU3tiyuCukoNfbvG%P";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  die("Deu pau no excel: " + mysqli_connect_error()); //
}


if (isset($_POST['acao'])) {
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $cidade  = $_POST['cidade'];
  $senha = md5($_POST['senha']);

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

  $id_perfil_fk = 1;

  

  $extensao = strtolower(substr($_FILES['imagem_perfil']['name'], -4));
  $novo_nome = md5(time()) . $extensao;
  $diretorio = "upload/";

  move_uploaded_file($_FILES['imagem_perfil']['tmp_name'], $diretorio . $novo_nome);
  
  $sql = "INSERT INTO cad_user VALUES (null,'$nome','$sobrenome','$email','$cidade','$senha','$estado','$id_perfil_fk','$novo_nome')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>
                  
                  location.href='http://localhost/bootstrap2/login.php';
            </script>";
           } else {
    echo "Deu pau no excel: " . $sql . "</br>" . mysqli_error($conn);
  }

  
}
