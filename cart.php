<?php 
session_start(); 
require 'includes/database.php';

// 合計金額の初期化
$total = 0;
$cart_items = [];

if (isset($_SESSION['user_id'])) {
  //  ログインしているユーザーのIDを代入
    $user_id = $_SESSION['user_id'];

    $sql = "
        SELECT product.id, product.name, product.price, product.description, purchase_detail.count
        FROM purchase_detail
        JOIN product ON purchase_detail.product_id = product.id
        JOIN purchase ON purchase_detail.purchase_id = purchase.id
        WHERE purchase.user_id = :user_id;
    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // **ゲストユーザーの場合**
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $item) {
            $cart_items[] = [
                'id' => $product_id,
                'name' => $item['name'],
                'price' => $item['price'],
                'description' => $item['description'],
                'count' => $item['count'],
            ];
        }
    }
}

// **合計金額を計算**
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['count'];
}
require 'includes/header.php';
?>




<main>
  
  <p class="breadcrumbs">TOP &gt; カート</p>
  <hr>

  <?php if(isset($_SESSION['customer'])): ?>
  <p class="guest_name_area">ようこそ&#12288; <?= htmlspecialchars($_SESSION['customer']['name']) ?> 様</p>
  <hr>
  <?php else: ?>
  <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>
  <hr>
  <?php endif; ?>

  <?php if (!empty($_SESSION['product'])): ?>
    <?php foreach($_SESSION['product'] as $id=>$product): ?>
      <div class="merchandise_area">
        <img src="" alt="商品画像" class="merchandise_image">
        <p class=merchandise_name><?= $product['name']?></p>
        <p class="price">税込&#12288;&#165;<?= $product['price']?></p>
        <p class="count">数量&#12288;<?= $purchase_detail['count']?>個</p>
        <form action="cart-delete.php" method="post" class="delete"><a href="cart-delete.php">削除する</a></form>
      </div>
    <?php endforeach; ?>

    <div class="confirm_window">
        <p>ご注文合計：<span class="price">税込&#12288;￥<?= number_format($total) ?></span></p>
        <input type="submit" value="ご購入確認へ進む" class="shopping_confirm">
    </div>

  <?php else: ?>
    <div class="merchandise_area">
      <p>カートに商品がありません。</p>
    </div>
  <?php endif; ?>

  <form action="product.php" method="post" class="product_return">
    <input type="submit" value="買い物を続ける" class="continue">
  </form>
 
</main>

<?php require 'includes/footer.php' ?>