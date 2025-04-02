<?php require 'includes/header.php'; ?>
<?php require 'include/database.php'; ?>
<?php

// 同じメールアドレスの登録がないか確認
  $sql=$pdo->prepare('select*from customer where mail=?');
  $sql->execute([$_REQUEST['mail']]);


if(empty($sql->fetchAll())){
  if(isset($_SESSION['customer'])){
    $sql=$pdo->prepare()
  }
}
?>
<?php require 'includes/footer.php'; ?>