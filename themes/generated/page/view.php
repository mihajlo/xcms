<!DOCTYPE html>
<html lang="en">
    <head>
        <title>page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">
            <h2>Page details</h2> 
                
                            <div class="form-group">
                    <label>parent:</label>
                    <span><?php echo $page['parent'];?></span>
                </div>                <div class="form-group">
                    <label>alias:</label>
                    <span><?php echo $page['alias'];?></span>
                </div>                <div class="form-group">
                    <label>title:</label>
                    <span><?php echo $page['title'];?></span>
                </div>                <div class="form-group">
                    <label>description:</label>
                    <span><?php echo $page['description'];?></span>
                </div>                <div class="form-group">
                    <label>body:</label>
                    <span><?php echo $page['body'];?></span>
                </div>                <div class="form-group">
                    <label>photo:</label>
                    <span><?php echo $page['photo'];?></span>
                </div>                <div class="form-group">
                    <label>private:</label>
                    <span><?php echo $page['private'];?></span>
                </div>                <div class="form-group">
                    <label>created:</label>
                    <span><?php echo $page['created'];?></span>
                </div>                <div class="form-group">
                    <label>updated:</label>
                    <span><?php echo $page['updated'];?></span>
                </div>                <div class="form-group">
                    <label>active:</label>
                    <span><?php echo $page['active'];?></span>
                </div>            <a href="<?php echo $url->site_url('page/edit/'.$page['_id']); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a href="<?php echo $url->site_url('page/delete/'.$page['_id']); ?>" onclick="return confirm('are you sure to delete')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
            <a href="<?php echo $url->site_url('page') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
        </div>

    </body>
</html>