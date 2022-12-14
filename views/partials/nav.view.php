<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #F61321;">
    <div class="container">
        <a class="navbar-brand" href="/">VintageCarGo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link" style="color: lightyellow" href="/cars">Home<span class="sr-only">Items</span></a>
                <a class="nav-link" style="color: lightyellow" href="/about">About</a>
                <a class="nav-link" style="color: lightyellow" href="/users">Users</a>
                <a class="nav-link" style="color: lightyellow" href="/logout">Logout</a>
            </div>
        </div>
    </div>
    <div class="mt-6 ml-6" style="color: lightyellow">
        <?php if(isset($_SESSION['user'])) : ?>
            User: <?= $_SESSION['user']->name; ?>
        <?php else: ?>
            Guest
        <?php endif;?>
    </div>
</nav>