<!DOCTYPE html>
<html lang="en">
    <head>
        <title>post</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">

            <h2>Add post</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('post/add') ?>" ><div class="form-group">
                    <label for="user_id">user_id:</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo @$_POST['user_id'];?>">
                </div><div class="form-group">
                    <label for="alias">alias:</label>
                    <input type="text" class="form-control" id="alias" name="alias" value="<?php echo @$_POST['alias'];?>">
                </div><div class="form-group">
                    <label for="title">title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo @$_POST['title'];?>">
                </div><div class="form-group">
                    <label for="description">description:</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?php echo @$_POST['description'];?>">
                </div><div class="form-group">
                    <label for="body">body:</label>
                    <input type="text" class="form-control" id="body" name="body" value="<?php echo @$_POST['body'];?>">
                </div><div class="form-group">
                    <label for="categories">categories:</label>
                    <input type="text" class="form-control" id="categories" name="categories" value="<?php echo @$_POST['categories'];?>">
                </div><div class="form-group">
                    <label for="tags">tags:</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="<?php echo @$_POST['tags'];?>">
                </div><div class="form-group">
                    <label for="comments_active">comments_active:</label>
                    <input type="text" class="form-control" id="comments_active" name="comments_active" value="<?php echo @$_POST['comments_active'];?>">
                </div><div class="form-group">
                    <label for="created">created:</label>
                    <input type="text" class="form-control" id="created" name="created" value="<?php echo @$_POST['created'];?>">
                </div><div class="form-group">
                    <label for="updated">updated:</label>
                    <input type="text" class="form-control" id="updated" name="updated" value="<?php echo @$_POST['updated'];?>">
                </div><div class="form-group">
                    <label for="photo">photo:</label>
                    <input type="text" class="form-control" id="photo" name="photo" value="<?php echo @$_POST['photo'];?>">
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Insert</button>
                <a href="<?php echo $url->site_url('post') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>