<?php
use App\Services\Page;

if($_SESSION['user']['role'] === 1) {
    \App\Services\Router::redirect('/home');
}

$order = \R::findAll('order');
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
                    <p>Стату:
                        <?= \R::findOne('status', 'id=?', [$item['id_status']])['name'] ?>
                        <form  action="admin/status/confirmed" method="post">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <select class="form-select" aria-label="Default select example" name="id_status">
                                <option value="2">Подтвердить</option>
                                <option value="3">Откланить</option>
                            </select>
                            <button type="submit">отправить</button>
                        </form>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

</body>
</html>
