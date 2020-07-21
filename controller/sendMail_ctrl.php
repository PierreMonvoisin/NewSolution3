<?php require_once '../share/forbiddenPages.php';
require_once '../vendor/autoload.php';
function sendMail($mailTo, $subject, $title){
  $htmlPart = '<h5>ERROR</h5>'; $textPart = 'ERROR';
  $options = [];
  // Setup transporter ( gmail.com )
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername('solutioncubed.contact@gmail.com')->setPassword('iauskqtrymliygcw');
  // Initiate the mailer service
  $mailer = new Swift_Mailer($transport);
  // Create the message
  $message = (new Swift_Message())
  // Add subject
  ->setSubject('solution3.org - '. $subject)
  // Put the From address
  ->setFrom(['solutioncubed.contact@gmail.com' => 'solution3.org'])
  // Put the To address
  ->setTo([$mailTo]);
  // Get content
  require '../view/mails/'. $title .'.php';
  // Include HTML
  $message->setBody($htmlPart, 'text/html');
  // Put text in case HTML don't load
  $message->addPart($textPart, 'text/plain');
  // Send mail
  $mailStatus = $mailer->send($message);
  return [$mailStatus, $options];
} ?>
