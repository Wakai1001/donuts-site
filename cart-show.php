<?php
require 'cart.php'; 
require 'includes/header.php'
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

    <!-- メッセージの表示 -->
    <?php if (isset($_SESSION['message'])): ?>
    <p class="cart_message"><?= htmlspecialchars($_SESSION['message']) ?></p>
    <!-- メッセージ表示後は削除 -->
    <?php unset($_SESSION['message']);?>
  <?php endif; ?>

  <?php if (!empty($cartItems)): ?>

    <?php foreach ($cartItems as $item): ?>
      <div class="merchandise_area">
        <img src="common/images/donuts<?= htmlspecialchars($item['id']) ?>.jpg" alt="商品画像" class="merchandise_image">
        <p class="merchandise_name"><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></p>
        <p class="price">税込&nbsp;&#165;<?= number_format($item['price']) ?></p>
        <p class="count">数量&nbsp;<?= $item['count'] ?>個</p>
        <form action="cart-delete.php" method="post" class="delete">
          <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
          <input type="submit" value="削除する">
        </form>
      </div>
    <?php endforeach; ?>

    <div class="confirm_window">
        <p>ご注文合計：<span class="price">税込&#12288;&#165;<?= number_format($total) ?></span></p>


        <form action="purchase-confirm.php" method="post">
          <input type="submit" value="ご購入確認へ進む" class="shopping_confirm">
        </form>
    </div>

  <?php else: ?>
    
    <div class="merchandise_area">
      <p class="no_items">カートに商品がありません。</p>
    </div>
  
  <?php endif; ?>
 
  <p class="product_return">
    <a href="product.php" class="continue">買い物を続ける</a>
  </p>

</main>


<?php require 'includes/footer.php' ?>