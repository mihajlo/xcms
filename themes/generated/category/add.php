<!DOCTYPE html>
<html lang="en">
    <head>
        <title>category</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">

            <h2>Add category</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('category/add') ?>" ><div class="form-group">
                    <label for="name">Category name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo @$_POST['name'];?>">
                </div><div class="form-group">
                    <label for="active">Active:</label>
                    <select class="form-control" name="active" id="active">
                        <option value="1" <?php if(@$_POST['active']){echo 'selected="selected"';}?>>Yes</option>
                        <option value="0" <?php if(!@$_POST['active']){echo 'selected="selected"';}?>>No</option>
                    </select>
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Insert</button>
                <a href="<?php echo $url->site_url('category') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>