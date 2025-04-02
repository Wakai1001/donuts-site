<?php 
session_start(); 
require 'includes/header.php'
?>

<main>

<?php if(isset($_SESSION['customer'])): ?>
  <p class="guest_name_area">ようこそ&#12288; <?= htmlspecialchars($_SESSION['customer']['name']) ?> 様</p>
  <hr>
  <h2 class="login_now">ログアウト</h2>
  <div id="login_area">
    <p>ログアウトしますか&#65311;</p>
    <form action="logout-complete.php" method="post">
      <div id="submit_login_area">
        <input type="submit" value="ログアウトする" id="submit_logout">
      </div>
    </form>
  </div>
  <?php endif; ?>

</main>
<?php require 'includes/footer.php' ?>