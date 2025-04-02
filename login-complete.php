<?php 
session_start(); 
unset($_SESSION['customer']);
require 'includes/database.php';
$sql=$pdo->prepare('select * from customer where mail=? and password=?');
$sql->execute([$_REQUEST['mail'],$_REQUEST['password']]);
foreach ($sql as $row){
  $_SESSION['customer']=[
    'id'=>$row['id'],'name'=>$row['name'],
    'kana'=>$row['kana'],'post_code'=>$row['post_code'],
    'address'=>$row['address'],'mail'=>$row['mail'],
    'password'=>$row['password']
  ];
}
require 'includes/header.php'
?>

<main>

<!-- 下記の＜?=は、＜?php echoの省略形です。 -->
 
<?php if(isset($_SESSION['customer'])): ?>
  <p class="guest_name_area">ようこそ&#12288; <?= htmlspecialchars($_SESSION['customer']['name']) ?> 様</p>
  <hr>
  <h2 class="login_now">ログイン完了</h2>
  <div id="login_area">
    <p>ログインが完了しました。</p>
  </div>
  <p class="top_page_return">
    <a href="index.php">topページへ戻る</a>
  </p>
<?php else: ?>
  <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>
  <h2 class="login_now">ログイン</h2>
  <div id="login_area">
    <p>ログイン名またはパスワードが違います。</p>
  </div>
  <p class="top_page_return">
    <a href="index.php">topページへ戻る</a>
   </p>
<?php endif; ?>

</main>


<?php require 'includes/footer.php' ?>