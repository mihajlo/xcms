<!DOCTYPE html>
<html lang="en">
    <head>
        <title>user</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">

            <h2>Add new user</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('user/add') ?>" ><div class="form-group">
                    <label for="type">User type:</label>
                    <select class="form-control" name="type">
                        <option value="user">User</option>
                        <option value="admin" <?php if(@$_POST['type']=='admin'){echo 'selected="selected"';}?>>Admin</option>
                    </select>
                </div><div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo @$_POST['username'];?>">
                </div><div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo @$_POST['password'];?>">
                </div><div class="form-group">
                    <label for="display_name">Display name:</label>
                    <input type="text" class="form-control" id="display_name" name="display_name" value="<?php echo @$_POST['display_name'];?>">
                </div><div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo @$_POST['email'];?>">
                </div><div class="form-group">
                    <label for="active">Active:</label>
                    <select class="form-control" name="active">
                        <option value="1">Yes</option>
                        <option value="0" <?php if(@$_POST['active']=="0"){echo 'selected="selected"';}?>>No</option>
                    </select>
                </div><div class="form-group">
                    <label for="banned">Banned:</label>
                    <select class="form-control" name="banned">
                        <option value="0">No</option>
                        <option value="1" <?php if(@$_POST['banned']){echo 'selected="selected"';}?>>Yes</option>
                    </select>
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Insert</button>
                <a href="<?php echo $url->site_url('user') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>