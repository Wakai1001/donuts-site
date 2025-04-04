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

<?php
// .phpの前の部分を取得
 $page=pathinfo($_SERVER['PHP_SELF']);

//  各ページのCSSを読み込ませる
echo '<link rel="stylesheet" href="common/css/';
echo $page['filename'],'.css';
echo '">';

// サイト名を変数に代入
$title='c.c.donuts';

// ページごとにタイトルを変更させる
switch($page["filename"]){
  case 'product' :
    $title= '商品一覧ページ&#65372;'.$title;
  break;
  case 'detail' :
    $title= '商品詳細ページ&#65372;'.$title;
  break;
  case 'login-input' :
    $title= 'ログイン-入力ページ&#65372;'.$title;
  break;
  case 'login-complete' :
    $title= 'ログイン-完了ページ&#65372;'.$title;
  break;
  case 'logout-input' :
    $title= 'ログアウト-入力ページ&#65372;'.$title;
  break;
  case 'logout-complete' :
    $title= 'ログアウト-完了ページ&#65372;'.$title;
  break;
  case 'customer-input' :
    $title= '会員登録-入力ページ&#65372;'.$title;
  break;
  case 'customer-confirm' :
    $title= '会員登録-入力確認ページ&#65372;'.$title;
  break;
  case 'customer-complete' :
    $title= '会員登録-完了ページ&#65372;'.$title;
  break;
  case 'cart' :
    $title= 'カート-商品一覧ページ&#65372;'.$title;
  break;
  case 'cart-show' :
    $title= 'カート-商品一覧呼び出しページ&#65372;'.$title;
  break;
  case 'cart-input' :
    $title= 'カート-追加ページ&#65372;'.$title;
  break;
  case 'cart-delete' :
    $title= 'カート-削除ページ&#65372;'.$title;
  break;
  case 'card-input' :
    $title= 'クレジットカード情報-入力ページ&#65372;'.$title;
  break;
  case 'card-confirm' :
    $title= 'クレジットカード情報-入力確認ページ&#65372;'.$title;
  break;
  case 'card-complete' :
    $title= 'クレジットカード情報-完了ページ&#65372;'.$title;
  break;
  case 'purchase-confirm' :
    $title= '購入-確認ページ&#65372;'.$title;
  break;
  case 'purchase-complete' :
    $title= '購入-完了ページ&#65372;'.$title;
  break;
  default:
  $title;
  break;
}

echo '<title>';
echo $title;
echo '</title>';

?>
  
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
          <div class="drawer_design">

            <div class="drawer_inner_design">
              <a href="index.php" class="drawer_logo">
                <img src="common/images/logo.svg" alt="ロゴ画像">
              </a>
              <button class="drawer_close_button">
                <img src="common/images/close-btn.png" alt="閉じるボタン">
              </button>
            </div>

            <ul class="nav_menu">
              <li><a href="index.php">top</a></li>
              <li><a href="">商品一覧</a></li>
              <li><a href="">よくある質問</a></li>
              <li><a href="">問い合わせ</a></li>
              <li><a href="">当サイトのポリシー</a></li>
            </ul>
          </div>

      </nav>

      <h1>
        <a href="index.php"><img src="common/images/logo.svg" alt="ロゴ画像"></a>
      </h1>
      
      <?php if(isset($_SESSION['customer'])): ?>
      <div class="login_nav" id="login_after">
        <a href="logout-input.php"><img src="common/images/login-icon.png" alt="ログアウト画像"><p>ログアウト</p></a>
        <a href="cart.php"><img src="common/images/cart-icon.png" alt="カート画像"><p>カート</p></a>
      </div>
      <?php else: ?>
      <div class="login_nav" id="login_before">
        <a href="login-input.php"><img src="common/images/login-icon.png" alt="ログイン画像"><p>ログイン</p></a>
        <a href="cart.php"><img src="common/images/cart-icon.png" alt="カート画像"><p>カート</p></a>
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