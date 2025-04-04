<?php 
session_start(); 
require 'includes/database.php';


//データが送られてこなかったときにnullにする
$productId = $_POST['product_id'] ?? null;
$name = $_POST['name'] ?? null;
$price = $_POST['price'] ?? null;
$count = $_POST['count'] ?? 1; // デフォルトの値を 1 にする


  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // カートが未定義なら空の配列をセット
  }

  if (isset($_SESSION['cart'][$productId])) {
    // すでにカートにある場合、数量を増やす
    $_SESSION['cart'][$productId]['count'] += $count;
  } else {
  // カートにない場合、新しく追加
    $_SESSION['cart'][$productId] = [
       'name' => $name,
       'price' => $price,
       'count' => $count
   ];
}
// ログインしているユーザーの場合
if (isset($_SESSION['user_id'])) {

  //ログインしているユーザーのIDを変数に代入
  $customerId = $_SESSION['user_id'];

  // purchaseテーブルに購入情報を追加
  $stmt=$pdo->prepare("insert into purchase (customer_id) values (:customerId)");
  $stmt->execute(['customerId' => $customerId]);
  
  //購入番号を更新する
  $purchaseId = $pdo->lastInsertId();

  // purchase_detailテーブルに商品の詳細を追加
  foreach ($_SESSION['cart'] as $productId => $item) {
      $sql="insert into purchase_detail (purchase_id, product_id, count) values (:purchase_id, :product_id, :count)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        'purchase_id' => $purchaseId,
        'product_id' => $productId,
        'count' => $item['count']
      ]);
    }
    
  // カート情報をセッションから削除
  $_SESSION['cart'] = [];

} else {


}

// 購入画面に遷移する
// header('Location: cart.php'); 

// カートページへリダイレクト
// exit;

require 'includes/header.php';
?>


  <main>
    <p class="breadcrumbs"><a href="index.php">TOP</a> &gt; カート</p>
    <hr>

    <?php if(isset($_SESSION['customer'])): ?>
    <p class="guest_name_area">ようこそ&#12288; <?= htmlspecialchars($_SESSION['customer']['name']) ?> 様</p>
    <hr>
    <?php else: ?>
    <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>
    <hr>
    <?php endif; ?>

    <p class="cart_input">カートに商品を追加しました。</p>

    <?php if (!empty($_SESSION['cart'])): ?>

      <?php foreach($_SESSION['cart'] as $productId => $item): ?>
      <div class="merchandise_area">
        <img src="" alt="商品画像" class="merchandise_image">
        <p class="merchandise_name"><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></p>
        <p class="price">税込&#12288;&#165;<?= number_format($item['price']) ?></p>
        <p class="count">数量&#12288;<?= $item['count'] ?>個</p>
        <form action="cart-delete.php" method="post" class="delete">
          <input type="hidden" name="product_id" value="<?= $productId ?>">
          <input type="submit" value="削除する" class="delete_btn">
        </form>
      </div>
      <?php endforeach; ?>

 <?php 
  // カート内の商品合計金額を計算
  $total = 0;
  foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['count'];
  }
?>

      <div class="confirm_window">
        <p>ご注文合計：<span class="price">税込&nbsp;&#165;<?= number_format($total) ?></span></p>
        <input type="submit" value="ご購入確認へ進む" class="shopping_confirm">
      </div>

  <?php else: ?>
  <p>カートは空です。</p>
  <?php endif; ?>

  <p class="shopping_btn"><a href="product.php">買い物を続ける</a></p>

  </main>

<?php require 'includes/footer.php' ?>