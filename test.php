<?php require 'includes/header.php';?>

<!-- 商品一覧に飛ぶ -->
<?php require 'includes/database.php'; ?>
<?php 
$sql=$pdo->query('select*from product');
foreach($sql as $row){
  $id=$row['id'];
echo '<div class=><a href="detail.php?id=',$id,'">';
echo '<img src="common/images/donuts',$row['id'],'.jpg" class=donuts_image>';
echo '<p class=list_text>',$row['name'],'</p>';
echo '<div class="price_container">';
echo '<p class="list_price">税込　￥',number_format($row['price']),'</p>';
echo '<img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark">';
echo '</a></div>';

}
?>

<!-- index.php --> 
 <?php
$product = [
            'id' => 1,
            'name' => 'CCドーナツ 当店オリジナル (5個入り)',
            'price' => 1500
 ?>
<?php
// 18～20行目　サマーシトラスドーナツ
echo '<a href="detail.php?id=5">';
echo '<img src="common/images/donuts5.jpg" class="image-content1" alt="サマーシトラスドーナツ">';
echo '<img src="common/images/new-products-icon.png" alt="新商品のシール" class="new-products-icon">';
echo '<p class="content_text">サマーシトラス</p></a>';

// 53～75行目　ｃｃドーナツ
echo '<a href="detail.php?id=1">';
echo '<img src="common/images/donuts1.jpg" alt="CCドーナツ" class="donuts_image">';
echo '<p class="list_text">CCドーナツ 当店オリジナル (5個入り)</p></a>';
echo '<div class="price_container">';
echo '<p class="list_price">税込　¥1,500</p>';
echo '<img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark"></div>';
        

       
        <form action="cart-input.php" method="post" class="in_cart">
          <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
          // ENT_QUOTES → シングルクォート（'）とダブルクォート（"）もエスケープしてXSS対策 -->
          // UTF-8 → 文字化けや誤動作を防ぐためにエンコーディングを明示 -->
          <input type="hidden" name="name" value="<?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>">
          <input type="hidden" name="price" value="<?= floatval($product['price']) ?>">
          <input type="hidden" name="count" value="1">
          <input type="submit" value="カートに入れる">
        </form>

      ?>