<?php require 'includes/header.php'; ?>
<?php

// 変数定義
$name=htmlspecialchars($_REQUEST['name']);
$kana=htmlspecialchars($_REQUEST['kana']);
$postCode=htmlspecialchars($_REQUEST['post_code']);
$address=htmlspecialchars($_REQUEST['address']);
$mail=htmlspecialchars($_REQUEST['mail']);
$password=htmlspecialchars($_REQUEST['password']);

// 表示内容
echo '<main>';
echo '<h2>ご入力内容の確認</h2>'; 
echo '<form action="customer-complete.php" method="post">';
echo '<div class=name>';
echo '<p class=title>お名前</p>';
echo '<input type="text" class=confirm name="name" value="',$name,'" readonly></div>';
echo '<div class=kana>';
echo '<p class=title >お名前（フリガナ）</p>';
if(preg_match('/^[ァ-ヶー]+$/u',$kana)){
echo '<input type="text" class=confirm name="kana" value="',$kana,'" readonly></p></div>';
}else{
  echo '<p class=confirm>',$kana,'</p>';
  echo '<p class=error>※全角カタカナで入力してください。</p></div>';
}
echo '<div class=post_code>';
echo '<p class=title>郵便番号</p>';
if(preg_match('/^[0-9]{7}$/',$postCode)){
echo '<input type="text" class=confirm name="post_code" value="',$postCode,'" readonly></div>';
}else{
  echo '<p class=confirm>',$postCode,'</p>';
  echo '<p class=error>※[0～9]の数字を7桁で入力してください。</p></div>';
}
echo '<div class=address>';
echo '<p class=title>住所</p>';
echo '<input type="text" class=confirm name="address" value="',$address,'" readonly></div>';
echo '<div class=mail>';
echo '<p class=title>メールアドレス</p>';
echo '<input type="text" class=confirm name="mail" value="',$mail,'" readonly></div>';
echo '<div class=kana>';
echo '<p class=title>パスワード</p>';
if(preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{8,}$/',$password)){
  echo '<input type="text" class=confirm name="password" value="',$password,'" readonly></p></div>';
}else{  
  echo '<p class=confirm>',$password,'</p>';
  echo '<p class=error>※A-Z、a-z、0-9を少なくとも各1つは含めて8文字以上で入力してください。<p></div>';
}

echo '<input type="submit" value="この内容で登録する"></form>';
echo '<p class=back><a href=customer-input.php>戻る</a></p>';
echo '</main>';
?>

<?php require 'includes/footer.php'; ?>