<?php require_once '../share/forbiddenPages.php';
function resetPassword($mail, $password){
  $stmtStatus = null; $stmt = null;
  // Initiate connection to database
  require_once 'qUmgqQHW7Wconnection.php';
  $database = connectionToDatabase();
  try {
    // Declare request with paramaters
    $stmt = $database->prepare("UPDATE `5VAyPO6OaNusers` SET `password` = :password WHERE `mail` = :mail");
    // Bind all parameters to their value with type specification
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    // Execute query and get the return value in variable
    $stmtStatus = $stmt->execute();
  } catch (PDOException $e) {
    // If there is an exception, display it
    echo $e->getMessage();
  }
  // Return the statement return value
  return $stmtStatus;
} ?>
