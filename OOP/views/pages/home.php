<?php
use App\Services\Page;

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
        <?php foreach ($product as $item): ?>
            <div class="col align-items-start card d-flex g-2 row">
                <div class="card-body">
                    <h3 class="fs-2 text-body-emphasis"><?= $item['name'] ?></h3>
                    <p><?= $item['price'] ?></p>
                    <a href="order?id=<?= $item['id'] ?>" class="btn btn-primary">
                        Оформить заказ
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

</body>
</html>
