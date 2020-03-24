<?php
   $pdo = new PDO('mysql:host=localhost;dbname=id11064789_maisacessibilidade;charset=utf8','id11064789_dr4g0nb4ll2','!mAU3tiyuCukoNfbvG%P');

  $sql = $pdo->prepare("SELECT `id` , `nome` FROM estado ORDER BY id ASC");
  $sql->execute();

  $info = $sql->fetchAll();
                                  
                                  
                                    

  ?>