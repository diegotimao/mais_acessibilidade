<?php
require_once("db/db_conect.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="sortcut icon" href="img/incones/cadeirante.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html, charset=iso-8859-1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/Style.css">
    <link rel="stylesheet" type="text/css" href="css/Style.scss">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Mais Acessibilidade </title>
</head>

<body>

    <nav class="shadow-lg  navbar navbar-expand-md  fixed-top navbar-light " style="background-color: rgb(91, 192, 222);">
        <img src="img/logo/logo.png" alt="" style="width: 250px; height: 50px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-warning" href="index.php" tabindex="-0" aria-disabled="false" style="color:cornsilk">HOME</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="noticias.php" tabindex="-0" aria-disabled="false" style="color:cornsilk">NOTICIAS</a>
                </li>
                <?php if (isset($_SESSION['logado']) and $_SESSION['id_perfil_fk'] == 1) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="cad_denuncia.php" tabindex="0" aria-disabled="false" style="color:cornsilk">DENUNCIAR</a>
                    </li>
                <?php } ?>

                <?php if (!isset($_SESSION['logado'])) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php" tabindex="-0" aria-disabled="false" style="color:cornsilk">LOGIN</a>

                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="cad_user.php" tabindex="-0" aria-disabled="false" style="color:cornsilk">CADASTRAR-SE</a>

                    </li>

                <?php } ?>

            </ul>
            <div class="offset-md-5">
                <?php if (isset($_SESSION['logado'])) { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">


                            <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Olá <span style="color:gold;"> <?php echo ($_SESSION['email']) ?></span> <img class="img-profile rounded-circle" src="db/mail/upload/<?=$_SESSION['foto'];?>" Style=" width: 30px; height: 30px;"></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="perfil_user.php">Perfil</a>
                                <?php if (isset($_SESSION['logado']) and $_SESSION['id_perfil_fk'] == 1) { ?>
                                    <a class="dropdown-item" href="#two">Minhas Denuncias</a>
                                <?php } ?>
                                <?php if (isset($_SESSION['logado']) and $_SESSION['id_perfil_fk'] == 2) { ?>
                                    <a class="dropdown-item" href="adm.php">Área do Administrador</a>
                                <?php } ?>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="db/logout.php">Sair</a>
                            </div>
                        </li>
                    </ul>
                <?php } ?>
            </div>



            <!--<div class="offset-md-5">

        <form class="form-inline my-2 my-lg-0 justify-content-rigth">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          <button class="btn btn-danger my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>-->
        </div>

    </nav>
    <br>
    <br>
    <br>
    