<?php
$pageName = 'クレジットカード情報-入力ページ';
require 'includes/header.php'; ?>

<?php
if (isset($_SESSION['customer_donuts']['name'])) {
    echo '<p class="login_user">ようこそ　', $_SESSION['customer_donuts']['name'] . '様</p>';
} else {
    echo '<p class="login_user">ようこそ　ゲスト様</p>';
}
?> 

<?php

echo '<form action="card-complete.php" method="post">';
echo '<table>';

echo '<tr><td>お名前</td><td>';
echo '<input type="text" name="card_name" value="" require>';
echo '</td></tr>';

echo '<tr><td>カード会社</td><td>';
echo '<label><input type="radio" name="card_type" value="JCB" require>JCB</label>';
echo '<label><input type="radio" name="card_type" value="VISA" require>VISA</label>';
echo '<label><input type="radio" name="card_type" value="Mastercard" require>Mastercard</label>';
echo '</td></tr>';

echo '<tr><td>カード 番号</td><td>';
echo '<input type="text" name="card_no" value="" require>';
echo '</td></tr>';

echo '<tr><td>有効期限</td><td>';
echo '<label><input type="text" name="card_month" value="" require>月</label>';
echo '<label><input type="text" name="card_year" value="" require>年</label>';
echo '</td></tr>';

echo '<tr><td>セキュリティコード</td><td>';
echo '<input type="text" name="card_security_code" value="" require>';
echo '</td></tr>';

echo '</table>';

echo '<input type="submit" value="カード情報を登録する">';

echo '</form>';

?>
<?php require 'includes/footer.php'; ?>
