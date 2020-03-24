<?php
//conexão com o banco de dados

require_once("db/db_conect.php");

$id = $_GET['id'];

$sql = "SELECT * FROM cad_enquete WHERE id=$id ";


$result_enquente = mysqli_query($conn, $sql);

$pergunta = mysqli_fetch_array($result_enquente);

session_start();
if (!isset($_SESSION['email']) and !isset($_SESSION['id_perfil_fk'])) {
  header("Location:login.php?erro1");
}


?>

<?php // Menu 
include_once("menu.php");
?>
<br>
<div class="card">
    <div class="card-body" Style="background-color: #f5f6fa;">
      <div class="container">
        <div class="text-small  text-muted" >
          <h2 style="color: #135181;"><strong>Editar Enquete</strong></h2>
        </div>
      </div>
    </div>
  <form action="db/edita_enquete.php?id=<?= $id ?>" method="post" Style="margin-top: 50px;">
    <div class="was-validated">
      <div class="col-md-6 offset-md-3">
        <label for="validationTextarea">Texto da Enquete</label>
        <textarea class="form-control is-invalid" id="validationTextarea" name="pergunta" placeholder="Precisa descrever" required><?php echo $pergunta['pergunta']; ?></textarea>
        <div class="invalid-feedback">
          Digite o texto da enquete.
        </div>
      </div>
    </div>
    <div class="form-group col-md-6 offset-md-3" Style="margin-top: 50px;">
      <div class="checkbox mb-3">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="editar" value="Enviar">Cadastrar</button>
      </div>
    </div>
  </form>
  <?php // footer 
  include_once("footer.php");
  ?>