<?php require_once '../share/forbiddenPages.php';
require_once '../vendor/autoload.php';
function sendMail($mailTo){
  // Setup transporter ( mailtrap.io is a virtual mailbox )
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername('monvoisin.pierre@gmail.com')->setPassword('mwynvhpbrwirlylk');
  // Initiate the mailer service
  $mailer = new Swift_Mailer($transport);
  // Create the message
  $message = (new Swift_Message())
  // Add subject
  ->setSubject('Demande de réinitialisation du mot de passe')
  //Put the From address
  ->setFrom(['solution3.contact@gmail.com' => 'Solution3.com'])
  // Include several To addresses
  ->setTo([$mailTo]);
  // Include HTML
  $message->setBody('<h3>Ceci est un mail de test envoyé depuis Solution³.com</h3>
  <p>Veuillez ne pas y faire attention, mademoiselle</p>', 'text/html');
  // Put text in case HTML don't load
  $message->addPart('Ceci est un mail de test envoyé depuis Solution³.com. Veuillez ne pas y faire attention, mademoiselle', 'text/plain');
  // Send mail
  if ($mailer->send($message)){
    // Mail sent, need redirection
  }
} ?>
