<?php

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
          <h2 style="color: #135181;"><strong>Cadastro de Notícia</strong></h2>
        </div>
      </div>
    </div>
    <form action="db/cad_noticia.php" Style="margin-top: 50px;" method="post" enctype="multipart/form-data">
      <div class="form-group col-md-6 offset-md-3">
        <label for="exampleInput">Titulo</label>
        <input type="titulo" class="form-control" name="titulo" id="titulon" aria-describedby="text" placeholder="Titulo da Noticía">
        <small id="titulon" class="form-text text-muted">Cadastre aqui o titulo da noticía</small>
      </div>
      <div class="form-group col-md-6 offset-md-3">
        <label for="exampleInput">Descrição da Noticía</label>
        <textarea class="form-control is-invalid" id="validationTextarea" name="texto"  placeholder="Precisa descrever" required></textarea>
        
      </div>
      <div class="form-group col-md-2 col-sm-3 offset-md-3">
      <!-- <form action="db/cad_denuncia.php" method="post" enctype="multipart/form-data"> -->
        Arquivo: <input type="file" id="arquivo" name="arquivo"  required>
        
      <!-- </form> -->
      </div>
      <div class="form-group col-md-6 offset-md-3" style="margin-top: 7px">
        <label for="exampleInput">
          <h6>Endereço</h6>
        </label>
      </div>
      <div class="form-group col-md-6 offset-md-3">
        <select class="custom-select" name="estado[]" id="estado" required>
          <option value="">Selecione o Estado</option>
          <?php
          include 'db/select_estado.php';
          foreach ($info as $key => $value) { ?>
          <option class="col-md-3 offset-md-3" value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
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
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="acao" value="Enviar">Cadastrar Nóticia</button>
          </div>
        </div>
    </form>
    </form>
  </div>
  <div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
      <div class="row">
        <div class="col-12 col-md">
          <img src="img/marvel.png" alt="" width="230" height="90" style="margin-top: 10;">
          <small class="d-block mb-3 text-muted">Diego; 2019</small>
        </div>
        <div class="col-10 col-md ">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Algo legal</a></li>
            <li><a class="text-muted" href="#">Feature aleatória</a></li>
            <li><a class="text-muted" href="#">Recursos para times</a></li>
            <li><a class="text-muted" href="#">Coisas para desenvolvedores</a></li>
            <li><a class="text-muted" href="#">Outra coisa legal</a></li>
            <li><a class="text-muted" href="#">Último item</a></li>
          </ul>
        </div>

        <div class="col-5 col-md">
          <form class="form-inline my-2 my-lg-0"></form>
          <label class="sr-only" for="inlineFormInputName2">Pesquisar</label>
          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Pesquisar">
          <button type="submit" class="btn btn-primary mb-2">Enter</button>
          </form>
          </form>
          <ul class="list-unstyled text-small">
            <img class="mb-2" src="img/cetep1.png" alt="" width="190" height="55">
          </ul>
        </div>
      </div>
    </footer>
  </div>
  </div>
  <script type="text/javascript" src="js/jquery-3.3.1.mim.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>