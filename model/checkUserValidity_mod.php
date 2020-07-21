<?php require_once '../share/forbiddenPages.php';
function checkUserValidity($mail){
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare(
      // Fetch the password assiociated to the mail
      'SELECT `id` FROM `5VAyPO6OaNusers` WHERE `mail` = :mail'
    );
    // Bind parameter to its value with type specification
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    // Execute query, return the status as we only want to check if the user exist
    return $stmt->execute();
    // If there is an exception, display it
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
} ?>
