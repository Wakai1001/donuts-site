<?php
session_start(); 
require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>
<?php
echo '<main>';

if(isset($_SESSION['customer'])){
$sql=$pdo->prepare('insert into card values(?,?,?,?,?,?,?)');
$sql->execute([
  $_SESSION['customer']['id'],$_REQUEST['card_name'],$_REQUEST['card_type'],$_REQUEST['card_no'],
  $_REQUEST['card_month'],$_REQUEST['card_year'],$_REQUEST['card_security_code']]);
  echo '<h2>カード情報登録完了</h2>';
  echo '<div class=box><p class=complete>クレジットカード情報を登録しました。</p>';
  echo '<p class=purchase><a href="purchase-confirm">購入手続きを続ける</a><p></div>';
}else{
   echo '<h2>カード情報登録</h2>';
  echo '<div class=box>';
  echo '<p class=error>クレジットカード情報が登録できませんでした。</p>';
  echo '<p class=back><a href=card-input.php>戻る</a></p></div>';
}
echo '</main>';
?>
<?php require 'includes/footer.php'; ?>