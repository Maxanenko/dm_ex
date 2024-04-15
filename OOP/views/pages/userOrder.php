<?php
use App\Services\Page;

$order = \R::findAll('order', "id_user=?", [$_SESSION['user']['user_id']]);
$product = \R::findAll('product');
?>

<!doctype html>
<html lang="en">
<?php
Page::part('head')
?>
<body>
<?php
Page::part('navbar')
?>

<div class="container">
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <?php foreach ($order as $item): ?>
            <div class="col align-items-start card d-flex g-2 row">
                <div class="card-body">
                    <h3 class="fs-2 text-body-emphasis"><?= \R::findOne('product', 'id=?', [$item['id_product']])['name'] ?></h3>
                    <p>Цена: <?= \R::findOne('product', 'id=?', [$item['id_product']])['price'] ?></p>
                    <p>Количество: <?= $item['count'] ?></p>
                    <p>Адрес: <?=$item['address'] ?></p>
                    <p>Адрес: <?= \R::findOne('status', 'id=?', [$item['id_status']])['name'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

</body>
</html>
