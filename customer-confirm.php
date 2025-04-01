<?php require 'includes/header.php'; ?>
<?php require 'includes/databese.php'; ?>

<?php

echo '<h2>ご入力内容の確認</h2>'; 
echo '<div class=name>';
echo '<p class=title>お名前</p>';
echo '<p class=confirm>"',$name,'"</p></div>';
echo '<div class=kana>';
echo '<p class=title>お名前（フリガナ）</p>';
echo '<p class=confirm>"',$kana,'"</p></div>';

?>

<?php require 'includes/footer.php'; ?>