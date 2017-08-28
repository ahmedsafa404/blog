<div class="col-md-4">
    <h2>Login</h2>
    <form action="login.php" method="post" id="loginForm">

        <div class="form-group">
            <input type="hidden" name="login_token" value="">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>

        </div>
        <button type="submit" class="btn-success" id="login">Login</button>

    </form>
    <?php
    if(isset($_GET['error']))
    {
        ?>
        <div class='login_message'><font color="red" size="2">Invalid username or password.</font></div>
    <?php }?>

</div>