<!DOCTYPE html>
<html lang="en">
    <head>
        <title>menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">
            <h2>View menu</h2> 
                
                            <div class="form-group">
                    <label>parent:</label>
                    <span><?php echo $menu['parent'];?></span>
                </div>                <div class="form-group">
                    <label>url:</label>
                    <span><?php echo $menu['url'];?></span>
                </div>                <div class="form-group">
                    <label>name:</label>
                    <span><?php echo $menu['name'];?></span>
                </div>                <div class="form-group">
                    <label>target:</label>
                    <span><?php echo $menu['target'];?></span>
                </div>                <div class="form-group">
                    <label>private:</label>
                    <span><?php echo $menu['private'];?></span>
                </div>                <div class="form-group">
                    <label>order:</label>
                    <span><?php echo $menu['order'];?></span>
                </div>            <a href="<?php echo $url->site_url('menu/edit/'.$menu['_id']); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a href="<?php echo $url->site_url('menu/delete/'.$menu['_id']); ?>" onclick="return confirm('are you sure to delete')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
            <a href="<?php echo $url->site_url('menu') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
        </div>

    </body>
</html>