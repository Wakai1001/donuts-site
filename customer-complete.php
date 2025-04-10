<?php require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>
<?php
echo '<main>';

// 同じメールアドレスの登録がないか確認
  $sql=$pdo->prepare('select*from customer where mail=?');
  $sql->execute([$_REQUEST['mail']]);

  // 同じメールアドレスの登録がなかった場合
if(empty($sql->fetchAll())){
    $sql=$pdo->prepare('insert into customer values(null,?,?,?,?,?,?)');
$sql->execute([
  $_REQUEST['name'],$_REQUEST['kana'],$_REQUEST['post_code'],
  $_REQUEST['address'],$_REQUEST['mail'],$_REQUEST['password']]);
  echo '<h2>会員登録完了</h2>';
  echo '<div class=box><p class=complete>会員登録が完了しました。</p>';
  echo '<p class=login><a href="login-input.php">ログイン画面へ進む</a><p></div>';
  // 同じメールアドレスの登録がある場合
}else{
  echo '<h2>会員登録</h2>';
  echo '<div class=box><p class=error>このメールアドレスは<br>既に会員登録されています。</p>';
  echo '<p class=login><a href="login-input.php">ログイン画面へ進む</a><p></div>';
}
echo '</main>';
?>
<?php require 'includes/footer.php'; ?>