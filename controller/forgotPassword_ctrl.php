<?php require_once '../share/forbiddenPages.php';
$mail = null;
$resetError = false; $resetErrorMessage = 'ERROR';
// If the user wants to reset its password
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['requestNewPassword'])) {
  // Get the mail of the user from the form
  if (isset($_POST['mail']) && ! empty(trim($_POST['mail']))){
    $mail = trim($_POST['mail']);
    $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
    // If mail is verified
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
      require '../model/checkUserValidity_mod.php';
      // Check if the mail exists in the database
      if (checkUserValidity($mail)){
        // Set the subject and the title of the random code mail
        $subject = 'Demande de réinitialisation du mot de passe';
        $title = 'password_reset';
        require '../controller/sendMail_ctrl.php';
        // Send the mail with the random code to the specified mail
        [$mailStatus, $options] = sendMail($mail, $subject, $title);
        if ($mailStatus){
          // If the mail is sent, put the mail and the code in sessions
          if (session_status() == PHP_SESSION_NONE){
            session_start();
          }
          // Hash the password to hide it from everyone except the user's mail
          $_SESSION['randomCode'] = password_hash($options['randomCode'], PASSWORD_BCRYPT);
          $_SESSION['temporaryMail'] = $mail;
          // Redirect to the reset password page
          header('Location:resetPassword.php');
        } else {
          $resetErrorMessage = 'Le mail ne s\'est pas envoyé, veuillez réessayer plus tard';
          $resetError = true;
        }
      } else {
        $resetErrorMessage = 'Aucun compte n\'est associé à ce mail, vous pouvez vous inscrire avec ce mail';
        $resetError = true;
      }
    } else {
      $resetErrorMessage = 'Votre mail est invalide, veuillez réessayer';
      $resetError = true;
    }
  } else {
    $resetErrorMessage = 'Veuillez renseigner votre mail pour réinitialiser votre mot de passe';
    $resetError = true;
  }
} ?>
