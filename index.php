<?php
$pageName = 'トップページ';
require 'includes/header.php'; ?>

<?php
if (isset($_SESSION['customer_donuts'])) {
  echo '<p class="login_user">ようこそ　', $_SESSION['customer_donuts']['name'] . '様</p>';
} else {
  echo '<p class="login_user">ようこそ　ゲスト様</p>';
}
?>

<form action="cart-input.php" method="post">
  <div>CCドーナツ 当店オリジナル（5個入り）
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="name" value="CCドーナツ 当店オリジナル（5個入り）">
    <input type="hidden" name="price" value="1500">
    <input type="hidden" name="count" value="1">
    <input type="submit" value="カートへ追加">
  </div>
</form>

<form action="cart-input.php" method="post">
  <div>フルーツドーナツセット（12個入り）
    <input type="hidden" name="id" value="7">
    <input type="hidden" name="name" value="フルーツドーナツセット（12個入り）">
    <input type="hidden" name="price" value="3500">
    <input type="hidden" name="count" value="1">
    <input type="submit" value="カートへ追加">
  </div>
</form>

<form action="cart-input.php" method="post">
  <div>チョコレートデライト（5個入り）
    <input type="hidden" name="id" value="2">
    <input type="hidden" name="name" value="チョコレートデライト（5個入り）">
    <input type="hidden" name="price" value="1600">
    <input type="hidden" name="count" value="1">
    <input type="submit" value="カートへ追加">
  </div>
</form>

<?php
echo '<p><a href="product.php">商品一覧ページ</a></p>';
?>

<?php require 'includes/footer.php'; ?>