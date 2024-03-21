<?php require 'includes/header.php'; ?>

<?php
unset($_SESSION['customer_donuts']);
require 'includes/database.php';
$sql = $pdo->prepare('select * from customer where mail=? and password=?');
$sql->execute([$_REQUEST['mail'], $_REQUEST['password']]);
foreach ($sql as $row) {
    $_SESSION['customer_donuts'] = [
        'id' => $row['id'], 'name' => $row['name'],
        'address' => $row['address'], 'mail' => $row['mail'],
        'password' => $row['password']
    ];
}
if (isset($_SESSION['customer_donuts'])) {
    $login_user = '<p class="login_user">ようこそ　' . $_SESSION['customer_donuts']['name'] . '様</p>';
} else {
    require 'includes/header.php';
    echo '<p>メールアドレスまたはパスワードが違います。</p><p><a href="login-input.php">ログインページへ戻る</a></p>';
    exit;
}
?>

<?php
echo $login_user;
echo '<p><a href="cart-input.php">カートの中身を見る</a></p>';
echo '<p><a href="index.php">Topページへ戻る</a></p>';
?> 

<?php require 'includes/footer.php'; ?>
