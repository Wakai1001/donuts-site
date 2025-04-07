<?php
session_start(); 
require 'includes/database.php';

// 商品IDを取得
$productId = $_POST['product_id'] ?? null;

// カートに商品がある場合のみ削除
if (isset($_SESSION['cart'][$productId])) {
    unset($_SESSION['cart'][$productId]); // 商品を削除
    $_SESSION['message'] = "カートから商品を削除しました。";
  }

// カートページへリダイレクト
header('Location: cart-show.php');
exit;

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

    <p class="shopping_btn"><a href="product.php">買い物を続ける</a></p>
  </main>


<?php require 'includes/footer.php';?>