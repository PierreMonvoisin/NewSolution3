<?php require_once '../share/forbiddenPages.php';
require_once '../vendor/autoload.php';
function sendMail($mailTo){
  try {
    // Setup transporter ( mailtrap.io is a virtual box)
    $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
    ->setUsername('e5e7afdff429fc')->setPassword('eb0ddeae9c189c');
    // Initiate the mailer service
    $mailer = new Swift_Mailer($transport);
    // Create the message
    $message = (new Swift_Message())
    // Add subject
    ->setSubject('First Test Mail')
    //Put the From address
    ->setFrom(['solution3.contact@gmail.com'])
    // Include several To addresses
    ->setTo([$mailTo => 'New user']);
    // Include HTML
    $message->setBody('<p>Welcome to Maitrap!</p>Now your test emails will be <i>safe</i>', 'text/html');
    $message->addPart('Welcome to Mailtrap, now your test emails will be safe', 'text/plain');
    // Send mail
    $mailer->send($message);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
} ?>
