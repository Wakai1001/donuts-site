<?php 
  session_start(); 
  require 'includes/database.php';
  require 'includes/header.php';
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

          <a href="">
            <img src="common/images/cc-donut.jpg" alt="" class="donuts_image">

            <p class="list_text">CCドーナツ 当店オリジナル（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,500</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">
            <img src="common/images/chocolate-delight.jpg" alt="" class="donuts_image">
            <p class="list_text">チョコレートデライト（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,600</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">

            <img src="common/images/caramel-cream.jpg" alt="" class="donuts_image">
            <p class="list_text">キャラメルクリーム（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,600</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">

            <img src="common/images/plain-classic.jpg" alt="" class="donuts_image">
            <p class="list_text">プレーンクラシック（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,500</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">

            <img src="common/images/summer-citrus.jpg" alt="" class="donuts_image">
            <p class="list_text">【新作】サマーシトラス（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,600</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">

            <img src="common/images/strawberry-crush.jpg" alt="" class="donuts_image">
            <p class="list_text">ストロベリークラッシュ（5個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,800</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>
      </div>
    </section>

    <!--     バラエティセット     -->
    <section>
      <h3>バラエティセット</h3>
      <div class="container_wrapper">
        <div class="product_container">
          <a href="">

            <img src="common/images/fruit-donuts-1.jpg" alt="" class="donuts_image">

            <p class="list_text">フルーツドーナツセット（12個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥3,500</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">

            <img src="common/images/fruit-donuts-2.jpg" alt="" class="donuts_image">
            <p class="list_text">フルーツドーナツセット（14個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥4,000</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">

            <img src="common/images/best-selection.jpg" alt="" class="donuts_image">

            <p class="list_text">ベストセレクションボックス（4個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,200</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">

            <img src="common/images/chocolate-crush-box.jpg" alt="" class="donuts_image">
            <p class="list_text">クラッシュボックス（7個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥2,400</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">

            <img src="common/images/cream-box-1.jpg" alt="" class="donuts_image">
            <p class="list_text">クリームボックス（4個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥1,400</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>

        <div class="product_container">
          <a href="">

            <img src="common/images/cream-box-2.jpg" alt="" class="donuts_image">
            <p class="list_text">クリームボックス（9個入り）</p>
          </a>
          <div class="price_container">
            <p class="list_price">税込　¥2,800</p>
            <img src="common/images/favorite.png" alt="ハートマーク" class="heart_mark">
          </div>
          <p class="submit_btn">
            <input type="submit" value="カートに入れる" class="cart_btn">
          </p>
        </div>
      </div>

    </section>
  </main>
<?php require 'includes/footer.php' ?>