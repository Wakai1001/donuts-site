
<?php 
session_start();
require 'includes/database.php';


// カートの中身を取得する
// $_SESSION['cart']の中身がNullの場合、空の配列をセットする
$products = $_SESSION['cart'] ?? [];
// 合計金額の初期化
$total = 0;
// 商品ごとの小計を計算し、合計金額を求める
foreach ($products as $product) {
    // 価格×購入個数
    $subtotal = $product["price"] * $product["count"];
    // 小計を合計に加算する
    $total += $subtotal;
}


// ユーザー情報の取得（未ログインなら null をセットする）
$customer = $_SESSION['customer'] ?? null;


// クレジットカードの情報取得
// デフォルト時カード情報をなし
$card = null;
// try { ... } catch (PDOException $e) { ... }は例外処理(エラーハンドリング)
try {
    // ログイン中のユーザー（$customer が存在する）なら、その id を取得する
    if ($customer) {
        $customerId = $customer['id'];
        // データベースから card テーブルの card_type（カードの種類）と card_no（カード番号）を取得する
        $stmt = $pdo->prepare("select card_type, card_no from card inner join customer on customer.id = card.id WHERE customer.id = :customer_id");
        $stmt->execute(['customer_id' => $customerId]);
        // クエリを実行して、結果を $card に代入
        $card = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    $card = null;
}


require 'includes/header.php';
?>


<main>

    <h2>ご購入確認</h2>
    <section class="product_area">

        <h3>ご購入商品</h3>
            <div class="product_table">
                <?php foreach ($products as $product): ?>
                <table class="product_row">
                    <tr>
                        <th class="label">商品名</th>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                    </tr>
                    <tr>
                        <th class="label">数量</th>
                        <td><?= htmlspecialchars($product['count']) ?>個</td>
                    </tr>
                    <tr>
                        <th class="label">小計</th>
                        <td>税込&nbsp;&#165;<?= number_format($product['price'] * $product['count']) ?></td>
                    </tr>
                </table>
                <?php endforeach; ?>
                <table>
                    <tr class="total_table">
                        <th class="label">合計</th>
                        <td class="include_tax">税込&nbsp;&#165;<?= number_format($total) ?></td>
                    </tr>
                </table>
            </div>
            <!-- .product_table -->
    </section>

    <section class="customer_area">
        <h3>お届け先</h3>
            <?php if ($customer): ?>
            <table class="address_table">
                <tr>
                    <th class="label">お名前</th>
                    <td class="value"><?= htmlspecialchars($customer['name']) ?></td>
                </tr>
                <tr>
                    <th class="label">住所</th>
                    <td class="value"><?= htmlspecialchars($customer['address']) ?></td>
                </tr>
            </table>
            <?php else: ?>
            <div class="fail_message_area">
                <p>お届け先が登録されていません。<br>ログインしてください。</p>
            </div>
            <p class="move_button"><a href="login-input.php">ログインする</a></p>
            <?php endif; ?>
    </section>

    <section class="card_area">
            <h3>お支払い方法</h3>
            <?php if ($card): ?>
                <table class="payment_table">
                    <tr>
                        <th class="label">お支払い</th>
                        <td class="value">クレジットカード</td>
                    </tr>
                    <tr>
                        <th class="label">カード種類</th>
                        <td class="value"><?= htmlspecialchars($card['card_type']) ?></td>
                    </tr>
                    <tr>
                        <th class="label">カード番号</th>
                        <!-- str_repeatは文字列を反復させる -->
                        <td class="value"><?= str_repeat('*', 12) . substr($card['card_no'], -4) ?></td>
                    </tr>
                </table>
                <div class="purchase_button_area">
                <form action="purchase-complete.php" method="post">
                    <button type="submit">ご購入を確定する</button>
                </form>
                </div>
            <?php else: ?>
                <div class="fail_message_area">
                    <p>お支払い方法が登録されていません。<br>クレジットカード情報を登録してください。</p>
                </div>
                <p class="move_button"><a href="card-input.php">カード情報を登録する</a></p>
            <?php endif; ?>
    </section>
</main>

<?php require 'includes/footer.php'; ?>
