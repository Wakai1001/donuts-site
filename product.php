<?php 
  session_start(); 
  require 'includes/database.php';
  require 'includes/header.php';
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

<!-- パンくずリスト -->
    <p class="product_list">
      <a href="index.php">TOP</a>＞商品一覧
    </p>

    <!-- ユーザー名 -->
    <?php if(isset($_SESSION['customer'])): ?>
      <p class="guest_name_area">ようこそ&#12288; <?= htmlspecialchars($_SESSION['customer']['name']) ?> 様</p>
    <?php else: ?>
      <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>
    <?php endif; ?>


    <main>
    <!--     商品一覧     -->
    <section>
      <h2>商品一覧</h2>
      <div class="container_wrapper">
        <div class="product_container">

          <a href="detail.php?id=1">

            <img src="common/images/donuts1.jpg" alt="" class="donuts_image">

            <p class="list_text">CCドーナツ 当店オリジナル（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,500</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
          <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts1['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts1['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts1['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->

</div>

        <div class="product_container">
          <a href="detail.php?id=2">

            <img src="common/images/donuts2.jpg" alt="" class="donuts_image">
            <p class="list_text">チョコレートデライト（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,600</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
   <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts2['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts2['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts2['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->

  </div>

        <div class="product_container">
          <a href="detail.php?id=3">

            <img src="common/images/donuts3.jpg" alt="" class="donuts_image">
            <p class="list_text">キャラメルクリーム（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,600</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          
<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts3['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts3['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts3['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->

        </div>

        <div class="product_container">
          <a href="detail.php?id=4">

            <img src="common/images/donuts4.jpg" alt="" class="donuts_image">
            <p class="list_text">プレーンクラシック（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,500</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts4['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts4['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts4['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->
        </div>

  <div class="product_container">
     <a href="detail.php?id=5">

      <img src="common/images/donuts5.jpg" alt="" class="donuts_image">
            <p class="list_text">【新作】サマーシトラス（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,600</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts5['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts5['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts5['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->
        </div>

        <div class="product_container">
          <a href="detail.php?id=6">

            <img src="common/images/donuts6.jpg" alt="" class="donuts_image">
            <p class="list_text">ストロベリークラッシュ（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,800</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts6['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts6['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts6['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->

        </div>
      </div>
    </section>

    <!--     バラエティセット     -->
    <section>
      <h3>バラエティセット</h3>
      <div class="container_wrapper">
        <div class="product_container">
          <a href="detail.php?id=7">

            <img src="common/images/donuts7.jpg" alt="" class="donuts_image">

            <p class="list_text">フルーツドーナツセット（12個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥3,500</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts7['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts7['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts7['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->
        </div>

        <div class="product_container">
          <a href="detail.php?id=8">

            <img src="common/images/donuts8.jpg" alt="" class="donuts_image">
            <p class="list_text">フルーツドーナツセット（14個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥4,000</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts8['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts8['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts8['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->
        </div>

        <div class="product_container">
          <a href="detail.php?id=9">

            <img src="common/images/donuts9.jpg" alt="" class="donuts_image">

            <p class="list_text">ベストセレクションボックス（4個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,200</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts9['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts9['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts9['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->
        </div>

        <div class="product_container">
          <a href="detail.php?id=10">

            <img src="common/images/donuts10.jpg" alt="" class="donuts_image">
            <p class="list_text">クラッシュボックス（7個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥2,400</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts10['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts10['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts10['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->
        </div>

        <div class="product_container">
          <a href="detail.php?id=11">

            <img src="common/images/donuts11.jpg" alt="" class="donuts_image">
            <p class="list_text">クリームボックス（4個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,400</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts11['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts11['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts11['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->
        </div>

        <div class="product_container">
          <a href="detail.php?id=12">
          
            <img src="common/images/donuts12.jpg" alt="" class="donuts_image">
            <p class="list_text">クリームボックス（9個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥2,800</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>

<!-- カートに入れる -->
  <form action="cart-input.php" method="post" class="submit_btn">

<input type="hidden" name="product_id" value="<?= $donuts12['id'] ?>">
<input type="hidden" name="name" value="<?= htmlspecialchars($donuts12['name'], ENT_QUOTES, "UTF-8") ?>">
<input type="hidden" name="price" value="<?= floatval($donuts12['price']) ?>">
<input type="hidden" name="count" value="1">
<input type="submit" class="cart_btn" value="カートに入れる"></form>
 <!-- ここまでが、カートに入れる -->
        </div>
      </div>

    </section>
  </main>
<?php require 'includes/footer.php' ?>