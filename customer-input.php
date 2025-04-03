<?php require 'includes/header.php'; ?>

<?php
echo '<main>';
echo '<h2>会員登録</h2>';
echo '<form action="customer-confirm.php"method="post">';
echo '<p class=title>お名前<span class=require>（必須）</span></p>';
echo '<input type="text" name="name">';
echo '<p class=title>お名前（フリガナ）<span class=require>（必須）</span></p>';
echo '<input type="text" name="kana">';
echo '<p class=title>郵便番号<span class=require>（必須）</span></p>';
echo '<input type="text" name="post_code">';
echo '<p class=title>住所<span class=require>（必須）</span></p>';
echo '<input type="text" name="address">';
echo '<p class=title>メールアドレス<span class=require>（必須）</span></p>';
echo '<input type="text" name="mail">';
echo '<p class=title>パスワード<span class=require>（必須）</span></p>';
echo '<p class=match>A-Z、a-z、0-9を少なくとも各1つは含めて8文字以上で入力してください。</p>';
echo '<input type="password" name="password">';
echo '<input type="submit" value="ご入力内容を確認する">';
echo '</form>';
echo '</main>';
?>


<?php require 'includes/footer.php'; ?>