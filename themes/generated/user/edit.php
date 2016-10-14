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

            <h2>Edit user</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('user/edit/'.$user['_id']) ?>" >                <div class="form-group">
                    <label for="type">type:</label>
                    <input type="text" class="form-control" id="type" name="type" value="<?php if(isset($_POST['type'])){ echo @$_POST['type'];} else{ echo $user['type'];}?>">
                </div>                <div class="form-group">
                    <label for="username">username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php if(isset($_POST['username'])){ echo @$_POST['username'];} else{ echo $user['username'];}?>">
                </div>                <div class="form-group">
                    <label for="password">password:</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?php if(isset($_POST['password'])){ echo @$_POST['password'];} else{ echo $user['password'];}?>">
                </div>                <div class="form-group">
                    <label for="display_name">display_name:</label>
                    <input type="text" class="form-control" id="display_name" name="display_name" value="<?php if(isset($_POST['display_name'])){ echo @$_POST['display_name'];} else{ echo $user['display_name'];}?>">
                </div>                <div class="form-group">
                    <label for="email">email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){ echo @$_POST['email'];} else{ echo $user['email'];}?>">
                </div>                <div class="form-group">
                    <label for="created">created:</label>
                    <input type="text" class="form-control" id="created" name="created" value="<?php if(isset($_POST['created'])){ echo @$_POST['created'];} else{ echo $user['created'];}?>">
                </div>                <div class="form-group">
                    <label for="updated">updated:</label>
                    <input type="text" class="form-control" id="updated" name="updated" value="<?php if(isset($_POST['updated'])){ echo @$_POST['updated'];} else{ echo $user['updated'];}?>">
                </div>                <div class="form-group">
                    <label for="active">active:</label>
                    <input type="text" class="form-control" id="active" name="active" value="<?php if(isset($_POST['active'])){ echo @$_POST['active'];} else{ echo $user['active'];}?>">
                </div>                <div class="form-group">
                    <label for="banned">banned:</label>
                    <input type="text" class="form-control" id="banned" name="banned" value="<?php if(isset($_POST['banned'])){ echo @$_POST['banned'];} else{ echo $user['banned'];}?>">
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('user') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>