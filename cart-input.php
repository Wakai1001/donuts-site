<?php 
session_start(); 
require 'includes/header.php'
?>

<body>
  <p class="breadcrumbs"><a href="index.php">TOP</a> &gt; カート</p>

  <p class="cart_input">カートに商品を追加しました。
  </p>

  <img src="common/images/cc-donut.jpg" alt="CCドーナツイメージ" class="donuts_image">

  <p class="merchandise">CCドーナツ 当店オリジナル（5個入り）
  </p>
  <p class="price">税込 ￥1,500</p>

  <p class="num">数量　1個</p>

  <p class="delete">削除する</p>

  <img src="common/images/fruit-donuts-1.jpg" alt="フルーツドーナツイメージ" class="donuts_image">

<p class="merchandise">フルーツドーナツセット（12個入り）
</p>
<p class="price">税込 ￥3,500</p>

<p class="num">数量　1個</p>

<p class="delete">削除する</p>

  <div class="confirm_window">
    <p>ご注文合計：<span class="price">税込￥5,000</span></p>
    <input type="submit" value="ご購入確認へ進む" class="shopping_confirm">
  </div>

  <div>
    <input type="submit" value="買い物を続ける" class="continue">
  </div>

</body>

</html>



<?php require 'includes/footer.php' ?>