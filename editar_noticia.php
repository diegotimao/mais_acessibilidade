<?php
//conexão com o banco de dados
require_once("db/db_conect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM cad_noticia WHERE id=$id ";


$result_noticia = mysqli_query($conn, $sql);

$noticia = mysqli_fetch_array($result_noticia);

session_start();

if (!isset($_SESSION['email']) and !isset($_SESSION['id_perfil_fk'])) {
  header("Location:login.php?erro1");
}


?>
<?php // Menu  
include_once("menu.php");
?>
 <div class="card">
    <div class="card-body" Style="background-color: #f5f6fa;">
      <div class="container">
        <div class="text-small  text-muted" >
          <h2 style="color: #135181;"><strong>Editar Notícia</strong></h2>
        </div>
      </div>
    </div>
  <form action="db/edit_noticia.php?id=<?= $id ?>" Style="margin-top: 50px;" method="post">
    <div class="form-group col-md-6 offset-md-3">
      <label for="exampleInput">Titulo</label>
      <input type="titulo" class="form-control" name="titulo" id="titulon" value="<?php echo $noticia['titulo']; ?>" aria-describedby="text" placeholder="Titulo da Noticía">
      <small id="titulon" class="form-text text-muted">Cadastre aqui o titulo da noticía</small>
    </div>
    <div class="form-group col-md-6 offset-md-3">
      <label for="exampleInput">Descrição da Noticía</label>
      <textarea class="form-control is-invalid" id="validationTextarea" name="texto" placeholder="Precisa descrever" required><?php echo $noticia['texto']; ?></textarea>
    </div>

    <div class="form-group col-md-6 offset-md-3" style="margin-top: 7px">
      <label for="exampleInput">
        <h6>Endereço</h6>
      </label>
    </div>
    <div class="form-group col-md-6 offset-md-3">
      <select class="custom-select" name="estado" id="estado" required>
        <option value="">Selecione o Estado</option>
        <?php
        include 'db/select_estado.php';
        foreach ($info as $key => $value) { ?>
        <option class="col-md-3 offset-md-3" value="<?php echo $value['id']; ?>"
        
        <?php
            
            if($value['id'] == $noticia['id_estado_fk'] ){
                echo "selected";
            }
            ?>
        ><?php echo $value['nome']; ?>
         
        </option>

        <?php } ?>
      </select>
      <?php /*
        <form action="db/upload.php" method="post" enctype="multipart/form-data">
          <div class="form-group col-md-6 offset-md-3">
            <label for="exampleFormControlFile1">Publique uma foto</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" required name="arquivo">
          </div>
        </form>
      </div>
    </form>
    */ ?>
      <div class="form-group col-md-6 offset-md-3" style="margin-top: 25px;">
        <div class="checkbox mb-3">
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="editar" value="Enviar">Salvar Notícia</button>
        </div>
      </div>
  </form>
  </form>
</div>
<?php
include_once("footer.php");
?>