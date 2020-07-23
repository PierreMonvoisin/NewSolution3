<?php
// Set parameters for random code
$characters = '1223445667889ABCDEFGHIJKLMNPQRSTUVWXYZ';
// 1 544 804 416 combinaitions possible with a six characters string
$charactersLength = strlen($characters);
$randomCode = '';
// Create a random code of 6 alphanumeric characters
for ($i = 0; $i < 6; $i++) {
  $randomCode .= $characters[rand(0, $charactersLength - 1)];
}
$options['randomCode'] = $randomCode;
// Get the html of the mail as a string
$htmlPart = file_get_contents('../view/mails/'. $title .'.html');
// Replace the placeholder of the code by the random code
$htmlPart = preg_replace('/--RANDOM_CODE--/', $randomCode, $htmlPart);
// Set a text in place of the email if HTML fails
$textPart = 'Afin de réinitialiser votre mot de passe, veuillez copier le code suivant dans la page de Solution3 ouverte dans votre navigateur : '. $randomCode; ?>
