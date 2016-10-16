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

            <h2>Edit comment</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-danger">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('comment/edit/'.$comment['_id']) ?>" >                
                <div class="form-group">
                    <label for="url">URL:</label><br>
                    <strong><a href="<?php echo $comment['url'];?>" target="_blank"><?php echo $comment['url'];?></a></strong>
                </div>  
                <div class="form-group">
                    <label for="user_id">User:</label>
                    <select class="form-control" name="user_id" id="user_id">
                        <?php foreach($users as $user){?>
                        <option value="<?=$user['_id'];?>" <?php if($comment['user_id']==$user['_id']){echo 'selected="selected"';}?>><?=$user['display_name'];?></option>
                        <?php }?>
                    </select>
                </div>                              <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea rows="7" class="form-control" id="comment" name="comment"><?php if(isset($_POST['comment'])){ echo @$_POST['comment'];} else{ echo $comment['comment'];}?></textarea>
                </div>                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('comment') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>