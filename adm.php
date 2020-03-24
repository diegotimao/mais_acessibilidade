<?php
require_once("db/db_conect.php");
session_start();

include_once("menu.php");
?>


<div class="jumbotron jumbotron-fluid" style="background-image: url('img/mundo.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="container responsive">
        <div class="row">
            <div class="col-md-4">
                <img src="db/mail/upload/<?=$_SESSION['foto'];?>" class="rounded-circle " Style=" width: 230px; height: 210px" alt="Cinque Terre">
            </div>
            <div class="col-md-8">
                <h1 class="display-4 text-white"><?php echo ($_SESSION['nome']) ?> </h1>
                <p class="lead d-inline-block bg-info text-white px-2 py-1' text-white">EMAIL <?php echo ($_SESSION['email']) ?></p>
                <p class="lead d-inline-block bg-info text-white px-3 py-2' text-white">PERFIL Administrador</p>
            </div>
        </div>
        <div class="text-center">
            <a href="" type="button" class="btn btn-danger"> Atulizar Dados</a>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="jumbotron" style="background-image: url('img/adm.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="container-fluid">
 
            <div class="d-sm-flex align-items-center justify-content-center mb-5 text-danger">
                <h1 class='d-inline-block bg-info text-white px-2 py-1 h3 mb-0 text-gray-800'>PÁGINA DO ADMINISTRADOR </h1>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">NOVA EQUETE</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Cadastre novas enquetes</div>
                                </div>
                                <div class="col-auto">
                                    <a butoon  href="cad_enquete.php" class="btn btn-warning text-white">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2" >
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">NOVA NOTICÍA </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Cadastre novas Noticías</div>
                                </div>
                                <div class="col-auto">
                                     <a butoon  href="cad_noticia.php" class="btn btn-warning text-white">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">DENUNCIAR</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a butoon  href="cad_denuncia.php" class="btn btn-warning text-white">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            <div class="row" >
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border border-left-warning  shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-3">
                               
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">LISTA DE USUÁRIOS</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Todos os usuários cadastrados</div>
                                </div>
                                <div class="col-auto">
                                    <a butoon  href="lista_user.php" class="btn btn-warning text-white">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LISTA DE DENUNCIA</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Todas as denuncias</div>
                                </div>
                                <div class="col-auto">
                                     <a butoon  href="lista_denuncia.php" class="btn btn-warning text-white">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">LISTA DE NOTICÍAS</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">Noticías Cadastradas</div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a butoon  href="lista_noticia.php" class="btn btn-warning text-white">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">LISTA DE ENQUETES</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Enquetes cadastradas </div>
                                </div>
                                <div class="col-auto">
                                     <a butoon  href="lista_enquete.php" class="btn btn-warning text-white">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Relatório</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">Veja o relatório do sistema</div>
                                </div>
                                <div class="col-auto">
                                    <a butoon  href="relatorio.php" class="btn btn-warning text-white">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<?php
include_once("footer.php")
?>