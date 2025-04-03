<?php 

// セッションが開始されていなかったらセッションを開始する
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// セッションを空にする
$_SESSION = array();

// セッションを破棄する
session_destroy(); 

require 'includes/header.php'
?>

<main>

  <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>
  <hr>
  <h2 class="login_now">ログアウト完了</h2>
  <div id="login_area">
    <p>ログアウトが完了しました。</p>
  </div>
  <p class="top_page_return">
    <a href="index.php">topページへ戻る</a>
  </p>

</main>

  <?php require 'includes/footer.php' ?>