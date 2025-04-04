<?php 
session_start(); 
require 'includes/database.php';


//カートのデータを入れるための空の配列
$cartItems = [];


// ログインしているユーザーの場合
if (isset($_SESSION['user_id'])) {

  //ログインしているユーザーのIDをバインド変数に代入
    $customerId = $_SESSION['user_id'];

  // 商品番号、商品名、価格、購入個数を取得する  
  // 各テーブルを内部結合（INNER JOIN）してデータを統合する  
  // `purchase.customer_id` とプレースホルダー `:customerId` が一致するデータを取得する 
    $sql = "
        SELECT product.id, product.name, product.price, purchase_detail.count
        FROM purchase_detail
        INNER JOIN product ON purchase_detail.product_id = product.id
        INNER JOIN purchase ON purchase_detail.purchase_id = purchase.id
        WHERE purchase.customer_id = :customerId;
    ";
    
    // SQLのSELECT文をprepare()でデータベース側で解析・最適化し、PDOStatementオブジェクトとして変数に代入する
    $stmt = $pdo->prepare($sql);

    // プレスホルダー':customerId'に変数$customerIdの値をバインドする
    // purchase.customer_idは顧客番号は数値を想定しているので、データ型を PDO::PARAM_INT（整数）として指定する
    $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
    
    // 準備した $stmtを実行する
    $stmt->execute();

    // 実行したSQLの結果を fetchAll(PDO::FETCH_ASSOC) で取得し、カートのデータをカラム名をキーとする連想配列として $cartItems に代入する
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ログインしていないゲストユーザーの場合
} else {
    
    // カートに中身が入ってる場合
    if (!empty($_SESSION['cart'])) {

        // 配列 $_SESSION['cart'] の中身をループで取り出す
        // $productIdに商品番号、$itemに商品の名前、価格、個数を代入する
        foreach ($_SESSION['cart'] as $productId => $item) {
            $cartItems[] = [
                'id' => $productId,
                'name' => $item['name'],
                'price' => $item['price'],
                'count' => $item['count'],
            ];
        }
    }
}

//合計金額の初期化
$total = 0;

// 合計金額の計算
// カート内の商品をループで処理し、価格 × 個数を合計に加算する
foreach ($cartItems as $item) {
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