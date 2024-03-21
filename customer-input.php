<?php require 'includes/header.php'; ?>

<?php
if(isset($_SESSION['customer_donuts']['name'])) {
    echo '<p class="login_user">ようこそ　',$_SESSION['customer_donuts']['name'] . '様</p>';
} else {
    echo '<p class="login_user">ようこそ　ゲスト様</p>';
}
?> 

<?php

if(isset($_SESSION['customer_donuts'])) {
    echo '<p>すでに会員登録済みです。</p>';
    exit;
} else {

    echo '<form action="customer-confirm.php" method="post">';
    echo '<table>';

    echo '<tr><td>お名前</td><td>';
    echo '<input type="text" name="name" value="" require>';
    echo '</td></tr>';

    echo '<tr><td>フリガナ</td><td>';
    echo '<input type="text" name="kana" value="" require>';
    echo '</td></tr>';

    echo '<tr><td>郵便番号</td><td>';
    echo '<input type="text" name="post_code" value="" require>';
    echo '</td></tr>';

    echo '<tr><td>住所</td><td>';
    echo '<input type="text" name="address" value="" require>';
    echo '</td></tr>';

    echo '<tr><td>メールアドレス</td><td>';
    echo '<input type="text" name="mail" value="" require>';
    echo '</td></tr>';

    echo '<tr><td>パスワード</td><td>';
    echo '<input type="password" name="password" value="" require>';
    echo '</td></tr>';

    echo '</table>';

    echo '<input type="submit" value="入力内容を確認する">';

    echo '</form>';
}
?>
<?php require 'includes/footer.php'; ?>
