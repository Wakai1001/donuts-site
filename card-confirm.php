<?php require 'includes/header.php'; ?>
<?php

// 変数定義
$cardName=htmlspecialchars($_REQUEST['card_name']);
$cardType=$_REQUEST['card_type'];
$cardNo=htmlspecialchars($_REQUEST['card_no']);
$cardMonth=htmlspecialchars($_REQUEST['card_month']);
$cardYear=htmlspecialchars($_REQUEST['card_year']);
$cardSecurityCode=htmlspecialchars($_REQUEST['card_security_code']);

echo '<main>';
echo '<h2>ご入力内容の確認</h2>';
echo '<form method="post" action="card-complete.php">';
echo '<div><p class=title>お名前</p>';
echo '<input type="text" class="confirm" name="card_name" value="',$cardName,'" readonly></div>';
echo '<div><p class=title>カード会社</p>';
echo '<input type="text" class="confirm" name="card_type" value="',$cardType,'" readonly></div>';
echo '<div><p class=title>カード番号</p>';
echo '<input type="text" class="confirm" name="card_no" value="',$cardNo,'" readonly></div>';
echo '<div><p class=title>有効期限</p>';
echo '<div class="expiry">';
echo '<input type="text" class="confirm" name="card_month" value="',$cardMonth,'" readonly>';
echo '<p>/</p><input type="text" class="confirm" name="card_year" value="',$cardYear,'" readonly></div></div>';
echo '<div><p class=title>セキュリティコード</p>';
echo '<input type="password" class="confirm" name="card_security_code" value="',$cardSecurityCode,'" readonly></div>';
echo '<input type="submit" value="この内容で登録する"></form>';
echo '<p class=back><a href=card-input.php>戻る</a></p>';
echo '</main>';
?>
<?php require 'includes/footer.php'; ?>
