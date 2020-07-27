<?php
require '../share/forbiddenPages.php';
require '../controller/login_ctrl.php';
require '../controller/forgotPassword_ctrl.php'; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <title>Login - Solution³</title>
  <?php
  require '../share/requiredHeadTags.html';
  include '../share/fonts.html'; ?>
  <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body class="bg-silver">
  <?php include '../share/header.php'; ?>
  <div class="container d-flex" id="loginContainer">
    <div class="card m-auto pt-3 shadow-lg" id="loginCard">
      <div class="bg-secondary mx-auto d-flex image-upload" id="avatarContainer">
        <img class="card-img-top m-auto" src="../assets/img/3x3_solved_simple.png" alt="solved cube" id="topAvatar" />
      </div>
      <div class="card-body">
        <h3 class="card-title text-center mb-4">Connexion</h3>
        <!-- Display the error message if there is one -->
        <?php if ($error) { ?>
          <h4 class="text-center"><?= $errorMessage ?></h4>
        <?php } else if  ($confirmation) { ?>
          <h4 class="text-center"><?= $confirmationMessage ?></h4>
        <?php } else if ($resetError){ ?>
          <h4 class="text-center"><?= $resetErrorMessage ?></h4>
        <?php } else { ?>
          <h4 class="text-center outputMessage"></h4>
        <?php } ?>
        <form id="loginForm" action="login.php" method="post" autocomplete="on">
          <!-- Email input -->
          <div class="form-group row">
            <label for="loginMail" class="col-xl-3 col-form-label">Email</label>
            <div class="col-xl-9">
              <input name="loginMail" type="email" class="form-control" id="loginMail" placeholder="Email">
            </div>
          </div>
          <!-- Password input -->
          <div class="form-group row">
            <label for="loginPassword" class="col-xl-3 col-form-label">Mot de passe</label>
            <div class="col-xl-9">
              <input name="loginPassword" type="password" class="form-control" id="loginPassword" placeholder="Password">
            </div>
          </div>
          <!-- Buttons -->
          <div class="form-group row">
            <div class="col-xl-9 offset-xl-3 d-md-flex">
              <button type="submit" name="loginSubmit" class="btn btn-success mr-1" disabled>Se connecter</button>
              <button type="submit" formaction="signin.php" class="btn btn-info">Créer votre compte</button>
            </div>
            <a href="#" data-toggle="modal" data-target="#forgotPasswordModal" class="offset-md-5 mx-auto pt-3">Mot de passe oublié ?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php // Local storage authorization modal
  include '../share/userAuthorization.php';
  // Forgotten password modal
  include '../share/forgotPassword.php';
  // Required scripts
  require '../share/requiredScriptTags.html'; ?>
  <script src="../assets/js/share/inputsValidations.js"></script>
  <script src="../assets/js/login.js"></script>
</body>
</html>
