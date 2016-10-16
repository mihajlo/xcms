<!DOCTYPE html>
<html lang="en">
    <head>
        <title>post</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">
            <h2>View post</h2> 
                
                            <div class="form-group">
                    <label>user_id:</label>
                    <span><?php echo $post['user_id'];?></span>
                </div>                <div class="form-group">
                    <label>alias:</label>
                    <span><?php echo $post['alias'];?></span>
                </div>                <div class="form-group">
                    <label>title:</label>
                    <span><?php echo $post['title'];?></span>
                </div>                <div class="form-group">
                    <label>description:</label>
                    <span><?php echo $post['description'];?></span>
                </div>                <div class="form-group">
                    <label>body:</label>
                    <span><?php echo $post['body'];?></span>
                </div>                <div class="form-group">
                    <label>categories:</label>
                    <span><?php echo $post['categories'];?></span>
                </div>                <div class="form-group">
                    <label>tags:</label>
                    <span><?php echo $post['tags'];?></span>
                </div>                <div class="form-group">
                    <label>comments_active:</label>
                    <span><?php echo $post['comments_active'];?></span>
                </div>                <div class="form-group">
                    <label>created:</label>
                    <span><?php echo $post['created'];?></span>
                </div>                <div class="form-group">
                    <label>updated:</label>
                    <span><?php echo $post['updated'];?></span>
                </div>                <div class="form-group">
                    <label>photo:</label>
                    <span><?php echo $post['photo'];?></span>
                </div>            <a href="<?php echo $url->site_url('post/edit/'.$post['_id']); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a href="<?php echo $url->site_url('post/delete/'.$post['_id']); ?>" onclick="return confirm('are you sure to delete')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
            <a href="<?php echo $url->site_url('post') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
        </div>

    </body>
</html>