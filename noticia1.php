<?php
//conexão com o banco de dados
require_once("db/db_conect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM cad_noticia WHERE id=$id ";


$result_noticia = mysqli_query($conn, $sql);

$noticia = mysqli_fetch_array($result_noticia);

session_start();

 // Menu 
?>

  <?php // Menu 
  include("menu.php");
  
  ?>
  
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $noticia['titulo']; ?></h1>

       

        <hr>

        <!-- Date/Time -->
        
        <p>Publicado <?php echo date("d/m/Y", strtotime($noticia['data'])) ?></p>

        <hr>

        <!-- Preview Image -->
        <?php

              $arquivo = $noticia['arquivo'];
              $caminho = 'db/mail/upload/' . $arquivo ;
              ?>
        <img src="<?php echo $caminho; ?>" class="img-fluid" alt="Responsive image" style="width: 100%; height: 250px;">

        <hr>

        <!-- Post Content -->
        <p class="lead text-justify"><?php echo $noticia['texto']; ?></p>

        
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
        
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0"></script>
          <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
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