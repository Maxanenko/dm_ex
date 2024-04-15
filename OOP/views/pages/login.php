<?php
use App\Services\Page;

if (isset($_SESSION["user"])) {
    \App\Services\Router::redirect('/profile');
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
        <form class="mt-4" method="post" action="/auth/login">
            <h2 class="mb-4">Sign In</h2>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>
