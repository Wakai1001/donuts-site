  <?php 
  session_start(); 
  require 'includes/database.php';
  require 'includes/header.php';
  ?>

<main>

<?php if(isset($_SESSION['customer'])): ?>
  <p class="guest_name_area">ようこそ&#12288; <?= htmlspecialchars($_SESSION['customer']['name']) ?> 様</p>
<?php else: ?>
  <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>
<?php endif; ?>

  <img src="common/images/hero-sp.jpg" alt="main visual" class="hero_sp">
  <div class="content1">
    <div class="forseal_container">
      <img src=" common/images/summer-citrus.jpg" class="image-content1" alt="サマーシトラスドーナツ">
      <img src="common/images/new-products-icon.png" alt="新商品のシール" class="new-products-icon">
      <p class="content_text">サマーシトラス</p>
    </div>
    <div class="forlife_container">
      <img src="common/images/donut-life.jpg" class="image-content2" alt="ドーナツのある生活">
      <p class="content_text2">ドーナツのある生活</p>
    </div>
  </div>
    <div class="list_container">
     <img src="common/images/product-list.jpg" alt="商品一覧" class="product-list">
      <!-- <p class="list_text1">商品一覧</p> -->
    </div>
  
  <div class="philosophy_container">
  <picture>
          <source srcset="common/images/philosophy-bg-pc.jpg" media="(min-width:768px)" type="image/jpg">
          <img class="philosophy" src="common/images/philosophy-bg-sp.jpg" alt="philosophy">
  </picture>


    <!-- <img src="common/images/philosophy-bg-sp.jpg" alt="philosophy" class="philosophy"> -->
    <div class="philosophy_text_container">
      <h1 class="philosophy_text1">philosophy</h1>
      <p class="philosophy_text2">私たちの信念</p>
      <p class="philosophy_text3">"Creating Connections"</p>
      <p class="philosophy_text4">ドーナツでつながる</p>
    </div>
  </div>
  <section class="">
    <h2 >人気ランキング</h2>

    <div class="container-wrapper">
      <div class="rank_container">
        <div class="rank_number1">1</div>
        <img src="common/images/cc-donut.jpg" alt="CCドーナツ" class="donuts_image">
        <p class="list_text">CCドーナツ 当店オリジナル (5個入り)</p>
        <div class="price_container">
          <p class="list_price">税込　¥1,500</p>
          <img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark">
        </div>

        <?php
          $product = [
            'id' => 1,
            'name' => 'チョコドーナツ',
            'price' => 1500
          ];
        ?>
        <form action="cart-input.php" method="post" class="in_cart">
          <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
          <!-- ENT_QUOTES → シングルクォート（'）とダブルクォート（"）もエスケープしてXSS対策 -->
          <!-- UTF-8 → 文字化けや誤動作を防ぐためにエンコーディングを明示 -->
          <input type="hidden" name="name" value="<?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>">
          <input type="hidden" name="price" value="<?= $product['price'] ?>">
          <input type="hidden" name="count" value="1">
          <input type="submit" value="カートに入れる">
        </form>

      </div>

      <div class="rank_container2">
        <div class="rank_number2">2</div>
        <img src="common/images/fruit-donuts-1.jpg" alt="フルーツドーナツ(12個入り)" class="donuts_image">
        <p class="list_text">フルーツドーナツセット(12個入り)</p>
        <div class="price_container">
          <p class="list_price">税込　¥3,500</p>
          <img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark">
        </div>
        <div class="in_cart">カートに入れる</div>
      </div>
    </div>

    <div class="container-wrapper">
      <div class="rank_container">
        <div class="rank_number2">3</div>
        <img src="common/images/fruit-donuts-2.jpg" alt="フルーツドーナツ(14個入り)" class="donuts_image">
        <p class="list_text">フルーツドーナツセット(14個入り)</p>
        <div class="price_container">
          <p class="list_price">税込　¥4,000</p>
          <img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark">
        </div>
        <div class="in_cart">カートに入れる</div>
      </div>

      <div class="rank_container2">
        <div class="rank_number2">4</div>
        <img src="common/images/chocolate-delight.jpg" alt="チョコレートデライト(5個入り)" class="donuts_image">
        <p class="list_text">チョコレートデライト(5個入り)</p>
        <div class="price_container">
          <p class="list_price">税込　¥1,600</p>
          <img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark">
        </div>
        <div class="in_cart">カートに入れる</div>
      </div>
    </div>

    <div class="container-wrapper">
    <div class="rank_container">
      <div class="rank_number2">5</div>
      <img src="common/images/best-selection.jpg" alt="ベストセレクション(4個入り)" class="donuts_image">
      <p class="list_text">ベストセレクション(4個入り)</p>
      <div class="price_container">
        <p class="list_price">税込　¥1,200</p>
        <img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark">
      </div>
      <div class="in_cart">カートに入れる</div>
    </div>

    <div class="rank_container2">
      <div class="rank_number2">6</div>
      <img src="common/images/strawberry-crush.jpg" alt="ストロベリークラッシュ(5個入り)" class="donuts_image">
      <p class="list_text">ストロベリークラッシュ(5個入り)</p>
      <div class="price_container">
        <p class="list_price">税込　¥1,800</p>
        <img src="common/images/favorite.png" alt="ハートマーク" class="heart-mark">
      </div>
      <div class="in_cart">カートに入れる</div>
    </div>
  </div>
  </section>
</main>
  <?php require 'includes/footer.php'; ?>
