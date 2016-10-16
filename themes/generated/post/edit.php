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

            <h2>Edit post</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('post/edit/'.$post['_id']) ?>" >                <div class="form-group">
                    <label for="user_id">user_id:</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php if(isset($_POST['user_id'])){ echo @$_POST['user_id'];} else{ echo $post['user_id'];}?>">
                </div>                <div class="form-group">
                    <label for="alias">alias:</label>
                    <input type="text" class="form-control" id="alias" name="alias" value="<?php if(isset($_POST['alias'])){ echo @$_POST['alias'];} else{ echo $post['alias'];}?>">
                </div>                <div class="form-group">
                    <label for="title">title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php if(isset($_POST['title'])){ echo @$_POST['title'];} else{ echo $post['title'];}?>">
                </div>                <div class="form-group">
                    <label for="description">description:</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?php if(isset($_POST['description'])){ echo @$_POST['description'];} else{ echo $post['description'];}?>">
                </div>                <div class="form-group">
                    <label for="body">body:</label>
                    <input type="text" class="form-control" id="body" name="body" value="<?php if(isset($_POST['body'])){ echo @$_POST['body'];} else{ echo $post['body'];}?>">
                </div>                <div class="form-group">
                    <label for="categories">categories:</label>
                    <input type="text" class="form-control" id="categories" name="categories" value="<?php if(isset($_POST['categories'])){ echo @$_POST['categories'];} else{ echo $post['categories'];}?>">
                </div>                <div class="form-group">
                    <label for="tags">tags:</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="<?php if(isset($_POST['tags'])){ echo @$_POST['tags'];} else{ echo $post['tags'];}?>">
                </div>                <div class="form-group">
                    <label for="comments_active">comments_active:</label>
                    <input type="text" class="form-control" id="comments_active" name="comments_active" value="<?php if(isset($_POST['comments_active'])){ echo @$_POST['comments_active'];} else{ echo $post['comments_active'];}?>">
                </div>                <div class="form-group">
                    <label for="created">created:</label>
                    <input type="text" class="form-control" id="created" name="created" value="<?php if(isset($_POST['created'])){ echo @$_POST['created'];} else{ echo $post['created'];}?>">
                </div>                <div class="form-group">
                    <label for="updated">updated:</label>
                    <input type="text" class="form-control" id="updated" name="updated" value="<?php if(isset($_POST['updated'])){ echo @$_POST['updated'];} else{ echo $post['updated'];}?>">
                </div>                <div class="form-group">
                    <label for="photo">photo:</label>
                    <input type="text" class="form-control" id="photo" name="photo" value="<?php if(isset($_POST['photo'])){ echo @$_POST['photo'];} else{ echo $post['photo'];}?>">
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('post') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>