<?php
            $pdo = new PDO('mysql:host=localhost;dbname=id11064789_maisacessibilidade;charset=utf8','id11064789_dr4g0nb4ll2','!mAU3tiyuCukoNfbvG%P');
            $sql = $pdo->prepare("SELECT * FROM cad_noticia order by id ");
            

            $sql->execute();

            $info = $sql->fetchAll();
            
            
              

          ?>