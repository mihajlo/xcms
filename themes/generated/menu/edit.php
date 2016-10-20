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
            <form role="form" method="post" action="<?php echo $url->site_url('menu/edit/'.$menu['_id']) ?>" >                
                <div class="form-group">
                    <label for="parent">Belong to menu item:</label>
                    <select class="form-control" id="parent" name="parent">
                        <option value="">- no parent -</option>
                        <?php foreach($menu_items as $item){?>
                        <option value="<?=$item['_id'];?>" <?php if($menu['parent']==$item['_id']){echo 'selected="selected"';}?>><?=$item['name'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Menu item name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $menu['name'];?>">
                </div>
                <div class="form-group">
                    <label for="url">URL:</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?php if($menu['url']){echo $menu['url'];}else{echo $url->site_url();}?>">
                </div>
                
                <div class="form-group">
                    <label for="target">Target:</label>
                    <input type="text" class="form-control" placeholder="example: _blank" id="target" name="target" value="<?php echo $menu['target'];?>">
                </div><div class="form-group">
                    <label for="private">Is private:</label>
                    <select class="form-control" id="private" name="private" >
                        <option value="0">No (It's public)</option>
                        <option value="1" <?php if($menu['private']){echo 'selected="selected"';}?>>Yes (Logged users only)</option>
                    </select>
                </div><div class="form-group">
                    <label for="order">Order score (highest - first):</label>
                    <input type="number" width="1" class="form-control" min="0" max="9999999" step="5" id="order" name="order" value="<?php echo $menu['order'];?>">
                </div>                 
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('menu') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>