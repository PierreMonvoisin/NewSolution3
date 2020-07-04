<?php $error = ['code'=>400, 'message'=>'Bad Request'] ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php require 'errorHeader.php'; ?>
<body class="bg-silver container-fluid">
  <div class="row text-center">
    <h1 id="mainTitle"><?= $error['code'] ?> - <?= $error['message'] ?></h1>
  </div>

<?php require 'errorFooter.php'; ?>
</body>
</html>
