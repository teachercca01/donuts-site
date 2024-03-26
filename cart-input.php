<?php
$pageName = 'カート-追加ページ';
require 'includes/header.php'; ?>

<?php
if (isset($_SESSION['customer_donuts'])) {
    echo '<p class="login_user">ようこそ　', $_SESSION['customer_donuts']['name'] . '様</p>';
} else {
    echo '<p class="login_user">ようこそ　ゲスト様</p>';
}
?> 

<?php

if (!empty($_REQUEST['count'])) {
    if (isset($_SESSION['customer_donuts'])) {

        $id = $_REQUEST['id'];

        if (!isset($_SESSION['product_donuts'])) {
            $_SESSION['product_donuts'] = [];
        }

        $count = 0;
        if (isset($_SESSION['product_donuts'][$id])) {
            $count = $_SESSION['product_donuts'][$id]['count'];
        }

        $_SESSION['product_donuts'][$id] = [
            'name' => $_REQUEST['name'],
            'price' => $_REQUEST['price'],
            'count' => $count + $_REQUEST['count']
        ];
        require 'cart.php';
    } else {
        echo '<p>カートへ商品を追加するには、ログインをしてください。</p>';
        echo '<p><a href="login-input.php">ログインページへ戻る</a></p>';
    }
} else {
    echo '<p>商品の個数が入力されていません。</p>';
    echo '<p><a href="product.php">商品一覧ページへ戻る</a></p>';
}
?>
<?php require 'includes/footer.php'; ?>
