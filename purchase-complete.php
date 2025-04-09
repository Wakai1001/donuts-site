<?php
session_start();
unset($_SESSION['cart']);
require 'includes/header.php' ?>


<main>

<h2>ご購入完了</h2>

<div class="message_area">
  <p class="success_message">ご購入が完了しました。</p>
  <p class="appreciatio_message">今後ともご愛顧の程、宜しくお願いいたします。</p>
</div>

<p class="top_page_return">
  <a href="index.php">topページへ戻る</a>
</p>

</main>


<?php require 'includes/footer.php' ?>