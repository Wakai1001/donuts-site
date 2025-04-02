<?php require 'includes/header.php' ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ご購入確認 | CC Donuts</title>
    
    <link rel="stylesheet" href="card-confirm.css">
</head>
<body>
    <div class="container">
        <!-- ヘッダー -->
        <header>
            <img src="images/logo.png" alt="CC Donuts" class="logo">
            <h1>ご購入確認</h1>
        </header>

        <!-- 購入商品一覧 -->
        <div class="section">
            <h2>ご購入商品</h2>
            <?php
            $products = [
                ["name" => "CCドーナツ 当店オリジナル (5個入り)", "quantity" => 1, "price" => 1500],
                ["name" => "フルーツドーナツセット（12個入り）", "quantity" => 1, "price" => 3500]
            ];
            $total = 0;
            foreach ($products as $product) {
                $subtotal = $product["price"] * $product["quantity"];
                $total += $subtotal;
                echo "
                <div class='product'>
                    <p class='label'>商品名</p>
                    <p class='value'>{$product['name']}</p>
                    <p class='label'>数量</p>
                    <p class='value'>{$product['quantity']}個</p>
                    <p class='label'>小計</p>
                    <p class='value'>税込 ¥" . number_format($subtotal) . "</p>
                    <hr>
                </div>
                ";
            }
            ?>
            <div class="total">
                <p class="label">合計</p>
                <p class="value">税込 ¥<?php echo number_format($total); ?></p>
            </div>
        </div>

        <!-- お届け先 -->
        <div class="section">
            <h2>お届け先</h2>
            <p class="label">お名前</p>
            <p class="value">ドーナツ太郎</p>
            <p class="label">住所</p>
            <p class="value">千葉県〇〇市中央1-1-1</p>
        </div>

        <!-- お支払い方法 -->
        <div class="section">
            <h2>お支払い方法</h2>
            <p class="label">お支払い</p>
            <p class="value">クレジットカード</p>
            <p class="label">カード種類</p>
            <p class="value">Visa</p>
            <p class="label">カード番号</p>
            <p class="value">123456・・・・・・・・</p>
        </div>

        <!-- 購入ボタン -->
        <div class="purchase-button">
            <button>ご購入を確定する</button>
        </div>

        <!-- フッター -->
        <?php require 'footer.php'; ?>
    </div>
</body>
</html>




<?php require 'includes/footer.php' ?>