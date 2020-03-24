<?php
//conexão com o banco de dados
require_once("db/db_conect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM cad_denuncia WHERE id=$id ";


$result_denuncia = mysqli_query($conn, $sql);

$denuncia = mysqli_fetch_array($result_denuncia);


?>

<?php // Menu 
  include("menu.php");
  
  ?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <div class="card mb-3" style="margin-top: 40px;">
        <?php

              $arquivo = $denuncia['arquivo'];
              $caminho = 'db/mail/upload/' . $arquivo ;
              ?>
        <img src="<?php echo $caminho; ?>" class="card-img-top" alt="..." style="width: 100%; height: 280px;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $denuncia['titulo']; ?></h5>
                <p class="card-text text-justify"><?php echo $denuncia['descricao']; ?></p>
                <p class="card-text"><small class="text-muted">  </small></p>
            </div>
            <div class="card-footer">
              <small class="text-muted"><span class='e-inline-block bg-success text-white px-2 py-1'>Postado</span><span class='d-inline-block bg-info text-white px-2 py-1'><?php echo date("d/m/Y", strtotime($denuncia['data'])); ?></span>&nbsp; </span></small>
              <p class="card-text"><small class="text-danger">CIDADE <?php echo $denuncia['cidade']; ?></small></p>
            </div>
        </div>

        
        <blockquote class="blockquote">
          <p class="mb-0">Públicado por:</p>
          <footer class="blockquote-footer">Diego
            <cite title="Source Title">Cavalcanti</cite>
          </footer>
        </blockquote>

        <blockquote class="blockquote">
        <p class="mb-0">Aviso:</p>
        </blockquote>
        <p> Os comentários são de responsabilidade dos autores e não representam a opinião do Mais Acessibilidade.</p>
        
        <p> É vetada a postagem de conteúdos que violem a lei e/ ou direitos de terceiros. Comentários postados que não respeitem os critérios podem ser removidos sem prévia notificação. </p>

        <hr>

       <!-- Comments Form -->
       <div class="responsive.less" >
       <div id="fb-root"></div>

        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0"></script>

        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="6"></div>
       </div>
    </div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Pesquisar</h5>
        <div class="card-body">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Pesquisar...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Ir</button>
            </span>
          </div>
        </div>
      </div>

      <!-- Categories Widget -->
      <!-- Categories Widget -->
      <div class="my-4">
            <img src="img/novembro.png" alt="Responsive image" style="width: 100%; height: 100%; margin-right: auto;">
      </div>

      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Frase do dia</h5>
        <div class="card-body">
        A verdadeira deficiência é aquela que prende o ser humano por dentro e não por fora, pois até os incapacitados de andar podem ser livres para voar.
        </div>
      </div>
      <div class=" my-4">
            <img src="img/black.png" alt="Responsive image" style="width: 100%; height: 100%; margin-right: auto;">
      </div>
    </div>

      

    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->



<?php // Menu 
  include_once("footer.php");
  
  ?>