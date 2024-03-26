<?php
$pageName = 'ログアウト-完了ページ';
require 'includes/header.php'; ?>
<?php

if (isset($_SESSION['customer_donuts'])) {
    unset($_SESSION['customer_donuts']);
}

?> 
<?php
if (isset($_SESSION['customer_donuts'])) {
    echo '<p class="login_user">ようこそ　', $_SESSION['customer_donuts']['name'] . '様</p>';
} else {
    echo '<p class="login_user">ようこそ　ゲスト様</p>';
}

echo 'ログアウトが完了しました。';
echo '<p><a href="index.php">Topページへ戻る</a></p>';

?> 
<?php require 'includes/footer.php'; ?>