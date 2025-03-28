<?php require 'includes/header.php' ?>
<link rel="stylesheet" href="common/css/login.css">

<main>
  <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>

  <div class="login_now">
    <p>ログイン</p>
  </div>
  <form action="login-complete.php" method="post">

  <div id="email_area">
    <p>メールアドレス</p>
    <input type="email" name="login">
  </div>
  <div id="password_area">
    <p> パスワード</p>
    <input type="password" name="password">
  </div>
  <input type="submit" value="ログインする">

  </form>

  <p><a href="">会員登録がお済みでない方はこちら</a></p>

</main>



<?php require 'includes/footer.php' ?>