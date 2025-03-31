<?php session_start(); ?>
<?php require 'includes/header.php' ?>

<main>
  <?php require 'includes/database.php' ?>
  <?php

$sql=$pdo->prepare('select * from customer where login=? and password=?');
$sql->execute([$_REQUEST['login'],$_REQUEST['password']]);
foreach ($sql as $row){
  $_SESSION['customer']=[
    'id'=>$row['id'],'name'=>$row['name'],
    'kana'=>$row['kana'],'post_code'=>$row['post_code'],
    'address'=>$row['address'],'mail'=>$row['mail'],
    'password'=>$row['password']
  ];
}

  if(isset($_SESSION['customer'])){
    echo '<p class="guest_name_area">ようこそ&#12288;';
    echo $_SESSION['customer']['name'];
    echo '様</p>';
  }
  // else{
  //   echo '<p>ログイン名またはパスワードが違います。</p>'
  // }

  
  ?>
  

  <div class="login_now">
    <p>ログイン完了</p>
  </div>

 <div id="login_area">
  <p>ログインが完了しました。</p>
 </div>

 <p class="top_page_return">
  <a href="index.php">topページへ戻る</a>
</p>

</main>


<?php require 'includes/footer.php' ?>