<?php require 'includes/header.php' ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="common/css/reset.css">
  <link rel="stylesheet" href="common/css/common.css">
  <link rel="stylesheet" href="common/css/card-input.css">
  <title>クレジットカード情報 - 入力ページ | C.C.Donuts</title>
</head>

<body>
  <div class="card_input">
    <h2>カード情報登録</h2>
  </div>

  <form method="post" action="" class="card_registration">

    <div class="form-item">
      <label for="user_name">お名前<span class="require">(必須)</span></label>
      <br>
      <input type="text" id="user_name" name="name">
    </div>
    <br>

    <div class="form-item">
      <label>カード会社<span class="require">(必須)</span></label><br>

      <span>
        <label><input type="radio" name="card_brand" value="JCB">JCB</label>
        <label><input type="radio" name="card_brand" value="Visa">Visa</label>
        <label><input type="radio" name="card_brand" value="Mastercard">Mastercard</label>
      </span>
    </div>
    <br>

    <div class="form-item">
      <label for="user_name">カード番号<span class="require">(必須)</span></label>
      <br>
      <input type="text" id="card_number" name="name" minlength="14" maxlength="16">
    </div>
    <br>

    <div class="expiry">
      <label>有効期限<span class="require">(必須)</span></label><br>
      <input type="number" id="" name="name" min="1" max="12">月<br>
      <input type="number" id="" name="year" min="25" max="40">年
    </div>
    <br>
    <br>
    <div class="form-item">
      <label for="user_name">セキュリティコード<span class="require">(必須)</span></label>
      <br>
      <input type="text" id="security_code" name="name" minlength="3" maxlength="4">
    </div>
    <br>

    <div class="confirm">
      <button type="submit">ご入力内容を確認する</button>
    </div>
  </form>
</body>
</html>
<?php require 'includes/footer.php' ?>