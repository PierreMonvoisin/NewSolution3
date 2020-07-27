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
        <?php if ($codeValid){ ?>
          <h3 class="card-title text-center mb-3">Entrez votre nouveau mot de passe</h3>
          <form class="pt-3" action="#" method="post" id="resetPasswordForm">
            <div class="form-group mb-1 row">
              <label for="password" class="col-6 text-center p-1">Veuillez entrer un nouveau mot de passe</label>
              <div class="col-6 my-2 pr-5">
                <input class="w-100" type="password" name="password" id="password">
              </div>
              <label for="passwordConfirmation" class="col-6 text-center">Veuillez confirmer votre mot de passe</label>
              <div class="col-6 my-2 pr-5">
                <input class="w-100" type="password" name="passwordConfirmation" id="passwordConfirmation">
              </div>
              <div class="col-12 mt-4">
                <button type="submit" id="submitPasswordChange" class="btn btn-success btn-block">Changer votre mot de passe</button>
              </div>
            </div>
          </form>
        <?php } else { ?>
          <h3 class="card-title text-center mb-3">Réinitialisation du mot de passe</h3>
          <p class="text-center">Nous vous avons envoyé un mail à <?= $userMail ?? 'votre mail' ?> avec un code à six caractères. Merci de le copier dans cette page afin de confirmer votre mail et changer votre mot de passe.</p>
          <?php if ($codeError) { ?>
            <h4 class="text-center mt-2"><?= $codeErrorMessage ?></h4>
          <?php } else if ($resetError) ?>
            <h4 class="text-center mt-2"><?= $resetErrorMessage ?></h4>
          <?php } ?>
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
        <?php } ?>
      </div>
    </div>
  </div>
  <?php // Required scripts
  require '../share/requiredScriptTags.html'; ?>
  <script src="../assets/js/resetPassword.js"></script>
</body>
</html>
