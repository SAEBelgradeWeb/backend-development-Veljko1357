<?php require_once 'partials/login-header.view.php' ?>
<div id="mainDiv">
    <div class="pDiv">
        <p class="indexP">Welcome to VintageCarGo</p>
    </div>

<div class="indexDiv">
    <button type="button" class="btn btn-danger"><a href="login">Login</a></button>
    <button type="button" class="btn btn-info"><a href="register">Register</a></button>
</div>

</div>
<div class="footerIndex" >

    <p> <?php require_once 'partials/footer.view.php' ?> </p>
    <!--had to place footer inside of a div because it wouldn't move from the top of the page -->
</div>