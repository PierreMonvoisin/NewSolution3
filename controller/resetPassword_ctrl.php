<?php
require_once '../share/forbiddenPages.php';
isset($_SESSION['temporaryMail']) && ! empty(trim($_SESSION['temporaryMail'])) ? $userMail = trim($_SESSION['temporaryMail']) : $userMail = null;
isset($_SESSION['randomCode']) && ! empty(trim($_SESSION['randomCode'])) ? $randomCode = trim($_SESSION['randomCode']) : $randomCode = null;
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
        var_dump('Email verified');
      }
    }
  }
} ?>
