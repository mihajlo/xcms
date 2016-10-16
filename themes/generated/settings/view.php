<!DOCTYPE html>
<html lang="en">
    <head>
        <title>settings</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">
            <h2>View settings</h2> 
                
                            <div class="form-group">
                    <label>site_name:</label>
                    <span><?php echo $settings['site_name'];?></span>
                </div>                <div class="form-group">
                    <label>site_slogan:</label>
                    <span><?php echo $settings['site_slogan'];?></span>
                </div>                <div class="form-group">
                    <label>copyright:</label>
                    <span><?php echo $settings['copyright'];?></span>
                </div>                <div class="form-group">
                    <label>active:</label>
                    <span><?php echo $settings['active'];?></span>
                </div>            <a href="<?php echo $url->site_url('settings/edit/'.$settings['_id']); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a href="<?php echo $url->site_url('settings/delete/'.$settings['_id']); ?>" onclick="return confirm('are you sure to delete')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
            <a href="<?php echo $url->site_url('settings') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
        </div>

    </body>
</html>