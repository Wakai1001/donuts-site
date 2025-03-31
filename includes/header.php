<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="common/css/reset.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="common/css/common.css">
</head>
<body>


  <header>

    <div class="header_inner">
      <nav class="header_nav">
          <!-- ハンバーガーメニュー↓ -->
        <button id="hamburger_menu">
            <span class="nav_icon_top"></span>
            <span class="nav_icon_center"></span>
            <span class="nav_icon_bottom"></span>
         </button>
          <!-- ドロワーメニュー↓ -->
          <ul id="nav_menu">
            <li><a href="">top</a></li>
            <li><a href="">商品一覧</a></li>
            <li><a href="">よくある質問</a></li>
            <li><a href="">問い合わせ</a></li>
            <li><a href="">当サイトのポリシー</a></li>
          </ul>
      </nav>

      <h1>
        <img src="common/images/logo.svg" alt="ロゴ画像">
      </h1>
      
      <?php if(isset($_SESSION['user_id'])): ?>
      <div class="login_nav" id="login_after">
        <a href="logout-input.php"><img src="common/images/login-icon.png" alt=""><p>ログアウト</p></a>
        <a href="cart.php"><img src="common/images/cart-icon.png" alt=""><p>カート</p></a>
      </div>
      <?php else: ?>
      <div class="login_nav" id="login_before">
        <a href="login-input.php"><img src="common/images/login-icon.png" alt=""><p>ログイン</p></a>
        <a href="cart.php"><img src="common/images/cart-icon.png" alt=""><p>カート</p></a>
      </div>
      <?php endif; ?>
      
    </div>

    <div class="search_design">
      <form action="" method="post" id="search_area">
        <input type="text" name="search" class="search_keyword">
        <input type="submit" class="search_submit">
      </form>
    </div>

  </header>