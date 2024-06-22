<?php
    header('Content-Type: text/html; charset=utf-8');

    require_once (__DIR__."/vendor/autoload.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
     #   $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'igor.barbosa.dev@gmail.com';                     // SMTP username
        $mail->Password   = 'qpmpoxsuogqrfexv';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('igor.barbosa.dev@gmail.com', 'Contato');
        $mail->addAddress('rodrigo@zambarda.com.br', 'Rodrigo');     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        //$mail->Subject = 'Contato de teste';
        //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';

        $mail->Subject = ('zambarda.com.br - '.$_POST['nome'].' - gostaria de receber um contato');
        $mail->msgHTML("
            <b>Nome</b>: {$_POST['nome']} <br/>
            <b>Celular</b>: {$_POST['celular']} <br/>
            <b>E-mail</b>: {$_POST['email']} <br/>
            <b>Descrição</b>: <br><br> {$_POST['mensagem']} <br/>
        ");


        if ($mail->send())
        {
            echo json_encode(['error' => false, 'message' => 'Os dados foram enviados com sucesso! Em breve entraremos em contato.']);
        } 
        else
        {
            echo json_encode(['error' => true, 'message' => 'Não foi possível encaminhar o e-mail']);
        }
    } catch (Exception $e) {
        echo json_encode(['error' => true, 'message' => 'Não foi possível encaminhar o e-mail', 'exception' => $e->getMessage()]);     
    }
