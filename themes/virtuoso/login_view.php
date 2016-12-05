<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h2>Login now</h2>
            <form role="form" action="<?= $url->site_url('login'); ?>" method="post">
                <?php echo $msg;?>
                <div class="form-group">
                    <label for="site_name">Username or E-mail:</label>
                    <input class="form-control" type="text" value="<?=@$_POST['username'];?>" placeholder="Username or E-mail" name="username">
                    </div>
                <div class="form-group">
                    <label for="site_name">Password:</label>
                    <input class="form-control" value="" type="password" placeholder="Password" name="password"></div>
                <div class="form-group">
                    <label><input type="checkbox" value="1" name="keep_logged"> Keep me logged in</label>
                </div>
                <p><input type="submit" value="Login" class="btn btn-primary"></p>
            </form>
            <p>Don't have an account? <a href="<?= $url->site_url('register'); ?>">Register now.</a></p>
            <p><a href="<?= $url->site_url('resetpassword'); ?>">I forgot my password</a></p>
        </div>
    </body>
</html>