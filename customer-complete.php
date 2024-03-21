<?php require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>


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
    $sql = $pdo->prepare('select * from customer where mail=?');
    $sql->execute([$_SESSION['mail']]);
}

if (empty($sql->fetchAll())) {

    if (!isset($_SESSION['customer_donuts'])) {

        $sql = $pdo->prepare('insert into customer values(null,?,?,?,?,?,?)');
        $sql->execute([
            $_SESSION['name'],
            $_SESSION['kana'],
            $_SESSION['post_code'],
            $_SESSION['address'],
            $_SESSION['mail'],
            $_SESSION['password']
        ]);

        echo '<p>お客様情報を登録しました。</p>';
        echo '<p><a href="">ログイン画面へ進む</a></p>';
    }
} else {
    echo 'このメールアドレスはすでに使用されています。変更してください。';
}



?>
<?php require 'includes/footer.php'; ?>
