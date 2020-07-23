<?php
if (session_status() == PHP_SESSION_NONE){
  session_start();
}
require '../share/forbiddenPages.php';
require '../controller/resetPassword_ctrl.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <title>Réinitialisation - Solution³</title>
  <?php
  require '../share/requiredHeadTags.html';
  include '../share/fonts.html'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/css/resetPassword.css">
</head>
<body class="bg-silver">
  <?php include '../share/header.php'; ?>
  <div class="container d-flex" id="cardContainer">
    <div class="card m-auto pt-3 shadow-lg">
      <div class="bg-secondary mx-auto d-flex image-upload" id="avatarContainer">
        <img class="card-img-top m-auto" src="../assets/img/3x3_solved_simple.png" alt="solved cube" id="topAvatar" />
      </div>
      <div class="card-body">
        <h3 class="card-title text-center mb-3">Réinitialisation du mot de passe</h3>
        <p class="text-center">Nous vous avons envoyé un mail à [MAIL] avec un code à six caractères. Merci de le copier dans cette page afin de confirmer votre mail et changer votre mot de passe.</p>
        <form action="#" method="post" class="py-3" id="resetCode">
          <div class="form-group row">
            <label for="codeNb1" class="sr-only">Premier caractère</label>
            <div class="col-2">
              <input name="codeNb1" type="text" class="form-control text-center" id="codeNb1" maxlength="1">
            </div>
            <label for="codeNb2" class="sr-only">Second caractère</label>
            <div class="col-2">
              <input name="codeNb2" type="text" class="form-control text-center" id="codeNb2" maxlength="1">
            </div>
            <label for="codeNb3" class="sr-only">Troisième caractère</label>
            <div class="col-2">
              <input name="codeNb3" type="text" class="form-control text-center" id="codeNb3" maxlength="1">
            </div>
            <label for="codeNb4" class="sr-only">Quatrième caractère</label>
            <div class="col-2">
              <input name="codeNb4" type="text" class="form-control text-center" id="codeNb4" maxlength="1">
            </div>
            <label for="codeNb5" class="sr-only">Cinquième caractère</label>
            <div class="col-2">
              <input name="codeNb5" type="text" class="form-control text-center" id="codeNb5" maxlength="1">
            </div>
            <label for="codeNb6" class="sr-only">Sixième caractère</label>
            <div class="col-2">
              <input name="codeNb6" type="text" class="form-control text-center" id="codeNb6" maxlength="1">
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-8 mx-auto">
            <button type="submit" form="resetCode" id="submitCodeButton" class="btn btn-success btn-block" disabled>Valider le code</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php // Required scripts
  require '../share/requiredScriptTags.html'; ?>
  <script src="../assets/js/resetPassword.js"></script>
</body>
</html>
