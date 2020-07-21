<?php require_once '../share/forbiddenPages.php';
$mail = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['requestNewPassword'])) {
  if (isset($_POST['mail']) && ! empty(trim($_POST['mail']))){
    $mail = trim($_POST['mail']);
    $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
      require '../model/checkUserValidity_mod.php';
      if (checkUserValidity($mail)){
        $subject = 'Demande de réinitialisation du mot de passe';
        $title = 'password_reset';
        require '../controller/sendMail_ctrl.php';
        [$mailStatus, $options] = sendMail($mail, $subject, $title);
        if ($mailStatus){
          $_SESSION['randomCode'] = $options['randomCode'];
          $_SESSION['temporaryMail'] = $mail;
          var_dump($_SESSION);
        }
      }
    }
  }
} ?>
