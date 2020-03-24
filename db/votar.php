<?php
require_once("db_conect.php");

session_start();

if(isset($_POST['opcao'])){

   if(!isset($_SESSION['logado'])){
     header("Location: https://acessibilidademais.000webhostapp.com/login.php");
   }else{

        $op = $_POST["opcao"];
        $id = $_SESSION['id'];
        $enquete = $_POST["enquete"];
        
        if(isset($op)){
        
            if(isset($_COOKIE['voto_cont'])){
                
                $_SESSION['msg'] = " <span style='color: red; font-size: 15px;'>VOCÊ JÁ VOTOU</span>";
                $confimado = true;
                
                header("Location: https://acessibilidademais.000webhostapp.com/index.php");
            }else{
                
                setcookie('voto_cont', $_SERVER['REMOTE_ADDR'], time() + (60 * 24));
                
                if($op == 1){
                    $sql = "UPDATE cad_enquete SET sim = sim + 1 WHERE id = $enquete";
                        
                }else if($op == 2){
                    $sql = "UPDATE cad_enquete SET nao = nao + 1 WHERE id = $enquete";
                    
                }
               
                $result = mysqli_query($conn, $sql);

                if(mysqli_affected_rows($conn)){

                    $_SESSION['msg'] = " <span style='color: green; font-size: 15px;'>VOTO RECEBIDO COM SUCESSO!</span>";
                    header("Location: https://acessibilidademais.000webhostapp.com/index.php");
                
                }else{
                    
                    $_SESSION['msg'] = " <span style='color: red; font-size: 15px;'>Erro ao votar!</span>";
                    header("Location: https://acessibilidademais.000webhostapp.com/index.php");
                
                }
            }
        }
        
    }

}