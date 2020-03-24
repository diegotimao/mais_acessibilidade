<?php
require_once("db/db_conect.php");

require_once("menu.php");
?>

<div class="card">
    <div class="card-body" Style="background-color: #f5f6fa;">
      <div class="container">
        <div class="text-small  text-muted" >
          <h2 style="color: #135181;"><strong>Cadastro de  Usúario</strong></h2>
        </div>
      </div>
    </div>
  <section id="Diego">


    <div class="jumbotron big-banner" Style="height: 700px; pading-top:300px;">
      <form class="col-md-8 offset-md-2 was-validated" action="db/insert_user.php" class="needs-validation" novalidate method="post" Style="margin-top: 100px;" enctype="multipart/form-data">
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationCustom01">Nome</label>
            <input type="text" name="nome" class="form-control" id="validationCustom01" placeholder="Nome" required="">
            <div class="valid-feedback">
              Aceito!
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom02">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control" id="validationCustom02" placeholder="Sobrenome" required="">
            <div class="valid-feedback">
              Aceito!
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <label for="validationCustomUsername">E-mail usuario</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
              </div>
              <input type="text" name="email" class="form-control" placeholder="Usuario" aria-describedby="inputGroupPrepend" required="">
              <div class="invalid-feedback">
                Por favor cadastre um nome de usuario.
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-6">
            <label for="validationCustom03">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="validationCustom03" placeholder="Cidade" required="">
            <div class="invalid-feedback">
              Por favor, cadastre a cidade, em que você mora.
            </div>
          </div>

          <div class="col-6">
            <label for="validationCustom05">Senha</label>
            <input class="form-control" placeholder="Senha" type="password" name="senha" required=>
            <div class="invalid-feedback">
              Digite uma senha!
            </div>
          </div>

          <div class="form-group col-6 " Style="margin-top: 22px;">
            <select class="custom-select" name="estado[]" id="estado" required="">
              <option value="">Selecione o Estado</option>
              <?php
              include 'db/select_estado.php';
              foreach ($info as $key => $value) { ?>
                <option class="col-md-3 offset-md-3" required="" value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
              <?php } ?>
            </select>
          </div>
            <div class="input-group col-6" style="margin-top: 23px;">
              
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="imagem_perfil" name="imagem_perfil" aria-describedby="inputGroupFileAddon01" required>
                <label class="custom-file-label" for="inputGroupFile01" >Escolha uma Foto para seu perfil</label>
              </div>
            </div>
          </div>

          <button class="btn btn-primary col-md-2  offset-md-3" Style="margin-top: 90px; " type="submit" name="acao" value="enviar">Cadastrar-se</button>
        </div>
    </div>
    </form>

    <script>
      // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
          var forms = document.getElementsByClassName('needs-validation');
          // Faz um loop neles e evita o envio
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </section>

  <br>
  <?php
  require_once("footer.php");
  ?>