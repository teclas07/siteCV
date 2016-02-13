<?php
require 'PHPMailer/PHPMailerAutoload.php';

  class EmailManager extends PHPMailer {
    private   $mail,
              $userConfirmation,
              $subject,
              $message;

    function __construct(UserConfirmation $userConfirmation) {
      $this->mail = new PHPMailer();
      $this->userConfirmation = $userConfirmation;
      $this->subject = "Activer votre compte";
      $this->message = 'Bienvenue sur mon site,

Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.

http://127.0.0.1/edsa-SiteCV/activation.php?log='.urlencode($this->userConfirmation->getLogin()).'&token='.urlencode($this->userConfirmation->getToken()).'


---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';

      $this->mail->isSMTP();
      $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
                                      // Set mailer to use SMTP
      $this->mail->Host = 'smtp.office365.com';                   // Specify main and backup SMTP servers
      $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
      $this->mail->Username = 'romain.margheriti@epitech.eu';    // SMTP username
      $this->mail->Password = 'tkx9qH9d';                           // SMTP password
      $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $this->mail->Port = 587;                                    // TCP port to connect to

      $this->mail->setFrom('romain.margheriti@epitech.eu', 'Romain Margheriti');
      $this->mail->addAddress($this->userConfirmation->getEmail());                                // Add a recipient

      $this->mail->Subject = $this->subject;
      $this->mail->Body    = $this->message;
    }

    public function send() {
      if(!$this->mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $this->mail->ErrorInfo;
      } else {
          echo 'Message has been sent';
      }
    }
  }
?>
