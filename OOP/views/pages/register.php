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
    <form class="mt-4"  action="auth/register" method="post" enctype="multipart/form-data">
        <h2 class="mb-4">Sign Up</h2>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="login" class="form-label">login</label>
            <input type="text" class="form-control" name="login" id="login" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="full_name" class="form-label">Full name</label>
            <input type="text" class="form-control" name="full_name" id="full_name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirm" id="password_confirm">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>

