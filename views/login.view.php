<?php require_once 'partials/header.view.php' ?>

<h1>Login</h1>
<?php if(isset($message)) : ?>
    <div class="alert alert-danger">
        <?= $message ?>

    </div>
<?php endif; ?>

<form action="/login" method="POST">


    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>


    <div class="mt-3 mb-3">
        <button type="submit" class="btn btn-danger" style="width: 200px;" >Login</button>
    </div>
</form>

<div class="footerIndex" style="position:absolute; bottom: 0; width: 100%;">

    <p> <?php require_once 'partials/footer.view.php' ?> </p>
    <!--had to place footer inside of a div because it wouldn't move from the top of the page -->
</div>
