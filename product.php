<?php
$pageName = '商品一覧ページ';
require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>

<?php
require 'includes/database.php';

$sql = $pdo->query('select * from product');

foreach ($sql as $row) {
    $id = $row['id'];
    $category = $row['category'];
    echo '<form action="cart-input.php" method="post">';
    echo '<table>';
    echo '<tr>';
    echo '<td>';
    if ($category == 1) {
        echo '<a href="detail-1.php?id=', $id, '">', $row['name'], '</a>';
    } else {
        echo '<a href="detail-2.php?id=', $id, '">', $row['name'], '</a>';
    }
    echo '</td>';
    echo '<td>', $row['price'], '</td>';
    echo '<td><input type="number" name="count"> 個</td>';
    echo '<td><input type="submit" value="カートへ追加">';
    echo '</tr>';
    echo '</table>';

    echo '<input type="hidden" name="id" value="', $id, '">';
    echo '<input type="hidden" name="name" value="', $row['name'], '">';
    echo '<input type="hidden" name="price" value="', $row['price'], '">';

    echo '</form>';
}

?>

<?php require 'includes/footer.php'; ?>
