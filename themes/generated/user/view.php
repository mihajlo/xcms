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
            <h2>View user</h2> 
                
                            <div class="form-group">
                    <label>User type:</label>
                    <span><a href="<?=$url->site_url('user?type='.$user['type']);?>"><?php echo ucfirst($user['type']);?></a></span>
                </div>                <div class="form-group">
                    <label>Username:</label>
                    <span><?php echo $user['username'];?></span>
                </div>                
                <div class="form-group">
                    <label>Display name:</label>
                    <span><?php echo $user['display_name'];?></span>
                </div>                <div class="form-group">
                    <label>Email:</label>
                    <span><?php echo $user['email'];?></span>
                </div>                <div class="form-group">
                    <label>Created:</label>
                    <span><?php echo $user['created'];?></span>
                </div>                <div class="form-group">
                    <label>Updated:</label>
                    <span><?php echo $user['updated'];?></span>
                </div>                <div class="form-group">
                    <label>Active:</label>
                    <span><?php if($user['active']){ echo '<span style="color:green;">Yes</span>';}else{echo '<span style="color:red;">No</span>';} ?></span>
                </div>                <div class="form-group">
                    <label>Banned:</label>
                    <span><?php if($user['banned']){ echo '<span style="color:red;">Yes</span>';}else{echo '<span style="color:green;">No</span>';} ?></span>
                </div>            <a href="<?php echo $url->site_url('user/edit/'.$user['_id']); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a href="<?php echo $url->site_url('user/delete/'.$user['_id']); ?>" onclick="return confirm('are you sure to delete')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
            <a href="<?php echo $url->site_url('user') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
        </div>

    </body>
</html>