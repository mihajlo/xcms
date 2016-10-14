<!DOCTYPE html>
<html lang="en">
    <head>
        <title>menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">

            <h2>Add menu</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('menu/add') ?>" ><div class="form-group">
                    <label for="parent">parent:</label>
                    <input type="text" class="form-control" id="parent" name="parent" value="<?php echo @$_POST['parent'];?>">
                </div><div class="form-group">
                    <label for="url">url:</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?php echo @$_POST['url'];?>">
                </div><div class="form-group">
                    <label for="name">name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo @$_POST['name'];?>">
                </div><div class="form-group">
                    <label for="target">target:</label>
                    <input type="text" class="form-control" id="target" name="target" value="<?php echo @$_POST['target'];?>">
                </div><div class="form-group">
                    <label for="private">private:</label>
                    <input type="text" class="form-control" id="private" name="private" value="<?php echo @$_POST['private'];?>">
                </div><div class="form-group">
                    <label for="order">order:</label>
                    <input type="text" class="form-control" id="order" name="order" value="<?php echo @$_POST['order'];?>">
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Insert</button>
                <a href="<?php echo $url->site_url('menu') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>