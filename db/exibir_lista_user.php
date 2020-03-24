<?php
       $pdo = new PDO('mysql:host=localhost;dbname=id11064789_maisacessibilidade;charset=utf8','id11064789_dr4g0nb4ll2','!mAU3tiyuCukoNfbvG%P');
        $sql = $pdo->prepare("SELECT u.*, p.nome as perfil  FROM `cad_user` u	inner join perfil_user p  on u.id_perfil_fk = p.id");

            $sql->execute();

            $info = $sql->fetchAll();

          ?>