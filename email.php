<?php
header("Content-type: text/html; charset=utf-8");
require 'PHPMailer/PHPMailerAutoload.php';



    function enviarEmail ($titulo, $corpoEmail, $destinatario){

        $Mailer = new PHPMailer();

        //Define que será usado SMTP
        $Mailer->IsSMTP();

        //Enviar e-mail em HTML
        $Mailer->isHTML(true);

        //Aceitar carasteres especiais
        $Mailer->Charset = 'UTF-8';

        //Configurações
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'ssl';

        //nome do servidor
        $Mailer->Host = 'email-ssl.com.br';
        //Porta de saida de e-mail
        $Mailer->Port = 465;

        //Dados do e-mail de saida - autenticação
        $Mailer->Username = 'voo@missaodoceu.org.br';
        $Mailer->Password = 'Aeronaveprzjm';

        //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
        $Mailer->From = 'voo@missaodoceu.org.br';

        //Nome do Remetente
        $Mailer->FromName = 'SISTEMA DE VOO';

        $Mailer->Subject = $titulo;

        //Corpo da Mensagem
        $Mailer->Body = $corpoEmail;

        //Corpo da mensagem em texto
        $Mailer->AltBody = 'conteudo do E-mail em texto';

        //Destinatario
        $Mailer->AddAddress('voo@missaodoceu.org.br');
        $Mailer->AddAddress ($destinatario);

        if($Mailer->Send()){
            $_SESSION['msgEmail'] = "<div class='alert alert-success'>Email enviado com sucesso!</div>";
        }else{
            $_SESSION['msgEmail'] = "<div class='alert alert-danger'>Email não enviado!</div>";
        }
    }

?>