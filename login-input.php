<?php require 'includes/header.php' ?>

<main>
  <p class="guest_name_area">ようこそ&#12288;ゲスト様</p>
  <hr>

  <h2 class="login_now">ログイン</h2>


  <form action="login-complete.php" method="post" id="login_area">

  <div id="email_area">
    <p class="form_area_text">メールアドレス</p>
    <input type="email" name="mail" id="email_login" autocomplete="email">
  </div>
  <div id="password_area">
    <p class="form_area_text"> パスワード</p>
    <input type="password" name="password" id="passsword_login" autocomplete="new-password">
  </div>
  <div id="submit_login_area">
    <input type="submit" value="ログインする" id="submit_login">
  </div>

  </form>

  <p class="new_customer"><a href="customer-input.php">会員登録がお済みでない方はこちら</a></p>

</main>



<?php require 'includes/footer.php' ?>