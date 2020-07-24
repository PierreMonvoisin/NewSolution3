<?php
require_once '../share/forbiddenPages.php';
isset($_SESSION['temporaryMail']) && ! empty(trim($_SESSION['temporaryMail'])) ? $userMail = trim($_SESSION['temporaryMail']) : $userMail = null;
isset($_SESSION['randomCode']) && ! empty(trim($_SESSION['randomCode'])) ? $randomCode = trim($_SESSION['randomCode']) : $randomCode = null;
$codeValid = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codeNb6'])) {
  if ($userMail != null && $randomCode != null) {
    $codeFull = true; $inputCode = '';
    foreach ($_POST as $inputNb => $value) {
      if (empty(trim($value))){
        $codeFull = false;
        return false;
      } else {
        $inputCode .= strtoupper(trim($value));
      }
    }
    if ($codeFull && strlen($inputCode) == 6) {
      if (password_verify($inputCode, $randomCode)){
        $codeValid = true;
      }
    }
  }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
  isset($_POST['password']) && ! empty(trim($_POST['password'])) ? $password = trim($_POST['password']) : $password = null;
  isset($_POST['passwordConfirmation']) && ! empty(trim($_POST['passwordConfirmation'])) ? $passwordConfirmation = trim($_POST['passwordConfirmation']) : $passwordConfirmation = null;
  if ($password != null && $passwordConfirmation != null){
    if ($password === $passwordConfirmation){
      $password = filter_var($password, FILTER_SANITIZE_STRING);
      // Create the options array with the reg ex for the password
      $passwordOptions = ['options'=>['regexp'=>'/^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])?[\w!@#$%^&*]{8,}$/']];
      if (filter_var($password, FILTER_VALIDATE_REGEXP, $passwordOptions)) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        require '../model/resetPassword_mod.php';
        $passwordStatus = resetPassword($userMail, $password);
        if ($passwordStatus){
          // All is good in life
          header('location:login.php');
        }
      }
    }
  }
} ?>
