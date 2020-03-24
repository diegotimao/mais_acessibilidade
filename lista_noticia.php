<?php
//conexão com o banco de dados
require_once("db/db_conect.php");

session_start();
if (!isset($_SESSION['email']) and !isset($_SESSION['id_perfil_fk'])) {
    header("Location:login.php?erro1");
}


?>

<?php // Menu 
include_once("menu.php");

?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-center text-gray-800" style="margin-top: 50px;">LISTA DE NOTICÍAS &nbsp;&nbsp;<img src="img/incones/noticia.png" class="img-fluid" style="width:45px; height:45px;"></h1>
    <p class="mb-4 text-center">Todos as noticías cadastradas no sistema </a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">LISTA DE NOTICÍAS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TITULO</th>
                            <th>DATA</th>
                            <th>OPÇÔES</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                 <?php
                                    include 'db/exibir_lista_noticia.php';
                                    foreach ($info as $key => $value) { ?>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['titulo']; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($value['data'])); ?></td>
                                <td>
                                <div class="cta-btn">
                                    <a href="editar_noticia.php?id=<?php echo $value['id']; ?>" class="btn btn-primary text-white height=10">EDITAR</a>
                                    <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#confirma-<?php echo $value['id']; ?>">
                                            EXCLUIR
                                        </button>
                                        <div class="modal fade" id="confirma-<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Excluir Noticía </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ID <?php echo $value['id']; ?>  <?php echo $value['titulo']; ?> 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="db/excluir_noticia.php?id=<?php echo $value['id']; ?>" class="btn btn-danger text-white">EXCLUIR</a>
                                                        <a href="lista_noticia.php" class="btn btn-warning text-white">CANCELAR</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                             </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php // Footer
include_once("footer.php");

?>