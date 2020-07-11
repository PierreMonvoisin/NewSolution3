<?php require_once '../share/forbiddenPages.php';
// Log out
function signOff(){
  // Empty out the session
  if (session_id() == '' || ! isset($_SESSION)) {
    // session isn't started
    session_start();
  }
  $_SESSION = [];
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', 1, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
  }
  session_destroy();
  session_write_close();
  // Delete the cookie for the avatar url by setting its expiration to 1 second after Jan 1 1970
  setcookie('avatarUrl', '', 1, '/');
  setcookie('personnalisationsStored', '', 1, '/');
}
if (isset($_POST['signOffConfirmation'])) {
  unset($_POST['signOffConfirmation']);
  signOff();
  // Redirect directly to the new user page
  header("Location: login.php");
} ?>
