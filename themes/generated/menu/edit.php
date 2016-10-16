<!DOCTYPE html>
<html lang="en">
    <head>
        <title>menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">

            <h2>Edit menu</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('menu/edit/'.$menu['_id']) ?>" >                <div class="form-group">
                    <label for="parent">parent:</label>
                    <input type="text" class="form-control" id="parent" name="parent" value="<?php if(isset($_POST['parent'])){ echo @$_POST['parent'];} else{ echo $menu['parent'];}?>">
                </div>                <div class="form-group">
                    <label for="url">url:</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?php if(isset($_POST['url'])){ echo @$_POST['url'];} else{ echo $menu['url'];}?>">
                </div>                <div class="form-group">
                    <label for="name">name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($_POST['name'])){ echo @$_POST['name'];} else{ echo $menu['name'];}?>">
                </div>                <div class="form-group">
                    <label for="target">target:</label>
                    <input type="text" class="form-control" id="target" name="target" value="<?php if(isset($_POST['target'])){ echo @$_POST['target'];} else{ echo $menu['target'];}?>">
                </div>                <div class="form-group">
                    <label for="private">private:</label>
                    <input type="text" class="form-control" id="private" name="private" value="<?php if(isset($_POST['private'])){ echo @$_POST['private'];} else{ echo $menu['private'];}?>">
                </div>                <div class="form-group">
                    <label for="order">order:</label>
                    <input type="text" class="form-control" id="order" name="order" value="<?php if(isset($_POST['order'])){ echo @$_POST['order'];} else{ echo $menu['order'];}?>">
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('menu') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>