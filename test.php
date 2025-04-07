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