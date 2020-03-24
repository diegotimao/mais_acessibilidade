<?php
//conexão com o banco de dados


require_once("db/db_conect.php");

if (isset($_GET['erro'])) {
  if ($_GET['erro'] == 1) {
    $erro = "Acesso negado";
  } else if ($_GET['erro'] == 2) {
    $erro = "Usuario ou senha incorreta";
  } else {
    $erro = "";
  }
}

?>

<?php // Menu 
include_once("menu.php");
?>


<form class="form-signin col-md-6 offset-md-3" action="db/validalogin.php" method="post">
  <div class="text-center mb-4">
    <img class="mb-4" src="img/logo/marvel.png" alt="" width="250" height="100" style="margin-top: 80px;">
    <p>Efetue o seu login seja nosse parceiro e nos ajude a construir um mundo com mais acessiilidade, através dele você poderá <code>: cadastrar denuncias, votar na enquete</code>.<br></p>
  </div>

  <div class="form-label-group">
    <input type="email" id="inputEmail" class="form-control" name="login" placeholder="Endereço de email" required="" autofocus="" name="login">
  </div>

  <div class="form-label-group" style="margin-top: 30px;">
    <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required="" name="senha">
  </div>


  <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar" style="margin-top: 35px;">Entrar</button><br>
  <a class="mt-5 mb-3 text-muted text-center" href="cad_user.php"><code style="color: red;"> Não sou cadastrado</code></a>
</form>

<?php // footer 
include_once("footer.php");
?>