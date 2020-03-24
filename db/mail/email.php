<?php
date_default_timezone_set('America/Sao_Paulo');

$servername = "localhost";
$database = "id11064789_maisacessibilidade";
$username = "id11064789_dr4g0nb4ll2";
$password = "!mAU3tiyuCukoNfbvG%P";

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn,'utf8');
if(!$conn){

  die("Deu pau no excel: " + mysqli_connect_error());
}

session_start();

$Nome		= $_SESSION['nome'];	// Pega o valor do campo Nome
//$Fone		= $_POST["Fone"];	// Pega o valor do campo Telefone
$Email		= $_SESSION['email'];	// Pega o valor do campo Email

//$Mensagem	= $_POST["Mensagem"];	// Pega os valores do campo Mensagem
/*
Adiciona variáveis da denúncia
*/
  $titulo = $_POST['titulo'];
  $descricao = $_POST['descricao'];
  $rua = $_POST['rua'];
  $bairro  = $_POST['bairro'];
  $cidade  = $_POST['cidade'];
  $iduser = $_SESSION['id'];
  $estado = null;

/*
fim variáveis banco
*/

// Variável que junta os valores acima e monta o corpo do email
	

$Vai 		= "
				<h3 Style='color: blue;'>Potal Mais Acessibilidade</h3><br>
				 
				 <h4>$Nome o <b>Potal Mais Acessibilidade</b> agradece por ter feito sua denúncia, e por estar contribuindo para um mundo com mais acessibilidade!<br><br>
				 <b Style='color: red;'>E-MAIL:</b>  $Email<br><b Style='color: red;'><br>TITULO:</b>  $titulo<br><b Style='color: red;'><br>DENÚNCIA:</b> $descricao</h4>

				 <h5>Atenciosamente</h5>
				 <img src='https://acessibilidademais.000webhostapp.com/img/logo/marvel.png' Style='width: 200px; height: 90px; left: 200px;'>";

require_once("class.phpmailer.php");

define('GUSER', 'maisacessibilidade15@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'di201920');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();			// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->CharSet = 'iso-8859-1';
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->IsHTML(true);
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}


/*
Coloca aqui a lógica para salvar no banco
*/
//verificando o select
if (isset($_POST['estado'])) {
    $estados = $_POST['estado'];
    for ($i = 0; $i < count($estados); $i++) {
      $estado = $estados[$i];
    }
  } else {
    echo "Deu pau no excel";
  }


  $date = date('Y-m-d H:i');

  
  $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
  $novo_nome = md5(time()) . $extensao;
  $diretorio = 'upload/';

  move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); 

  $sql = "INSERT INTO cad_denuncia VALUES (null,'$titulo','$descricao','$rua','$bairro','$cidade','$estado','$novo_nome',$iduser,1,'$date')";
  
  if (mysqli_query($conn, $sql)) {
	//echo "<script>
    //    location.href='http://localhost/bootstrap2/';
      //</script>";
}
else {
 echo "Deu pau no excel: " . $sql . "</br>" . mysqli_error($conn);
}



/*

Fim da lógica de salvar no banco

*/

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

 if (smtpmailer($Email, 'maisacessibilidade15@gmail.com', 'Mais Acessibilidade', 'Confirma Denuncia.', $Vai)) {

	Header("location:http://localhost/bootstrap2/"); // Redireciona para uma página de obrigado.

}
if (!empty($error)) echo $error;



?>