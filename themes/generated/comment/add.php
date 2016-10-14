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

            <h2>Add comment</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('comment/add') ?>" ><div class="form-group">
                    <label for="user_id">user_id:</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo @$_POST['user_id'];?>">
                </div><div class="form-group">
                    <label for="url">url:</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?php echo @$_POST['url'];?>">
                </div><div class="form-group">
                    <label for="comment">comment:</label>
                    <input type="text" class="form-control" id="comment" name="comment" value="<?php echo @$_POST['comment'];?>">
                </div><div class="form-group">
                    <label for="created">created:</label>
                    <input type="text" class="form-control" id="created" name="created" value="<?php echo @$_POST['created'];?>">
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Insert</button>
                <a href="<?php echo $url->site_url('comment') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>