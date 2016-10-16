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

            <h2>Edit page</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('page/edit/'.$page['_id']) ?>" >                <div class="form-group">
                    <label for="parent">parent:</label>
                    <input type="text" class="form-control" id="parent" name="parent" value="<?php if(isset($_POST['parent'])){ echo @$_POST['parent'];} else{ echo $page['parent'];}?>">
                </div>                <div class="form-group">
                    <label for="alias">alias:</label>
                    <input type="text" class="form-control" id="alias" name="alias" value="<?php if(isset($_POST['alias'])){ echo @$_POST['alias'];} else{ echo $page['alias'];}?>">
                </div>                <div class="form-group">
                    <label for="title">title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php if(isset($_POST['title'])){ echo @$_POST['title'];} else{ echo $page['title'];}?>">
                </div>                <div class="form-group">
                    <label for="description">description:</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?php if(isset($_POST['description'])){ echo @$_POST['description'];} else{ echo $page['description'];}?>">
                </div>                <div class="form-group">
                    <label for="body">body:</label>
                    <input type="text" class="form-control" id="body" name="body" value="<?php if(isset($_POST['body'])){ echo @$_POST['body'];} else{ echo $page['body'];}?>">
                </div>                <div class="form-group">
                    <label for="photo">photo:</label>
                    <input type="text" class="form-control" id="photo" name="photo" value="<?php if(isset($_POST['photo'])){ echo @$_POST['photo'];} else{ echo $page['photo'];}?>">
                </div>                <div class="form-group">
                    <label for="private">private:</label>
                    <input type="text" class="form-control" id="private" name="private" value="<?php if(isset($_POST['private'])){ echo @$_POST['private'];} else{ echo $page['private'];}?>">
                </div>                <div class="form-group">
                    <label for="created">created:</label>
                    <input type="text" class="form-control" id="created" name="created" value="<?php if(isset($_POST['created'])){ echo @$_POST['created'];} else{ echo $page['created'];}?>">
                </div>                <div class="form-group">
                    <label for="updated">updated:</label>
                    <input type="text" class="form-control" id="updated" name="updated" value="<?php if(isset($_POST['updated'])){ echo @$_POST['updated'];} else{ echo $page['updated'];}?>">
                </div>                <div class="form-group">
                    <label for="active">active:</label>
                    <input type="text" class="form-control" id="active" name="active" value="<?php if(isset($_POST['active'])){ echo @$_POST['active'];} else{ echo $page['active'];}?>">
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('page') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>