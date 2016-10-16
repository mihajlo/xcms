<!DOCTYPE html>
<html lang="en">
    <head>
        <title>comment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">
            <h2>View comment</h2> 
                <div class="form-group">
                    <label><a href="<?=$url->site_url('comment?user_id='.$comment['user_id']['_id']);?>"><?php echo $comment['user_id']['display_name'];?></a> commented on <a href="<?php echo $comment['url'];?>" target="_blank"><?php echo $comment['url'];?></a></label><br>
                    <span><?php echo $comment['comment'];?></span>
                </div>      
                <div class="form-group">
                    <label>Date & time:</label>
                    <span><?php echo $comment['created'];?></span>
                </div>            <a href="<?php echo $url->site_url('comment/edit/'.$comment['_id']); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a href="<?php echo $url->site_url('comment/delete/'.$comment['_id']); ?>" onclick="return confirm('are you sure to delete')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>
            <a href="<?php echo $url->site_url('comment') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
        </div>

    </body>
</html>