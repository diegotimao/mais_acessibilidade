<?php

$servername = "localhost";
$database = "id11064789_maisacessibilidade";
$username =  "id11064789_dr4g0nb4ll2";
$password = "!mAU3tiyuCukoNfbvG%P";

$conn = mysqli_connect($servername, $username, '', $database);
if (!$conn) {
    die("Deu pau no excel: " + mysqli_connect_error());
}

$msg = false;

if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "upload/";
        
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

        $sql = "INSERT INTO imagens (id, arquivo, data) VALUES (null, '$novo_nome', NOW())";
       
        if($conn->query($sql)){
            $msg = "Arquivo enviado com sucesso";
        }else{
            $msg = "Arquivo não enviado";
        }
            
       
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
</head>

<body>
<?php if($msg != false){
    echo "<p> $msg </p>";
} ?>
    <h1>Upload</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Arquivo: <input type="file" required name="arquivo">
        <input type="submit" value="salvar">
    </form>
</body>

</html>