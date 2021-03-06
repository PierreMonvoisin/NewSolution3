<?php require_once '../share/forbiddenPages.php';
$updateError = false; $udpateConfirmation = false; $udpateConfirmationMessage = 'ERROR'; $updateErrorMessage = 'ERROR';
// On form post and submitChanges button pressed
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitChanges'])){
  // Set all default value
  $mainFontColor = '#000000'; $secondaryFontColor = '#FFFFFF';
  $mainBackgroundColor = '#E8DCD8'; $secondaryBackgroundColor = '#C1C1C1';
  $headerBackgroundColor = '#463730'; $statsBackgroundColor = '#BF6B44';
  $mainFont = 1; $timerFont = 3;
  $displayTimer = 1;
  $id_personnalisations = -1;
  // Get all values from the form at once
  ! empty(trim($_POST['mainFontColor'])) ? $mainFontColor = trim($_POST['mainFontColor']) : $mainFontColor = null;
  ! empty(trim($_POST['secondaryFontColor'])) ? $secondaryFontColor = trim($_POST['secondaryFontColor']) : $secondaryFontColor = null;
  ! empty(trim($_POST['mainBackgroundColor'])) ? $mainBackgroundColor = trim($_POST['mainBackgroundColor']) : $mainBackgroundColor = null;
  ! empty(trim($_POST['secondaryBackgroundColor'])) ? $secondaryBackgroundColor = trim($_POST['secondaryBackgroundColor']) : $secondaryBackgroundColor = null;
  ! empty(trim($_POST['headerBackgroundColor'])) ? $headerBackgroundColor = trim($_POST['headerBackgroundColor']) : $headerBackgroundColor = null;
  ! empty(trim($_POST['statsBackgroundColor'])) ? $statsBackgroundColor = trim($_POST['statsBackgroundColor']) : $statsBackgroundColor = null;
  isset($_POST['mainFont']) && ! empty(trim($_POST['mainFont'])) ? $mainFont = trim($_POST['mainFont']) : $mainFont = null;
  isset($_POST['timerFont']) && ! empty(trim($_POST['timerFont'])) ? $timerFont = trim($_POST['timerFont']) : $timerFont = null;
  trim($_POST['displayTimer']) == '0' || ! empty(trim($_POST['displayTimer'])) ? $displayTimer = trim($_POST['displayTimer']) : $displayTimer = null;
  isset($_SESSION['id_personnalisations']) && ! empty(trim($_SESSION['id_personnalisations'])) ? $id_personnalisations = trim($_SESSION['id_personnalisations']) : $id_personnalisations = null;
  // If all the inputs are default values, return " no modification " message
  if (strtoupper($mainFontColor) == '#000000' && strtoupper($secondaryFontColor) == '#FFFFFF' && strtoupper($mainBackgroundColor) == '#E8DCD8' && strtoupper($secondaryBackgroundColor) == '#C1C1C1' && strtoupper($headerBackgroundColor) == '#463730' && strtoupper($statsBackgroundColor) == '#BF6B44') {
    if ($mainFont == 1 && $timerFont == 3 && $displayTimer == 1){
      $udpateConfirmationMessage = 'Aucune modification enregistrée';
      $udpateConfirmation = true;
      return;
    }
  }
  // If the user is connected
  if ($id_personnalisations != null){
    // Put all colors in an associative array to simplier validate them
    $colors = ['mainFontColor'=>$mainFontColor, 'secondaryFontColor'=>$secondaryFontColor, 'mainBackgroundColor'=>$mainBackgroundColor, 'secondaryBackgroundColor'=>$secondaryBackgroundColor, 'headerBackgroundColor'=>$headerBackgroundColor, 'statsBackgroundColor'=>$statsBackgroundColor];
    // If all inputs are collected
    if (! in_array(null, $colors) && $mainFont != null && $timerFont != null && $displayTimer != null){
      require 'validateAllPersonnalisationsInputs_ctrl.php';
      // Sanitize and validate all values
      $cleanedPersonnalisationsInputs = validateAllPersonnalisationsInputs($colors, $mainFont, $timerFont, $displayTimer, $id_personnalisations);
      if ($cleanedPersonnalisationsInputs != false){
        // Reset variables to get the validated ones in the same variables
        $colors = null; $mainFont = null; $timerFont = null; $displayTimer = null; $id_personnalisations = null;
        // Put the values from the array in the correct variable
        foreach ($cleanedPersonnalisationsInputs as $name => $value){
          ${$name} = $value;
        }
        // Reset colors to get the validated ones in the same variables
        $mainFontColor = null; $secondaryFontColor = null;
        $mainBackgroundColor = null; $secondaryBackgroundColor = null;
        $headerBackgroundColor = null; $statsBackgroundColor = null;
        // Do the same for the colors array
        foreach ($colors as $name => $value){
          ${$name} = $value;
        }
        // Available variables from here //
        // $mainFontColor - $secondaryFontColor - $mainBackgroundColor - $secondaryBackgroundColor - $headerBackgroundColor - $statsBackgroundColor - $mainFont - $timerFont - $displayTimer - $id_personnalisations
        require '../model/updatePersonnalisations_mod.php';
        // Put all the values in the database
        [$stmtStatus, $stmt, $lastId] = updatePersonnalisations($mainFontColor, $secondaryFontColor, $mainBackgroundColor, $secondaryBackgroundColor, $headerBackgroundColor, $statsBackgroundColor, $mainFont, $timerFont, $displayTimer, $id_personnalisations);
        $userStmtStatus = null;
        // If the id in the personnalisations table is new, update it in the user table
        if ($lastId != '0'){
          $avatar_url = null;
          ! empty(trim($_SESSION['avatar_url'])) ? $avatar_url = trim($_SESSION['avatar_url']) : $avatar_url = null;
          if ($avatar_url != null){
            require '../model/updateUserPersonnalisationID_mod.php';
            $userStmtStatus = updateUserPersonnalisationID($lastId, $avatar_url);
          } else {
            $updateErrorMessage = 'Vous n\'êtes pas connecté(e) !';
            $updateError = true;
          }
        } else {
          $userStmtStatus = true;
        }
        // If all updates in the database went well
        if ($stmtStatus && $userStmtStatus){
          // Display confirmation message
          $udpateConfirmationMessage = 'Vos modifications ont bien été enregistré !<br>Veuillez vous reconnecter pour les mettre en application';
          $udpateConfirmation = true;
          // Log off the user to make it reload it's informations
          signOff();
          // Redirect to the log in page
          header('refresh:2;url=login.php');
        } else {
          $updateErrorMessage = 'Une erreur a été rencontré avec la base de donnée<br>Veuillez réessayer plus tard';
          $updateError = true;
          return;
        }
      } else {
        $updateErrorMessage = 'Un des champs est incorrect, veuillez réessayer';
        $updateError = true;
        return;
      }
    } else {
      $updateErrorMessage = 'Un des champs est incorrect, veuillez réessayer';
      $updateError = true;
      return;
    }
  } else {
    $updateErrorMessage = 'Vous n\'êtes pas connecté(e) !';
    $updateError = true;
  }
} ?>
