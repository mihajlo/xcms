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

            <h2>Edit user</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('user/edit/'.$user['_id']) ?>" >                             
                <div class="form-group">
                    <label for="password">New password:</label>
                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter new password / leave blank for no changes">
                </div>                <div class="form-group">
                    <label for="display_name">Display name:</label>
                    <input type="text" class="form-control" id="display_name" name="display_name" value="<?php if(isset($_POST['display_name'])){ echo @$_POST['display_name'];} else{ echo $user['display_name'];}?>">
                </div>                         
                <div class="form-group">
                    <label for="active">Active:</label>
                    <select class="form-control" name="active">
                        <option value="1">Yes</option>
                        <option value="0" <?php if(@$_POST['active']=="0" || $user['active']=="0" || !$user['active']){echo 'selected="selected"';}?>>No</option>
                    </select>
                </div>                <div class="form-group">
                    <label for="banned">banned:</label>
                    <select class="form-control" name="banned">
                        <option value="1">Yes</option>
                        <option value="0"<?php if(@$_POST['banned']=="0" || $user['banned']=="0" || !$user['banned']){echo 'selected="selected"';}?>>No</option>
                    </select>
                    
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('user') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>