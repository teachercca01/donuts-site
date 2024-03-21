<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>donuts-site</title>
    <link rel="stylesheet" href="../common/css/reset.css">
    <link rel="stylesheet" href="../common/css/base.css">
    <link rel="stylesheet" href="../common/css/home.css">
</head>

<body>
    <?php
    if (isset($_SESSION['customer_donuts'])) {
        echo '<a href="logout-input.php">ログアウト</a>　';
    } else {
        echo '<a href="login-input.php">ログイン</a>　';
    }
    ?>
    <a href="cart-show.php">カート</a>
    <a href="customer-input.php">会員登録</a>