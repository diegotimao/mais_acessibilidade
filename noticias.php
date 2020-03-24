<?php // Menu 
include_once("menu.php");
?>
  <div class="polaride">
    <img src="img/visita.jpg" width="100%" height="40%" Style=" margin-top: 10px; " alt="">
  </div>
  
  
<div class="container" style="margin-top:30px;">
  <div class="text-small  text-muted">
    <h2><strong>Notícias</strong>&nbsp;&nbsp;<img src="img/incones/noticia.png" class="img-fluid" style="width:45px; height:45px; "></h2>
  </div>
</div>
<section class="container-fluid" style="margin-top: 50px;">
  <div class="bg-white box-shadow py-5 px-4 px-sm-5">
    <div class="row">
      <?php
      include 'db/exibir_todas_noticias.php';
      foreach ($info as $key => $value) { ?>
        <div class="col-md-6 pb-4 mb-3">
          <?php
            $arquivo = $value['arquivo'];
            $caminho = 'db/mail/upload/' . $arquivo;
            ?>
          <img src="<?php echo $caminho; ?>" class="img-fluid" id="" alt="Responsive image" style="width: 100%; height: 250px;">
          <label id="texto">
            <h6><span class='d-inline-block bg-info text-white px-2 py-1' style="margin-top: 10px;"><?php echo date("d/m/Y", strtotime($value['data'])) ?></span> </h6>
          </label>
          <h6><a href="noticia1.php?id=<?php echo $value['id']; ?>" class="card-title text-justify" style="margin-right: 8px; margin-left: 8px; cursor: pointer;"><?php echo mb_strimwidth($value['titulo'], 0, 65, '...'); ?></a></h6>
          <p class="card-text text-justify" style="margin-right: 6px; margin-left: 6px; cursor: pointer;"> <?php echo mb_strimwidth($value['texto'], 0, 200, '...');  ?></p>

          <br>
        </div>
      <?php } ?>
    </div class="centro">
    <button type="button" class="btn btn-primary"> VER MAIS </button>
  </div>
</section>
  <?php // Footer 
include_once("footer.php");
?>