<?php 
session_start(); 
require 'includes/database.php';
$sql=


$total=0;
$subtotal=$product['price']*$purchase_detail['count'];





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
        <p class="price"><?= $product['price']?></p>
        <p class="count">数量&emsp;<?= $purchase_detail['count']?>個</p>
        <p class="delete"><a href="cart-delete.php">削除する</a></p>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="merchandise_area">
      <p>カートに商品がありません。</p>
    </div>
  <?php endif; ?>


  <img src="common/images/cc-donut.jpg" alt="CCドーナツイメージ" class="donuts_image">

  <p class="merchandise">CCドーナツ 当店オリジナル（5個入り）
  </p>
  <p >税込 ￥1,500</p>

  <p class="num">数量　1個</p>


  <div class="confirm_window">
    <p>ご注文合計：<span class="price">税込￥5,000</span></p>
    <input type="submit" value="ご購入確認へ進む" class="shopping_confirm">
  </div>

  <div>
    <input type="submit" value="買い物を続ける" class="continue">
  </div>
 
</main>

<?php require 'includes/footer.php' ?>