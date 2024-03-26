<?php
$pageName = 'クレジットカード情報-入力確認ページ';
require 'includes/header.php'; ?>

<?php
if (isset($_SESSION['customer_donuts'])) {
    echo '<p class="login_user">ようこそ　', $_SESSION['customer_donuts']['name'] . '様</p>';
} else {
    echo '<p class="login_user">ようこそ　ゲスト様</p>';
}
?> 

<?php

require 'includes/database.php';

if (!isset($_SESSION['customer_donuts'])) {
    $sql = $pdo->prepare('select * from card where id=?');
    $sql->execute([$_SESSION['id']]);
    $result = $sql->fetchAll();
} else {
    $result = [];
}

if (empty($result)) {

    if (isset($_REQUEST['card_type'], $_REQUEST['card_no'], $_REQUEST['card_month'], $_REQUEST['card_year'], $_REQUEST['card_security_code'])) {
        $sql = $pdo->prepare('insert into card values(?,?,?,?,?,?,?)');
        $sql->execute([
            $_SESSION['customer_donuts']['id'],
            $_REQUEST['card_name'],
            $_REQUEST['card_type'],
            $_REQUEST['card_no'],
            $_REQUEST['card_month'],
            $_REQUEST['card_year'],
            $_REQUEST['card_security_code']
        ]);
        echo '<p>クレジットカード情報を登録しました。</p>';
        echo '<p><a href="purchase-confirm.php">購入手続きを続ける</a></p>';
    } else {
        echo '<p>クレジットカード情報が不足しています。</p>';
    }
}

?>

<?php require 'includes/footer.php'; ?>
