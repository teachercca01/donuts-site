<?php require 'includes/header.php'; ?>
<?php
unset($_SESSION['product_donuts'][$_REQUEST['id']]);
echo '<p>カートから商品を削除しました。</p>';
echo '<hr>';
require 'cart.php';
?>

<?php require 'includes/footer.php'; ?>
