<!DOCTYPE html>
<html lang="en">
    <head>
        <title>user</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">

            <h2>Add user</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('user/add') ?>" ><div class="form-group">
                    <label for="type">type:</label>
                    <input type="text" class="form-control" id="type" name="type" value="<?php echo @$_POST['type'];?>">
                </div><div class="form-group">
                    <label for="username">username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo @$_POST['username'];?>">
                </div><div class="form-group">
                    <label for="password">password:</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo @$_POST['password'];?>">
                </div><div class="form-group">
                    <label for="display_name">display_name:</label>
                    <input type="text" class="form-control" id="display_name" name="display_name" value="<?php echo @$_POST['display_name'];?>">
                </div><div class="form-group">
                    <label for="email">email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo @$_POST['email'];?>">
                </div><div class="form-group">
                    <label for="created">created:</label>
                    <input type="text" class="form-control" id="created" name="created" value="<?php echo @$_POST['created'];?>">
                </div><div class="form-group">
                    <label for="updated">updated:</label>
                    <input type="text" class="form-control" id="updated" name="updated" value="<?php echo @$_POST['updated'];?>">
                </div><div class="form-group">
                    <label for="active">active:</label>
                    <input type="text" class="form-control" id="active" name="active" value="<?php echo @$_POST['active'];?>">
                </div><div class="form-group">
                    <label for="banned">banned:</label>
                    <input type="text" class="form-control" id="banned" name="banned" value="<?php echo @$_POST['banned'];?>">
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Insert</button>
                <a href="<?php echo $url->site_url('user') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>