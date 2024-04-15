<?php
use App\Services\Page;

$product = \R::findAll('product');
$products = \R::findOne('product', 'id=?', [$_GET['id']]);
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
    <div class="card ">
            <div class="card-body">
                <form class="mt-4" method="post" action="/order/add">
                    <h2 class="mb-4">Sign In</h2>
                    <select class="form-select" aria-label="Default select example" name="id_product">
                        <?php foreach ($product as $item): ?>
                            <option
                                value="<?= $item['id'] ?>"
                                <?php if ($item['id'] === $_GET['id']): ?>
                                    selected="selected"
                                <?php endif;?>
                            >
                                <?= $item['name']?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="mb-3">
                        <label for="count" class="form-label">Количество</label>
                        <input type="number" class="form-control" name="count" id="count" min=0 oninput="validity.valid||(value='');">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Адрес</label>
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

    </div>
</div>

</body>
</html>
