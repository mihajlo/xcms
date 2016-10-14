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
            <h2>View user</h2> 
                
                            <div class="form-group">
                    <label>type:</label>
                    <span><?php echo $user['type'];?></span>
                </div>                <div class="form-group">
                    <label>username:</label>
                    <span><?php echo $user['username'];?></span>
                </div>                <div class="form-group">
                    <label>password:</label>
                    <span><?php echo $user['password'];?></span>
                </div>                <div class="form-group">
                    <label>display_name:</label>
                    <span><?php echo $user['display_name'];?></span>
                </div>                <div class="form-group">
                    <label>email:</label>
                    <span><?php echo $user['email'];?></span>
                </div>                <div class="form-group">
                    <label>created:</label>
                    <span><?php echo $user['created'];?></span>
                </div>                <div class="form-group">
                    <label>updated:</label>
                    <span><?php echo $user['updated'];?></span>
                </div>                <div class="form-group">
                    <label>active:</label>
                    <span><?php echo $user['active'];?></span>
                </div>                <div class="form-group">
                    <label>banned:</label>
                    <span><?php echo $user['banned'];?></span>
                </div>            <a href="<?php echo $url->site_url('user/edit/'.$user['_id']); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a href="<?php echo $url->site_url('user/delete/'.$user['_id']); ?>" onclick="return confirm('are you sure to delete')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
            <a href="<?php echo $url->site_url('user') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
        </div>

    </body>
</html>