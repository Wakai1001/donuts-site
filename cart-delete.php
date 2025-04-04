<?php
session_start(); 
require 'includes/database.php';




// 商品IDを取得
$productId = $_POST['product_id'] ?? null;

// ログインユーザーの場合、ユーザーごとのカートを操作
$userId = $_SESSION['user_id'] ?? null; // ログインしていない場合はnull

if ($userId) {
    // ユーザーごとのカート管理
    if (isset($_SESSION['user_cart'][$userId][$productId])) {
        unset($_SESSION['user_cart'][$userId][$productId]); // 商品を削除
    }
} else {
    // ゲストのカート管理
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]); // 商品を削除
    }
}

// 購入画面に遷移する
// header('Location: cart.php'); 

// カートページへリダイレクト
// exit;


require 'includes/header.php'
?>

  <main>
    <p class="breadcrumbs"><a href="index.php">TOP</a> &gt; カート</p>

    <?php if(isset($_SESSION['customer'])): ?>
    <p class="guest_name_area">ようこそ&#12288; <?= htmlspecialchars($_SESSION['customer']['name']) ?> 様</p>
    <hr>
    <?php else: ?>
    <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>
    <hr>
    <?php endif; ?>

    <p class="cart_input">カートから商品を削除しました。</p>


<!--     
    <img src="common/images/fruit-donuts-1.jpg" alt="フルーツドーナツimg" class="donuts_image">
    
    <p class="merchandise">フルーツドーナツセット（12個入り）
    </p>
    <p class="price">税込 ￥3,500</p>
    
    <p class="num">数量　1個</p>
    
    <p class="delete">削除する</p>
    <div class="confirm_window">
      <p>ご注文合計：<span class="price">税込￥5,000</span></p>
      <input type="submit" value="ご購入確認へ進む" class="shopping_confirm">
    </div> -->
    <p class="shopping_btn"><a href="product.php">買い物を続ける</a></p>
  </main>

<?php require 'includes/footer.php';?>