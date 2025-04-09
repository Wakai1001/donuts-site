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
$donuts1 =[
  'id' => 1,
  'name' => 'CCドーナツ 当店オリジナル (5個入り)',
  'price' => 1500
];

$donuts2 =[
  'id' => 2,
  'name' => 'チョコレートデライト（5個入り）',
  'price' => 1600
];

$donuts3 =[
  'id' => 3,
  'name' => 'キャラメルクリーム（5個入り）',
  'price' => 1600
];

$donuts4 =[
  'id' => 4,
  'name' => 'プレーンクラシック（5個入り）',
  'price' => 1500
];

$donuts5 =[
  'id' => 5,
  'name' => '【新作】サマーシトラス（5個入り）',
  'price' => 1600
];

$donuts6 =[
  'id' => 6,
  'name' => 'ストロベリークラッシュ（5個入り）',
  'price' => 1800
];

$donuts7 =[
  'id' => 7,
  'name' => 'フルーツドーナツセット（12個入り）',
  'price' => 3500
];

$donuts8 =[
  'id' => 8,
  'name' => 'フルーツドーナツセット（14個入り）',
  'price' => 4000
];

$donuts9 =[
  'id' => 9,
  'name' => 'ベストセレクションボックス（4個入り）',
  'price' => 1200
];

$donuts10 =[
  'id' => 10,
  'name' => 'チョコクラッシュボックス（7個入り）',
  'price' => 2400
];

$donuts11 =[
  'id' => 11,
  'name' => 'クリームボックス（4個入り））',
  'price' => 1400
];

$donuts12 =[
  'id' => 12,
  'name' => 'クリームボックス（9個入り）',
  'price' => 2800
];


?>



<!-- // 18～20行目　サマーシトラスドーナツ -->
<a href="detail.php?id=5">
<img src="common/images/donuts5.jpg" class="image-content1" alt="サマーシトラスドーナツ">
<img src="common/images/new-products-icon.png" alt="新商品のシール" class="new-products-icon">
<p class="content_text">サマーシトラス</p></a>


<!-- // 53～75行目　1位　ｃｃドーナツ -->
<a href="detail.php?id=1">
<img src="common/images/donuts1.jpg" alt="CCドーナツ" class="donuts_image">
<p class="list_text">CCドーナツ 当店オリジナル (5個入り)</p></a>
<div class="price_container">
<p class="list_price">税込　¥1,500</p>
<img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark"></div>
             
<form action="cart-input.php" method="post" class="in_cart">
<input type="hidden" name="product_id" value="<?= $donuts1['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts1['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts1['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" value="カートに入れる"></form>
