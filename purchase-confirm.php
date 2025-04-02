
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

<h3>ご購入商品</h3>





<h3>お届け先</h3>




<h3>お支払方法</h3>









</main>



    <?php require 'includes/footer.php' ?>
</body>
</html>
