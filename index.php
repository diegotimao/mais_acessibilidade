<?php
require_once("db/db_conect.php");
session_start();

?>
<?php
include_once("config.php");
?>
<?php // Menu 
include_once("menu.php");
?>

<style>
  #texto {
    position: left;
    left: 201px;
    top: 107px;
  }
</style>


<div class="position-relative overflow-hidden  m-md-3 text-center bg-light">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/slide/BB.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slide/slide02.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slide/slide03.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<?php // Exibindo Denuncia 
?>
<div class="container-fluid">
  <div class="about-team team-4" style="margin-top: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <div class="text-small  text-muted">
            <h2><strong><code>Principais Denúncias</code></strong></h2>
          </div>
          <h6 class="description">Seja nosso parceiro e ajude-nos a construir um mundo melhor com mais acessibilidade, para fazer uma denúncia
            você não nescessariamente precisa ser deficiente. Basta se increver.<br> </h6>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card-deck" style="margin-top: 30px;">
      <?php
        include 'db/exibir_denuncia.php';
        foreach ($info as $key => $value) { ?>
        <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
        <div class="card mb-4">
            <?php
              $arquivo = $value['arquivo'];
              $caminho = 'db/mail/upload/' . $arquivo;
              ?>
            <img class="card-img-top" Style="width: 100%; height: 50%" src="<?php echo $caminho; ?>" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title"><a href="denuncia1.php?id=<?php echo $value['id']; ?>"><?php echo mb_strimwidth($value['titulo'], 0, 59, '...'); ?></a></h5>
                <p class="card-text"><?php echo mb_strimwidth($value['descricao'], 0, 65, '...'); ?></p>
              
            </div>
            <div class="card-footer">
                <small class="text-muted"><span class='e-inline-block bg-success text-white px-2 py-1'>Postado</span><span class='d-inline-block bg-info text-white px-2 py-1'><?php echo date("d/m/Y", strtotime($value['data'])); ?></span>&nbsp; </span></small>
                <p class="card-text"><small class="text-danger">CIDADE <?php echo $value['cidade']; ?></small></p>
              </div>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="centro" style="margin-top: 30px; right: 200px; position: center">
    <a href="https://acessibilidademais.000webhostapp.com/denuncias.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Ver Todas as Denuncias</a>
    </div>
  </div>
  <br>
  <hr>
  <!--- // Enquete -->


  <div class="conteiner">
    <div class="jumbotron" style="background-image: url('img/enquete3.png'); background-repeat: no-repeat; background-size: cover; background-position: center center; margin-top: -20px;">
      <div class="row">
        <div class="col-lg-8">
          <div class="cta-text">
            <?php
            include 'db/exibir_enquete.php';
            foreach ($info as $key => $value) { ?>
              <div class="row">
                <div class="class col-6">
                  <div class="d-inline p-2 text-white" style="margin-top: 50px; background-color:#1AB7EC;">ENQUETE &nbsp;&nbsp;<img src="img/incones/voto.png" class="img-fluid" style="width:32px; height:32px;"> </div>
                </div>
                <div class="class col-6">
                  <?php
                    //Imprimir a mensagem de voto recebido co sucesso
                    if (isset($_SESSION['msg'])) {
                      //Imprimir o valor da sessão
                      echo $_SESSION['msg'];
                      //Destruir a sessão com PHP
                      unset($_SESSION['msg']);
                    } ?>
                </div>
              </div>
              <p class="card-text" ><small class="text-danger">Públicado a <?php echo date("d/m/Y", strtotime($value['data'])) ?></small></p>
              <h2 Style="margin-top: 20px; color:#e34c52; font-size: 30px;"><?php echo $value['pergunta']; $id_enquete =  $value['id']; ?> </h2>
              <div class="row">
                <div class="col-6 col-lg-12 col-mb-12 col-xs-12">
                  <p style="font-size: 13px;">Participe da enquente seu voto vale muito.</p>
                </div>
              </div>
          </div>
          
        </div>
      <?php } ?>
       
        <form action="db/votar.php" method="post" style="margin-top: 22px;">
          <div class="col-lg-4" Style="margin-top: 95px;">
            <div class="cta-btn">
              <input type="hidden" value="<?= $id_enquete ?>" name="enquete" required>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="opcao" id="1" value="1" Style="width:25px; height:25px;">

                <label class="form-check-label" for="opcao">
                  <h2 style="height:2px; margin-top: -5px;">&nbsp;SIM</h2>  
                </label>
              </div>
              <br>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="opcao" id="opcao2" value="2" Style="width:25px; height:25px;" required>
                <label class="form-check-label" for="opcao">
                  <h2 style="height:2px; margin-top: -5px;">&nbsp;NÃO</h2>
                </label>
              </div>
              &nbsp;&nbsp;<input class="btn btn-success text-white" type="submit" value=" VOTAR " role="button" style="margin-top: 20px;">

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- // Sobre-->
<div class="container-fluid">
  <div class="d-md-flex flex-md-equal w-100 row">
    <!-- my-md-3 pl-md-3 !  mr-md-3 pt-3 px-3 pt-md-5 px-md-5-->
    <div class=" col-md-12 col-lg-6 bg-dark text-center text-white overflow-hidden" style="right: -17px;">
      <div class="my-3 py-3">
        <h2 class="display-5">ACESSIBILIDADE</h2>
        <p class="lead text-justify">
          Exercer o direito de ACESSEBILIDADE pode ser bem complicado. Uma criança por exemplo, precisa de uma cidade onde ela possa ser levada para passear sem dificuldades.
          ACESSIBILIDADE é ter alternativa para subir uma escada. ACESSIBILIDADE também é o problema de quem anda de cadeira de rodas e não consegue subir uma calçada por que
          não tem rampa ou por que um carro estacionou na frente dela. Agente precisa de um mundo onde o que é necessário esteja ao nosso alcance. Seja a nossa limitação
          temporária ou definitiva, todos nós, em algum momento da vida, Precisamos de ACESSIBILIDADE.
        </p>
      </div>
    </div>


    <!---  // Video --->

    <div class=" col-md-12 col-lg-6 justify-content-center" style="right: -19px;">

      <!--  <div class="e-inline p-2  text-white " style="margin-top: 8px; background-color: #3498DB; pading: 40px;">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          <button class="btn btn-danger my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>-->

      <h2 class="display-5" Style="margin-top: 60px; "> VÍDEOS <img src="img/incones/youtube.png" class="img-fluid" style="width:45px; height:45px;  margin-top: -4px; "></h2>
      </h2>
      <div class="embed-responsive embed-responsive-16by9" style="padding-left: px; padding-right: 2px;">
        <iframe width="953" height="480" src="https://youtube.com/embed/BCrvDKmgMyg?t=28" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<br>




<!--- // Depoimento --->

<div class="jumbotron jumbotron-fluid" style="background-image: url('img/matriz.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center; margin-top: 10px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="img/matriz1.png" class="card-img" alt="Imagem responsiva" style="width: 100%; height: 100%; ">
      </div>
      <div class="col-md-6" style="width: 100%;">
        <h5 class="card-title text-warning mb-0" style="margin-top 20px;">DEPOIMENTO</h5>
        <hr>
        <p class="card-text  text-dark text-justify" Style="font-size: 16px;"><em><img src="img/incones/aspas.png" class="img-fluid" style="width:15px; height:15px;  margin-top: -15px; "> A empatia contribui muito para o sucesso pessoal e profissional à medida que, ao compreendermos melhor os sentimentos alheios,
            conseguimos nos adaptar e aprendemos a lidar com diferentes pessoas e situações. Foi como um grande desafio que abraçamos essa causa e para nós estudantes do Ensino Médio Técnico poder contribuir de forma últil
            para a sociedade e para as pessoas que mais nessecita do nosso apoio e poder usar nossos conhecimentos adquiridos em sala de aula para tornar um mundo cada vez melhor. Nossos mais sinceros agradecimentos a <strong>ISABELA</strong> uma menina muito especial  que nos deu a honra de conhecer a sua história e atravéz dela podemos nós como ser humano sentir a empatia, um grande exemplo de mulher forte e determinada que não se deixa abalar pelos empecilhos que a vida traz. <img src="img/incones/aspas1.png" class="img-fluid" style="width:15px; height:15px;  margin-top: -15px; "><em></p>
        <footer class="blockquote-footer">Palavras <cite title="Título da fonte">da equipe</cite></footer>

      </div>
    </div>
  </div>
</div>



<!---- // Noticias---->

<div class="container">
  <div class="text-small  text-muted">
    <h2><strong>Notícias</strong>&nbsp;&nbsp;<img src="img/incones/noticia.png" class="img-fluid" style="width:45px; height:45px; "></h2>
  </div>
</div>
<section class="container-fluid" style="margin-top: 50px;">
  <div class="bg-white box-shadow py-5 px-4 px-sm-5">
    <div class="row">
      <?php
      include 'db/exibir_noticia.php';
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
    <a href="noticias.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Ver Todas as Noticias</a>
  </div>
</section>


<hr>

<!-- // Exibindo Equipe de Desenvolvimento -->

<section class="bg-white" style="margin-top: 50px;">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-md-6 col-lg-5 text-center text-md-left section-intro">
        <h4 class="h2 mb-0">EQUIPE DE DESENVOLVEDORES</h4><br>
        <span class="title-decorative" style="color: brown; text-center;">ALUNOS<code>  Diego Santos, Alexandre Alves, Matheus Menezes, Pablo Grabriel, Beatriz Correia, Raiana Teixeira, Wendell Ramon</code> </span><br><br>
        <span class="title-decorative" style="color: brown; text-center;">PROFESSOR<code> Tássio Gonsalves</code> </span>
        <br>
        <br>
        <span class="lead">
          Projeto desenvolvido como trabalho de conclusão de curso, 7 alunos do colegio Cetep-1,
          pensando em mudar a forma das pessoas olharem para aquelas que mais sofrem com suas defiências e dificuldades
          para se locomover em meio a ruas, vielas, ciclovia ou até mesmo estabelecimento que por muitos acabam não pensando
          nessas pessoas.
        </span>
        <a href="https://www.instagram.com/colegiocetepi/?hl=pt-br" target="blank"> <br><br>CONHEÇA O COLEGIO CETEP-1 &rsaquo;</a>
      </div>
      <br>
      <div class="col-8 col-md-6 col-lg-4">
        <br>
        <img alt="Image" src="img/equipeof.png" class="img-fluid " />
      </div>
    </div>
  </div>
  </div>
</section>
<br>
<br>

<!--- // Patrocinadores -->

<div class="container">
  <hr>
  <h4 class="text-center">Patrocinadores</h4>
  <div class="row">
    <div id="dan" class="col-2 col-mb-4">
      <img src="img/logo1.png" class="img-fluid" alt="Responsive image" style="">
    </div>
    <div class="col-2 col-mb-4">
      <img src="img/logo/marvel.png" class="img-fluid" alt="Responsive image" style="margin-top: 9px; cursor: pointer;">
    </div>
    <div class="col-2 col-mb-4">
      <img src="img/logo1.png" class="img-fluid" alt="Responsive image" style="">
    </div>
    <div class="col-2 col-mb-4">
      <img src="img/logo4.png" class="img-fluid" alt="Responsive image" style="">
    </div>
    <div class="col-2 col-mb-4">
      <img src="img/logo5.png" class="img-fluid" alt="Responsive image" style="">
    </div>
    <div class="col-2 col-mb-4">
      <img src="img/logo6.png" class="img-fluid" alt="Responsive image" style="">
    </div>
  </div>
</div>

<?php // Footer 
include_once("footer.php");
?>