<?php
require_once("db/db_conect.php");
session_start();

// Exibir Menu
require_once("menu.php");
?>

<div class="jumbotron jumbotron-fluid" style="background-image: url('img/16.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;"">
    <div class=" container responsive">
    <div class="row">
        <div class="col-md-4">
            <img src="db/mail/upload/<?=$_SESSION['foto'];?>" class="rounded-circle " Style=" width: 230px; height: 210px" alt="Cinque Terre">
        </div>
        <div class="col-md-8 ">
            <h1 class="display-4 text-white"><?php echo ($_SESSION['nome']) ?> </h1>
            
        </div>
    </div>

</div>
</div>
<style>
    div#diego span {
        color: red !important;
    }
    div#diego a{
        margin-top: 40px !important;
    }
    
    
</style>
<div class="container-fluid  ">
    <div id="diego" class="jumbotron border border-left: royalblue, shadow h-500 py-30 border border-primary" style="background-image: url('img/mundo.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;>
        <div id="diego" class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-6 mb-3">
                    <h5> Nome : <span><?= $_SESSION['nome']; ?></span></h5>

                </div>
                <div class="col-6 mb-3">
                    <h5> Sobrenome :  <?= $_SESSION['sobrenome']?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-4">
                    <h5> Email :  <?= $_SESSION['email']; ?></h5>

                </div>
                <div class="col-6 mb-3">
                    <h5> Cidade : <?= $_SESSION['cidade']?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <h5> Estado : <?= $_SESSION['id_estado_fk']?></h5>

                </div>
                <div class="col-6 mb-4">
                    <h5> Senha : ******** </h5>
                </div>

            </div>
        </div>
        <div class="text-center" id="diego">
            <a href="" type="button" class="btn btn-danger"> Atulizar Dados</a>
        </div>
    </div>
</div>

<?php
// Exibir Footer
require_once("footer.php");
?>