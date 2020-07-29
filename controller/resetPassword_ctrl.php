<?php
require_once '../share/forbiddenPages.php';
$codeValid = false;
$codeError = false; $codeErrorMessage = 'ERROR';
$resetError = false; $resetErrorMessage = 'ERROR';
$resetValid = false; $resetValidMessage = 'ERROR';
// Get the mail and code from the session setup the previous page
isset($_SESSION['temporaryMail']) && ! empty(trim($_SESSION['temporaryMail'])) ? $userMail = trim($_SESSION['temporaryMail']) : $userMail = null;
isset($_SESSION['randomCode']) && ! empty(trim($_SESSION['randomCode'])) ? $randomCode = trim($_SESSION['randomCode']) : $randomCode = null;
// When the user submit the secret code
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codeNb6'])) {
  // Check if the mail and random code are found
  if ($userMail != null && $randomCode != null) {
    $codeFull = true; $inputCode = '';
    // Put each input's value in a single string if it it not empty
    foreach ($_POST as $inputNb => $value) {
      if (empty(trim($value))){
        $codeFull = false;
        return false;
      } else {
        $inputCode .= strtoupper(trim($value));
      }
    }
    // If the code has 6 characters
    if ($codeFull && strlen($inputCode) == 6) {
      // Check the code from the inputs to the code from the session
      if (password_verify($inputCode, $randomCode)){
        // If the code is valid, display " reset password " form
        $codeValid = true;
      } else {
        $codeErrorMessage = 'Code incomplet ou incorrect, veuillez recommencer';
        $codeError = true;
      }
    } else {
      $codeErrorMessage = 'Code incomplet ou incorrect, veuillez recommencer';
      $codeError = true;
    }
  } else {
    $codeErrorMessage = 'Redirection invalide, veuillez retournez à la page de connection.';
    $codeError = true;
  }
}
// When the user submit its new password
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resetPasswordButton'])) {
  // Get the password and the password confirmation from the form submitted
  isset($_POST['password']) && ! empty(trim($_POST['password'])) ? $password = trim($_POST['password']) : $password = null;
  isset($_POST['passwordConfirmation']) && ! empty(trim($_POST['passwordConfirmation'])) ? $passwordConfirmation = trim($_POST['passwordConfirmation']) : $passwordConfirmation = null;
  if ($password != null && $passwordConfirmation != null){
    // If both inputs are valid and identical
    if ($password === $passwordConfirmation){
      // Sanitize and validate the password
      $password = filter_var($password, FILTER_SANITIZE_STRING);
      // Create the options array with the reg ex for the password
      $passwordOptions = ['options'=>['regexp'=>'/^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])?[\w!@#$%^&*]{8,}$/']];
      if (filter_var($password, FILTER_VALIDATE_REGEXP, $passwordOptions)) {
        // If the password is valid, hash it to store it safely
        $password = password_hash($password, PASSWORD_BCRYPT);
        require '../model/resetPassword_mod.php';
        // Require the access to the database and update the password
        $passwordStatus = resetPassword($userMail, $password);
        if ($passwordStatus){
          // All is good in life
          // Redirect to the login page
          header('location:login.php');
        } else {
          $resetErrorMessage = 'Une erreur est survenue avec la base de données. Veuillez recommencer plus tard.';
          $resetError = true;
        }
      } else {
        $resetErrorMessage = 'Mot de passe invalide, il doit contenir au moins huit caractères ainsi qu\'au moins une majuscule et un chiffre';
        $resetError = true;
      }
    } else {
      $resetErrorMessage = 'Mot de passe et confirmation différents, veuillez recommencer';
      $resetError = true;
    }
  } else {
    $resetErrorMessage = 'Redirection invalide, veuillez retournez à la page de connexion.';
    $resetError = true;
  }
} ?>
