<?php require 'includes/header.php'; ?>

<?php
echo '<main>';
echo '<h2>カード情報登録</h2>';
echo '<form method="post" action="card-confirm.php">';
echo '<div class=card_item><p class="title">お名前<span class="require">(必須)</span></p>';
echo '<input type="text" name="card_name"></div>';
echo '<div class=card_item><p class=title>カード会社<span class="require">(必須)</span></p>';
echo '<label><input type="radio" name="card_type" value="JCB">JCB</label>';
echo '<label><input type="radio" name="card_type" value="Visa">Visa</label>';
echo '<label><input type="radio" name="card_type" value="Mastercard">Mastercard</label></div>';
    
echo '<div class=card_item><p class="title">カード番号<span class="require">(必須)</span></p>';
echo '<input type="text"name="card_no" minlength="14" maxlength="16"></div>';

echo '<div class=card_item><p class=title>有効期限<span class="require">(必須)</span></p>';
echo '<p><input type="number" name="card_month" min="1" max="12">月</p>';
echo '<p><input type="number" name="card_year">年</div></p>';
echo '<div class=card_item><p class="title">セキュリティコード<span class="require">(必須)</span></p>';
echo '<input type="password" name="card_security_code" minlength="3" maxlength="4"></div>';
echo '<div class=button><input type="submit" value="ご入力内容を確認する"></div>';
echo '</form>';
echo '</main>';
?>
<?php require 'includes/footer.php' ?>