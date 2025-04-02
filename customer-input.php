<?php require 'includes/header.php'; ?>

<?php
echo '<main>';
echo '<h2>会員登録</h2>';
echo '<form action="customer-confirm.php"method="post">';
echo '<table>';
echo '<tr><td class=title>お名前<span class=caution>（必須）</span></td><td>';
echo '<input type="text" name="name">';
echo '</td></tr>';
echo '<tr><td class=title>お名前（フリガナ）<span class=caution>（必須）</span></td><td>';
echo '<input type="text" name="kana">';
echo '</td></tr>';
echo '<tr><td class=title>郵便番号<span class=caution>（必須）</span></td><td>';
echo '<input type="text" name="post_code">';
echo '</td></tr>';
echo '<tr><td class=title>住所<span class=caution>（必須）</span></td><td>';
echo '<input type="text" name="address">';
echo '</td></tr>';
echo '<tr><td class=title>メールアドレス<span class=caution>（必須）</span></td><td>';
echo '<input type="text" name="mail">';
echo '</td></tr>';
echo '<tr><td class=title>パスワード<span class=caution>（必須）</span><br>';
echo '<p class=match>A-Z、a-z、0-9を少なくとも各1つは含めて8文字以上で入力してください。</p></td><td>';
echo '<input type="password" name="password">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="ご入力内容を確認する">';
echo '</form>';
echo '</main>';
?>


<?php require 'includes/footer.php'; ?>