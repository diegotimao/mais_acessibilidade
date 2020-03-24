<?php
//conexão com o banco de dados
require_once("db/db_conect.php");

$id = $_GET['id'];
$sql = "SELECT * FROM cad_denuncia WHERE id=$id ";


$result_denuncia = mysqli_query($conn, $sql);

$denuncia = mysqli_fetch_array($result_denuncia);

session_start();


session_start();
if(!isset($_SESSION['email']) and !isset($_SESSION['id_perfil_fk'])){
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
          <h2 style="color: #135181;"><strong>Fazer uma Denúncia</strong></h2>
        </div>
      </div>
    </div>


    <!--<form action="db/cad_denuncia.php" method="post" Style="margin-top: 50px;" enctype="multipart/form-data">-->
    <form action="db/mail/email.php" method="post" Style="margin-top: 50px;" enctype="multipart/form-data">
      <div class="form-group col-md-6 offset-md-3">
        <label for="exampleInput">Titulo</label>
        <input type="titulo" class="form-control" id="titulon" aria-describedby="text" placeholder="Titulo da Denúncia" name="titulo" value="<?php echo $denuncia['titulo']; ?>">
        <small id="titulon" class="form-text text-muted">Cadastre aqui o titulo da Denúncia</small>
      </div>
      <div class="was-validated">
        <div class="col-md-6 offset-md-3">
          <label for="validationTextarea">Texto Denúncia</label>
          <textarea class="form-control is-invalid" id="validationTextarea" name="descricao" placeholder="Precisa descrever" required><?php echo $denuncia['descricao']; ?></textarea>
          <div class="invalid-feedback">
            Digite o texto da denúncia.
          </div>
        </div>
      </div>
      <div class="form-group col-md-6 offset-md-3" style="margin-top: 7px">
        <label for="exampleInput">
          <h6>Endereço</h6>
        </label>
      </div>
      <div class="form-group col-md-6 offset-md-3">
        <label for="exampleInput">Rua</label>
        <input type="texto" class="form-control" id="endrua" placeholder="Rua" name="rua" value="<?php echo $denuncia['rua']; ?>">
      </div>
      <div class="form-group col-md-6 offset-md-3">
        <label for="exampleInput">Bairro</label>
        <input type="texto" class="form-control" id="endbairro" placeholder="Bairro" name="bairro" value="<?php echo $denucia['bairro']; ?>">
      </div>
      <div class="form-group col-md-6 offset-md-3">
        <label for="exampleInput">Cidade</label>
        <input type="texto" class="form-control" id="endbairro" placeholder="Cidade" name="cidade" value="<?php echo $denuncia['cidade']; ?>">
      </div>
      <div class="was-validated">
        <div class="form-group col-md-3 col-sm-3 offset-md-3">
          <select class="custom-select" name="estado[]" required>
            <option value="">Selecione o Estado</option>
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=voce', 'root', '');
            include 'db/select_estado.php';
            foreach ($info as $key => $value) { ?>
            <option class="col-md-3 offset-md-3" value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group col-md-2 col-sm-3 offset-md-3">
      <!-- <form action="db/cad_denuncia.php" method="post" enctype="multipart/form-data"> -->
        Arquivo: <input type="file" id="arquivo" name="arquivo"  required>
        
      <!-- </form> -->
      </div>
      <div class="form-group col-md-6 offset-md-3">
        <div class="checkbox mb-3">
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="acao" value="Enviar">Cadastrar</button>
        </div>
      </div>
    </form>

    <?php // Footer 
  include_once("footer.php");
  
  ?>