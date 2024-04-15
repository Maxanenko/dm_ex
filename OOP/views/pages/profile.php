<?php
use App\Services\Page;

if (!$_SESSION["user"]) {
    \App\Services\Router::redirect('/login');
}
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
    <div class="jumbotrom">
        <h1 class="display-4"><?= $_SESSION['user']["username"] ?></h1>
        <img src="<?=$_SESSION['user']["avatar"]?>" width="300" height="300" alt="">
    </div>
</div>

</body>
</html>
