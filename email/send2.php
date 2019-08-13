<?php

require 'vendor2/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();


$client = new \GuzzleHttp\Client();
$request = new \GuzzleHttp\Psr7\Request('GET', 'https://api.hubapi.com/contacts/v1/lists/all/contacts/all?hapikey=cf7c11b8-591b-40d5-8791-d4ac39a1a0df');
$promise = $client->sendAsync($request)->then(function ($response) {
$data = $response->getBody();
$decode = json_decode($data, true); 

if(isset($_POST['send'])){

    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $filename = $_FILES['attachment']['name'];
    $location = 'attachment/' . $filename;
    move_uploaded_file($_FILES['attachment']['tmp_name'], $location);
foreach($decode['contacts'] as $c){
    $first_name = $c["properties"]["firstname"]["value"];
    $email = $c["identity-profiles"][0]["identities"][0]["value"];

    //var_dump($first_name);
    //var_dump($email);
 

    echo "$email";

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;        // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
$mail->SMTPAuth = true;        // Autenticação ativada
$mail->SMTPSecure = 'tls';    // TLS REQUERIDO pelo GMail
$mail->Host = 'smtp.gmail.com';    // SMTP utilizado
$mail->Port = 587;          // A porta 587 deverá estar aberta em seu servidor
$mail->Username = "teste2volner@gmail.com";
$mail->Password = "vaamerda";
        //Send Email
        $mail->setFrom('teste9999999ww@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('teste99999sdasd2@gmail.com');
        
        //Attachment
        if(!empty($filename)){
            $mail->addAttachment($location, $filename); 
        }
       
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->SMTPDebug = 3;
        $mail->send();
        $_SESSION['message'] = 'Message has been sent';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
    }

}
}
});

$promise->wait();

?>
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();


if(isset($_POST['send'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $filename = $_FILES['attachment']['name'];
    $location = 'attachment/' . $filename;
    move_uploaded_file($_FILES['attachment']['tmp_name'], $location);

    //Load composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;        // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
$mail->SMTPAuth = true;        // Autenticação ativada
$mail->SMTPSecure = 'tls';    // TLS REQUERIDO pelo GMail
$mail->Host = 'smtp.gmail.com';    // SMTP utilizado
$mail->Port = 587;          // A porta 587 deverá estar aberta em seu servidor
$mail->Username = "teste2volner@gmail.com";
$mail->Password = "vaamerda";
        //Send Email
        $mail->setFrom('teste9999999ww@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('teste99999sdasd2@gmail.com');
        
        //Attachment
        if(!empty($filename)){
            $mail->addAttachment($location, $filename); 
        }
       
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->SMTPDebug = 3;
        $mail->send();
        $_SESSION['message'] = 'Message has been sent';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
    }

    header('location:index2.php');
}
else{
    $_SESSION['message'] = 'Please fill up the form first';
    header('location:index2.php');
}