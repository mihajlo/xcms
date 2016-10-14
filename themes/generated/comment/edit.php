<!DOCTYPE html>
<html lang="en">
    <head>
        <title>comment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">

            <h2>Edit comment</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('comment/edit/'.$comment['_id']) ?>" >                <div class="form-group">
                    <label for="user_id">user_id:</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php if(isset($_POST['user_id'])){ echo @$_POST['user_id'];} else{ echo $comment['user_id'];}?>">
                </div>                <div class="form-group">
                    <label for="url">url:</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?php if(isset($_POST['url'])){ echo @$_POST['url'];} else{ echo $comment['url'];}?>">
                </div>                <div class="form-group">
                    <label for="comment">comment:</label>
                    <input type="text" class="form-control" id="comment" name="comment" value="<?php if(isset($_POST['comment'])){ echo @$_POST['comment'];} else{ echo $comment['comment'];}?>">
                </div>                <div class="form-group">
                    <label for="created">created:</label>
                    <input type="text" class="form-control" id="created" name="created" value="<?php if(isset($_POST['created'])){ echo @$_POST['created'];} else{ echo $comment['created'];}?>">
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('comment') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>