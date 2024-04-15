<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <?php print_r($_SESSION) ?>
    <div class="container-fluid">
        <a class="navbar-brand" href="home">OOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item d-flex">
                    <a class="nav-link active" aria-current="page" href="home">Home</a>
                    <a class="nav-link active" aria-current="page" href="userOrder">Order</a>
                    <a class="nav-link active" aria-current="page" href="admin">Admin</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <?php if (!isset($_SESSION["user"])) :?>
                <a  class="nav-link active me-1" href="/login">Login</a> /
                <a class="nav-link active mx-1" href="/register"> Register</a>
            <?php else : ?>
                <form action="/auth/logout" method="post">
                    <button class="nav-link active mx-1">logout</button>
                </form>

            <?php endif;?>
        </div>

    </div>
</nav>
