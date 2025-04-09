<?php session_start(); ?>
<?php require 'includes/header.php' ?>
<?php require 'includes/database.php'; ?>
<?php
$sql=$pdo->prepare('select*from product where id=?');
$sql->execute([$_REQUEST['id']]);
$product = $sql->fetch();
echo '<div class=bnav>';
echo '<p><a href="index.php">TOP</a>&gt;<a href="product.php">商品一覧</a>&gt;',$product['name'],'</p></div>';
?>
<?php if(isset($_SESSION['customer'])): ?>
  <p class="guest_name_area">ようこそ&#12288; <?= htmlspecialchars($_SESSION['customer']['name']) ?> 様</p>
<?php else: ?>
  <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>
<?php endif; ?>
<?php
echo '<main>';  
echo '<form action="cart-input.php" method="post" class="in_cart">';
echo '<div class=product_box><p class=product_img><img alt="image" src="common/images/donuts',$product['id'],'.jpg"></p>';
echo '<div class=right_box><p class=product_name>',$product['name'],'</p>';
echo '<p class=product_descriotion>',$product['description'],'</p>';
echo '<div class=price_box><p class=product_price>税込　￥',number_format($product['price']),'</p>';
echo '<p class=favorite><img alt="お気に入り" src="common/images/favorite.png"></p></div>';
echo '<div class=cart_box><p class=number><input type="text" name="count" value="1"><span class=count>個</span></p>';
  
echo '<input type="hidden" name="product_id" value="',$product['id'] ,'">';
echo '<input type="hidden" name="name" value="',htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'),'">';
echo '<input type="hidden" name="price" value="',floatval($product['price']),'">';
echo '<input type="submit" value="カートに入れる">';
echo '</div></form></main>';
?>
<?php require 'includes/footer.php' ?>