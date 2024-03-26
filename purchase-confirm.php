<?php
$pageName = '購入-完了ページ ';
require 'includes/header.php'; ?>

<?php

if (!isset($_SESSION['customer_donuts'])) {
    echo '購入手続きを行うにはログインしてください。';
} elseif (empty($_SESSION['product_donuts'])) {
    echo 'カートに商品がありません。';
} else {
    require 'includes/database.php';
    echo '<p>ご購入商品</p>';
    if (!empty($_SESSION['product_donuts'])) {
        $total = 0;
        foreach ($_SESSION['product_donuts'] as $id => $product) {
            echo '<p>商品名　', $product['name'], '</p>';
            echo '<p>数量　', $product['count'], '</p>';
            $subtotal = $product['price'] * $product['count'];
            echo '<p>小計　', $subtotal, '</p>';
            $total += $subtotal;
        }
        echo '<p>合計', $total, '</p>';
    } else {
        echo 'カートに商品がありません。';
    }
    echo '<hr>';
    echo '<p>お届け先</p>';
    echo '<p>お名前：', $_SESSION['customer_donuts']['name'], '</p>';
    echo '<p>ご住所：', $_SESSION['customer_donuts']['address'], '</p>';
    echo '<hr>';
    echo '<p>お支払情報</p>';

    //ここから

    $sql = $pdo->prepare('select * from card where id=?');
    $sql->execute([$_SESSION['customer_donuts']['id']]);
    $result = $sql->fetchAll();

    if (!empty($result)) {
        $card = $result[0];
        echo '<p>お支払い　クレジットカード</p>';
        echo '<p>カード種類　', $card['card_type'], '</p>';
        echo '<p>カード番号　', $card['card_no'], '</p>';
        echo '<hr>';
        echo '<a href="purchase-complete.php">購入を確定する</a>';
    } else {
        echo '<p>お支払情報が登録されていません。<br>クレジットカード情報を登録してください。</p>';
        echo '<a href="card-input.php">カード情報を登録する</a>';
    }
}


?>
<?php require 'includes/footer.php'; ?>
