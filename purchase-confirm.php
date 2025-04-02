<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/purchase-confirm.css">
    <link rel="stylesheet" href="common/css/common.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <title>ご購入確認 | CC Donuts</title>
</head>
<body>
  <!-- require 'includes/database.php'; -->
<?php require 'includes/header.php' ?>
    <div class="container">
        <h2>ご購入確認</h2>
        
        <h3>ご購入商品</h3>

        <div class="section">
            <div class="product-table">
                <table>
                    <?php
                    $products = [
                        ["name" => "aaaaaaaaaaaa", "quantity" => 1, "price" => 1500],
                        ["name" => "aaaaaaaaaaaa", "quantity" => 1, "price" => 3500]
                    ];
                    $total = 0;
                    foreach ($products as $product) {
                        $subtotal = $product["price"] * $product["quantity"];
                        $total += $subtotal;
                        echo "
                        <tr >
                            <th class='label'>商品名</th>
                            <td>{$product['name']}</td>
                        </tr>
                        <tr>
                            <th class='label'>数量</th>
                            <td>{$product['quantity']}個</td>
                        </tr>
                        <tr>
                            <th class='label'>小計</th>
                            <td>税込 ¥" . number_format($subtotal) . "</td>
                        </tr>
                        <tr>
                            <td colspan='2' class='separator'><hr></td>
                        </tr>
                        ";
                    }
                    ?>
                    <tr>
                        <th class='label'>合計</th>
                        <td class='include_tax'>税込 ¥<?php echo number_format($total); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- お届け先 -->
    <div class="section">
        <h3>お届け先</h3>
        <table class="address-table">
            <tr>
                <th class="label">お名前</th>
                <td class="value"><?php echo $customer['name']; ?></td>
            </tr>
            <tr>
                <th class="label">住所</th>
                <td class="value"><?php echo $customer['address']; ?></td>
            </tr>
        </table>
    </div>

    <!-- お支払い方法 -->
    <div class="section">
        <h3>お支払い方法</h3>
        <table class="payment-table">
            <tr>
                <th class="label">お支払い</th>
                <td class="value">クレジットカード</td>
            </tr>
            <tr>
                <th class="label">カード種類</th>
                <td class="value">Visa</td>
            </tr>
            <tr>
                <th class="label">カード番号</th>
                <td class="value">123456・・・・・・・・</td>
            </tr>
        </table>
    </div>
        <!-- 購入ボタン -->
        <div class="purchase-button">
            <button>ご購入を確定する</button>
        </div>

    </div>
    <?php require 'includes/footer.php' ?>
</body>
</html>
