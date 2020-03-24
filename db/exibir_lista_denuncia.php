<?php
   $pdo = new PDO('mysql:host=localhost;dbname=id11064789_maisacessibilidade;charset=utf8','id11064789_dr4g0nb4ll2','!mAU3tiyuCukoNfbvG%P');
     $sql = $pdo->prepare("SELECT d.*, c.nome as user, e.nome as estado, cd.nome as catnome FROM `cad_denuncia` d 
								inner join cad_user c on d.id_user_fk = c.id
						        inner join estado e on d.id_estado_fk = e.id
						        inner join cat_denuncia cd on d.id_cat_denuncia_fk = cd.id
						        ");
            

            $sql->execute();

            $info = $sql->fetchAll();
            

          ?>