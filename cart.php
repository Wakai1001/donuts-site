<?php 
session_start(); 
require 'includes/database.php';

// ログインしている場合の処理
// if (isset($_SESSION['customer'])) {
//   $session_id = session_id();
   // 現在のセッションIDを取得


  // p→productテーブル、pd→purchase_detailテーブル、pur→purchaseテーブル
  // WHEREの後は現在のセッション ID と一致するか
//   $sql = "
//     SELECT p.id, p.name, p.price, p.description, pd.count
//     FROM purchase_detail pd
//     JOIN product p ON pd.product_id = p.id
//     JOIN purchase pur ON pd.purchase_id = pur.id
//     WHERE pur.session_id = :session_id
//     ";


// $total=0;

// }

// 商品IDを指定（仮にID 1の商品の場合）
$product_id = 1;

// 商品データをデータベースから取得
$sql = "SELECT id, name, price, description FROM product WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// もし商品が見つかったら、カートに追加する
if ($product) {
    // 仮に数量1でカートに追加
    $product['count'] = 1;
    
    // $_SESSION['product']に商品を追加（同じIDの商品があれば上書き）
    $_SESSION['product'][$product['id']] = $product;
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
        <p>ご注文合計：<span class="price">税込￥5,000</span></p>
        <input type="submit" value="ご購入確認へ進む" class="shopping_confirm">
      </div>

  <?php else: ?>
    <div class="merchandise_area">
      <p>カートに商品がありません。</p>
    </div>
  <?php endif; ?>

  

  <div>
    <input type="submit" value="買い物を続ける" class="continue">
  </div>
 
</main>

<?php require 'includes/footer.php' ?>