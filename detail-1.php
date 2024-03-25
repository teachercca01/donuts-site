<?php require 'includes/header.php'; ?>

<?php

require 'includes/database.php';

$sql = $pdo->prepare('select * from product where id=?');
$sql->execute([$_REQUEST['id']]);

foreach ($sql as $row) {
    echo '<p><img alt="image" src="common/images/', $row['id'], '.jpg"></p>';
    echo '<form action="cart-input.php" method="post">';
    echo '<p>', $row['name'], '</p>';
    echo '<p>', $row['description'], '</p>';
    echo '<p>', $row['price'], '</p>';
    echo '<p><select name="count">';
    for ($i = 1; $i <= 10; $i++) {
        echo '<option value="', $i, '">', $i, '</option>';
    }
    echo '</select>個</p>';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="hidden" name="name" value="', $row['name'], '">';
    echo '<input type="hidden" name="price" value="', $row['price'], '">';
    echo '<p><input type="submit" value="カートに入れる"></p>';
    echo '</form>';
}
?>
<?php require 'includes/footer.php'; ?>
