<!DOCTYPE html>
<html lang="en">
    <head>
        <title>settings</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">

            <h2>Edit settings</h2>  
            <?php if($action_msg){?>
            <div class="alert alert-success">
                <?php echo $action_msg;?>
            </div>
            <?php }?>
            <form role="form" method="post" action="<?php echo $url->site_url('settings/edit/site') ?>" >                
                <div class="form-group">
                    <label for="site_name">Site name:</label>
                    <input type="text" class="form-control" id="site_name" name="site_name" value="<?php if(isset($_POST['site_name'])){ echo @$_POST['site_name'];} else{ echo $settings['site_name'];}?>">
                </div>                
                <div class="form-group">
                    <label for="site_slogan">Site slogan:</label>
                    <input type="text" class="form-control" id="site_slogan" name="site_slogan" value="<?php if(isset($_POST['site_slogan'])){ echo @$_POST['site_slogan'];} else{ echo $settings['site_slogan'];}?>">
                </div>                
                <div class="form-group">
                    <label for="copyright">Copyright:</label>
                    <input type="text" class="form-control" id="copyright" name="copyright" value="<?php if(isset($_POST['copyright'])){ echo @$_POST['copyright'];} else{ echo $settings['copyright'];}?>">
                </div>                
                <div class="form-group">
                    <label for="active">Status:</label>
                    <select class="form-control" id="active" name="active">
                        <option value="development" <?php if($settings['active']=='development'){echo 'selected="selected"';} ?>>Development</option>
                        <option value="production" <?php if($settings['active']=='production'){echo 'selected="production"';} ?>>Production</option>
                    </select>
                    
                </div>                
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('settings') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>