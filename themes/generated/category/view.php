<!DOCTYPE html>
<html lang="en">
    <head>
        <title>category</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">
            <h2>View category</h2> 
                
                            <div class="form-group">
                    <label>name:</label>
                    <span><?php echo $category['name'];?></span>
                </div>                <div class="form-group">
                    <label>active:</label>
                    <span><?php echo $category['active'];?></span>
                </div>            <a href="<?php echo $url->site_url('category/edit/'.$category['_id']); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a href="<?php echo $url->site_url('category/delete/'.$category['_id']); ?>" onclick="return confirm('are you sure to delete')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
            <a href="<?php echo $url->site_url('category') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
        </div>

    </body>
</html>