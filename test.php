<?php require 'includes/header.php';?>

<!-- 商品すべて表示 -->
<?php require 'includes/database.php'; ?>
<?php 
echo '<main>';
// $sql=$pdo->query('select*from product');
// foreach($sql as $row){
//   $id=$row['id'];
// echo '<div class=><a href="detail.php?id=',$id,'">';
// echo '<img src="common/images/donuts',$row['id'],'.jpg" class=donuts_image>';
// echo '<p class=list_text>',$row['name'],'</p>';
// echo '<div class="price_container">';
// echo '<p class="list_price">税込　￥',number_format($row['price']),'</p>';
// echo '<img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark"></div>';
// echo '</a></div>';

// }
?>

<!-- index.php --> 
 <!-- 変数定義 -->
<?php
$donuts1 =$pdo->query('select*from product limit 1')->fetch();

$donuts2 =$pdo->query('select*from product limit 2');

$donuts3 =$pdo->query('select*from product limit 3');

$donuts4 =$pdo->query('select*from product limit 4');

$donuts5 =$pdo->query('select*from product limit 5');

$donuts6 =$pdo->query('select*from product limit 6');

$donuts7 =$pdo->query('select*from product limit 7');

$donuts8 =$pdo->query('select*from product limit 8');

$donuts9 =$pdo->query('select*from product limit 9');

$donuts10 =$pdo->query('select*from product limit 10');

$donuts11 =$pdo->query('select*from product limit 11');

$donuts12 =$pdo->query('select*from product limit 12');
    
?>

<?php

// 18～20行目　サマーシトラスドーナツ
echo '<a href="detail.php?id=',$donuts5,'">';
echo 'aa';
echo '<img src="common/images/"donuts',$donuts5[1],'.jpg" class="image-content1" alt="サマーシトラスドーナツ">';
echo '<img src="common/images/new-products-icon.png" alt="新商品のシール" class="new-products-icon">';
echo '<p class="content_text">サマーシトラス</p></a>';


// 53～75行目　1位　ｃｃドーナツ
echo '<a href="detail.php?id="',$donuts1[1],'">';
echo '<img src="common/images/donuts',$donuts1[1],'.jpg" alt="CCドーナツ" class="donuts_image">';
echo '<p class="list_text">',$donuts1['2'],'</p></a>';
echo '<div class="price_container">';
echo '<p class="list_price">税込　¥',number_format($donuts1['3']),'</p>';
echo '<img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark"></div>';
             
echo '<form action="cart-input.php" method="post" class="in_cart">';
echo '<input type="hidden" name="product_id" value="<?=', $donuts1['id'],' ?>">';
// ENT_QUOTES → シングルクォート（'）とダブルクォート（"）もエスケープしてXSS対策
// UTF-8 → 文字化けや誤動作を防ぐためにエンコーディングを明示
echo '<input type="hidden" name="name" value="<?= htmlspecialchars(',$donuts1['name'],', ENT_QUOTES, "UTF-8") ?>">';
echo '<input type="hidden" name="price" value="<?= floatval(',$donuts1['price'],') ?>">';
echo '<input type="hidden" name="count" value="1">';
echo '<input type="submit" value="カートに入れる"></form>';

// 81～87行目　２位フルーツドーナツセット（12個）
echo '<a href="detail.php?id="',$donuts7['id'],'">';
echo '<img src="common/images/donuts',$donuts7['id'],'.jpg" alt="フルーツドーナツセット" class="donuts_image">';
echo '<p class="list_text">',$donuts1['name'],'</p></a>';
echo '<div class="price_container">';
echo '<p class="list_price">税込　¥',number_format($donuts1['price']),'</p>';
echo '<img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark"></div>';
             
echo '<form action="cart-input.php" method="post" class="in_cart">';
echo '<input type="hidden" name="product_id" value="<?=', $donuts1['id'],' ?>">';
echo '<input type="hidden" name="name" value="<?= htmlspecialchars(',$donuts1['name'],', ENT_QUOTES, "UTF-8") ?>">';
echo '<input type="hidden" name="price" value="<?= floatval(',$donuts1['price'],') ?>">';
echo '<input type="hidden" name="count" value="1">';
echo '<input type="submit" value="カートに入れる"></form>';


echo '</main>';
?>