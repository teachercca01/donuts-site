<?php

if (!empty($_SESSION['product_donuts'])) {
    echo '<table>';
    $total = 0;
    foreach ($_SESSION['product_donuts'] as $id => $product) {
        echo '<tr>';
        echo '<td>', $product['name'], '</td>';
        echo '<td>', $product['price'], '</td>';
        echo '<td>', $product['count'], '</td>';
        $subtotal = $product['price'] * $product['count'];
        $total += $subtotal;
        echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
        echo '</tr>';
    }
    echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total, '</td><td></td></tr>';
    echo '</table>';
} else {
    echo 'カートに商品がありません。';
}
?>
<form action="purchase-confirm.php">
    <input type="submit" value="購入確認へ進む">
</form>
<form action="product.php">
    <input type="submit" value="買い物を続ける">
</form>