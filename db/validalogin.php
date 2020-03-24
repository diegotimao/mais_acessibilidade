<?php
//conexão com o banco de dados


require_once("db_conect.php");

//verificando se a seção
//session_start();


//Verificando se os campos vinheram vazios
if (isset($_POST['login']) and isset($_POST['senha'])) :

  
    $email = $_POST['login'];
    $senha = $_POST['senha'];
    $senha = md5($senha);
    $sql = "SELECT * FROM cad_user WHERE email = '$email' AND senha = '$senha'";

    $resultado = mysqli_query($conn, $sql);


    if (mysqli_num_rows($resultado) == 0) :
        echo "<script>
                    alert('Usuario ou senha nao coferem');
                    location.href='http://localhost/bootstrap2/login.php';
              </script>";

    endif;

    if (mysqli_num_rows($resultado) == 1) :

        $dados = mysqli_fetch_array($resultado);

        session_start();
        $_SESSION['logado'] = true;
        
       // $_SESSION['id_user'] = $dados['id_user'];

        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['sobrenome'] = $dados['sobrenome'];
        $_SESSION['cidade'] = $dados['cidade'];
        $_SESSION['email'] = $dados['email'];
        $_SESSION['id_estado_fk'] = $dados['id_estado_fk'];
        $_SESSION['id'] = $dados['id'];
        $_SESSION['id_perfil_fk'] = $dados['id_perfil_fk'];
        $_SESSION['foto'] = $dados['arquivo'];
        
        echo "<script>
                    location.href='http://localhost/bootstrap2/';
              </script>";


    endif;
endif;

?>