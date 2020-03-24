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
    <h1 class="h3 mb-2 text-center text-gray-800" style="margin-top: 50px;">LISTA DE USUÁRIOS &nbsp;&nbsp;<img src="img/incones/noticia.png" class="img-fluid" style="width:45px; height:45px;"></h1>
    <p class="mb-4 text-center">Todos os usuários cadastrados no sistema </a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">LISTA DE USUÁRIOS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>SOBRENOME</th>
                            <th>EMAIL</th>
                            <th>PERFIL</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            include 'db/exibir_lista_user.php';
                            foreach ($info as $key => $value) { ?>
                              
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['nome']; ?></td>
                                <td><?php echo $value['sobrenome']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                
                                <td><?php echo $value['perfil']; ?></td>
                                
                                <td>
                                    <div class="cta-btn">
                                        <a href="" class="btn btn-primary text-white height=10">EDITAR</a>
                                        <a href="db/excluir_user.php?id=<?php echo $value['id']; ?>" class="btn btn-danger text-white">EXCLUIR</a>
                                        
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