<?php require 'includes/header.php'; ?>

<?php
if(isset($_SESSION['customer_donuts'])) {
    echo '<p class="login_user">ようこそ　',$_SESSION['customer_donuts']['name'] . '様</p>';
} else {
    echo '<p class="login_user">ようこそ　ゲスト様</p>';
}
?> 

<?php

if(isset($_REQUEST['name'])) {
    if(empty($_REQUEST['name'])) {
        echo '<p">名前が入力されていません</p>';
        exit;
    } elseif(empty($_REQUEST['kana'])) {
        echo '<p">フリガナが入力されていません</p>';
        exit;
    } elseif(empty($_REQUEST['post_code']) || !preg_match('/^[0-9]{7}$/', $_REQUEST['post_code'])) {
        echo '<p>郵便番号が違います。</p>';
        exit;
    } elseif(empty($_REQUEST['address'])) {
        echo '<p">住所が入力されていません</p>';
        exit;
    } elseif(empty($_REQUEST['mail']) || !preg_match('/@/', $_REQUEST['mail'])) {
        echo '<p>メールアドレスが違います。</p>';
        exit;
    } elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $_REQUEST['password'])) {
        echo '<p>パスワードが不適切です。</p>';
        exit;
    } else {
        echo '<form action="customer-complete.php" method="post">';
        echo '<table>';

        echo '<tr><td>お名前</td><td>';
        echo $_REQUEST['name'];
        echo '</td></tr>';

        echo '<tr><td>フリガナ</td><td>';
        echo $_REQUEST['kana'];
        echo '</td></tr>';

        echo '<tr><td>郵便番号</td><td>';
        echo $_REQUEST['post_code'];
        echo '</td></tr>';

        echo '<tr><td>住所</td><td>';
        echo $_REQUEST['address'];
        echo '</td></tr>';

        echo '<tr><td>メールアドレス</td><td>';
        echo $_REQUEST['mail'];
        echo '</td></tr>';

        echo '<tr><td>パスワード</td><td>';
        echo str_repeat('●', strlen($_REQUEST['password']));
        echo '</td></tr>';

        echo '</table>';

        echo '<input type="submit" value="この内容で登録する">';

        $_SESSION['name'] = $_REQUEST['name'];
        $_SESSION['kana'] = $_REQUEST['kana'];
        $_SESSION['post_code'] = $_REQUEST['post_code'];
        $_SESSION['address'] = $_REQUEST['address'];
        $_SESSION['mail'] = $_REQUEST['mail'];
        $_SESSION['password'] = $_REQUEST['password'];

        echo '</form>';

    }
} else {
    echo '<p>入力データがありません。</p>';
}



?>
<?php require 'includes/footer.php'; ?>