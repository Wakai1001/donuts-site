<?php require 'includes/header.php' ?>
<body>
    <div class="container">
        <h2>ご購入確認</h2>
        <h3>ご購入商品</h3>
        <div class="section">
            <div class="product-table">
                
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
                        <table class='product-row'>
                        <tr>
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
                       </table> 
                        ";
                        
                    }
                    ?>
                    <table>
                    <tr class='total_table'>
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
            <?php
            try {
                // データベース接続（PDO）
                $pdo = new PDO('mysql:host=localhost;dbname=shop', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // クレジットカード情報取得クエリ
                $stmt = $pdo->prepare("SELECT * FROM credit_cards WHERE customer_id = :customer_id");
                $stmt->execute(['customer_id' => $customer_id]);
                $card = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($card) {
                    // クレジットカード情報がある場合
                    echo "
                    <table class='payment-table'>
                        <tr>
                            <th class='label'>お支払い</th>
                            <td class='value'>クレジットカード</td>
                        </tr>
                        <tr>
                            <th class='label'>カード種類</th>
                            <td class='value'>{$card['card_type']}</td>
                        </tr>
                        <tr>
                            <th class='label'>カード番号</th>
                            <td class='value'>**** **** **** " . substr($card['card_number'], -4) . "</td>
                        </tr>
                    </table>
                    ";
                } else {
                    // クレジットカード情報がない場合
                    echo "
                    <div class='no-payment'>
                        <p>お支払い方法が登録されていません。<br>
                        クレジットカード情報を登録してください。</p>
                    </div>
                    ";
                }
            } catch (PDOException $e) {
                // エラーが発生しても「お支払い方法が登録されていません」と表示する
                echo "
                <div class='no-payment'>
                    <p>お支払い方法が登録されていません。<br>
                    クレジットカード情報を登録してください。</p>
                </div>
                ";
            }
            ?>
        </div>

        <!-- 購入ボタン -->
        <?php
try {
    // データベース接続（例：PDOを使う）
    $pdo = new PDO('mysql:host=localhost;dbname=shop', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // クレジットカード情報を取得するクエリ
    $stmt = $pdo->prepare("SELECT * FROM credit_cards WHERE customer_id = :customer_id");
    $stmt->execute(['customer_id' => $customer_id]);
    $card = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($card) {
        // クレジットカード情報がある場合
        echo "
        <div class='purchase-button'>
            <button>ご購入を確定する</button>
        </div>
        ";
    } else {
        // クレジットカード情報がない場合
        echo "
        <div class='purchase-button'>
            <button>カード情報を登録する</button>
        </div>
        ";
    }
} catch (PDOException $e) {
    // エラーが発生しても「カード情報を登録する」ボタンを表示
    echo "
    <div class='purchase-button'>
        <button>カード情報を登録する</button>
    </div>
    ";
}
?>

</body>
<?php require 'includes/footer.php' ?>
