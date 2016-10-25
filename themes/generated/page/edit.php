<!DOCTYPE html>
<html lang="en">
    <head>
        <title>page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $jquery->load('1.12.4');?>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script>
        
        function check_fields(inputValue){
            $('.form-group').show();
            if(inputValue=='post'){
                $('.parent_container').hide();
                $('.private_container').hide();
                $('.active_container').hide();
            }
            if(inputValue=='page'){
                $('.categories_container').hide();
                $('.tags_container').hide();
                $('.comments_allowed_container').hide();
            }
        }
        
        
        $(document).on('ready',function(){
            
            $('#categories').select2();
            $("#tags").select2({
                tags: true,
                tokenSeparators: [',', ' ','    ']
            });
            
            check_fields($('#type').val());
            
            $('#type').on('change',function(){
                check_fields($(this).val());
            });
            
        });
        </script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ 
            selector:'#body',
            plugins : 'autolink link image,imagetools, lists, code, media',
            content_style: "div, p { font-size: 14px; }",
            imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions"
        });</script>
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
            <form role="form" method="post" action="<?php echo $url->site_url('page/edit/'.$page['_id']) ?>" >                
                <div class="form-group">
                    <label for="parent">Page type:</label>
                    <select name="type" id="type" class="form-control">
                        <?php foreach($config['page_types'] as $p_key=>$p_value){?>
                        <option value="<?=$p_key;?>" <?php if($p_key==$page['type']){echo 'selected="selected"';} ?>><?=$p_value;?></option>
                        <?php }?>
                    </select>
                </div>
                
                <div class="form-group parent_container">
                    <label for="parent">Parent page:</label>
                    <select name="parent" class="form-control">
                        <option value="">- no parent -</option>
                        <?php foreach($parents as $parent){ if($parent['_id']!=$page['_id']){?>
                        <option value="<?=$parent['_id'];?>" <?php if($page['parent']==$parent['_id']){ echo 'selected="selected"';}?>><?=$parent['title'].' ('.$parent['alias'].')';?></option>
                        <?php }}?>
                    </select>
                </div>
                <div class="form-group categories_container">
                    <label for="categories">Categories:</label>
                    <select multiple name="categories[]" id="categories" class="form-control">
                        <?php foreach($categories as $cat){?>
                        <option value="<?=$cat['_id'];?>" <?php if(in_array($cat['_id'],explode(',',$page['categories']))){echo 'selected="selected"';} ?>><?=$cat['name'];?></option>
                        <?php }?>
                    </select>
                    
                </div>
                <div class="form-group tags_container">
                    <label for="tags">Tags:</label>
                    <select multiple name="tags[]" id="tags" class="form-control">
                        <?php foreach($tags as $tag){?>
                        <option value="<?=$tag['name'];?>" <?php if(in_array($tag['name'],explode(',',$page['tags']))){echo 'selected="selected"';} ?>><?=$tag['name'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" onkeyup="document.getElementById('alias').value=this.value.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');" id="title" name="title" value="<?php if(isset($_POST['title'])){echo @$_POST['title'];}else{echo $page['title'];}?>">
                </div>
                <div class="form-group">
                    <label for="alias">Alias:</label>
                    <input type="text" class="form-control" id="alias" readonly="readonly" value="<?php echo $page['alias'];?>">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" ><?php if(isset($_POST['description'])){echo @$_POST['description'];}else{echo $page['description'];}?></textarea>
                </div><div class="form-group">
                    <label for="body">Body (content):</label> <label class="pull-right btn-sm btn-info">Insert new image <input style="display:none;" placeholder="Insert image" type="file" id="insertImage" /></label>
                    <script>
                    document.getElementById('insertImage').addEventListener('change', function(e){
                        var reader = new FileReader();
                        var file=e.target.files[0];
                        var ftype=String(file.type).split('/')[0];
                        //console.log(file);
                        reader.addEventListener("load", function () {
                            if(ftype=='image'){
                                tinyMCE.execCommand('mceInsertContent', false, '<p><img  width="50%" src="'+reader.result+'"/></p>');
                                $('#insertImage').val('');
                            }
                            else{
                                alert('Only images are allowed!');
                            }
                        }, false);
                        if (file) {
                         reader.readAsDataURL(file);
                        }

                     }, false);
                    </script>
                    <textarea rows="15" class="form-control" id="body" name="body" ><?php if(isset($_POST['body'])){echo @$_POST['body'];}else{echo $page['body'];}?></textarea>
                </div><div class="form-group">
                    <label for="photo">Main photo:</label>
                    <input type="file" class="form-control" id="photou">
                    <script>
                    document.getElementById('photou').addEventListener('change', function(e){
                        var reader = new FileReader();
                        var file=e.target.files[0];
                        var ftype=String(file.type).split('/')[0];
                        //console.log(file);
                        reader.addEventListener("load", function () {
                            if(ftype=='image'){
                                document.getElementById('photo').value=reader.result;
                                document.getElementById('preview').src=reader.result;
                                document.getElementById('preview').style.display='block';
                            }
                            else{
                                alert('Only images are allowed!');
                            }
                        }, false);
                        if (file) {
                         reader.readAsDataURL(file);
                        }

                     }, false);
                     </script><br>
                    <img src="" id="preview" width="220" style="border: 1px solid #CCC; display: none;">
                    <input type="hidden" class="form-control" id="photo" name="photo" value="<?php  if(isset($_POST['photo'])){echo @$_POST['photo'];}else{echo $page['photo'];}?>">
                    <script>
                    if(document.getElementById('photo').value){
                        document.getElementById('preview').src=document.getElementById('photo').value;
                        document.getElementById('preview').style.display='block';
                    }
                    </script>
                </div>
                <div class="form-group comments_allowed_container">
                    <label for="comments">Comments allowed:</label>
                        <select class="form-control" id="comments_allowed" name="comments_allowed">
                            <option value="1">Yes</option>
                            <option value="0" <?php if($page['comments_allowed']){}else{echo 'selected="selected"';}?>>No</option>
                    </select>
                    
                </div>
                <div class="form-group private_container">
                    <label for="private">Private page:</label>
                        <select class="form-control" id="private" name="private">
                            <option value="0">No</option>
                            <option value="1" <?php if($page['private']){echo 'selected="selected"';}?>>Yes</option>
                    </select>
                    
                </div>
                <div class="form-group active_container">
                    <label for="active">Active:</label>
                    <select class="form-control" id="active" name="active">
                            <option value="1">Yes</option>
                            <option value="0" <?php if(isset($page['active']) && !$page['active']){echo 'selected="selected"';}?>>No</option>
                    </select>
                </div>                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
                <a href="<?php echo $url->site_url('page') ?>" class="btn btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</a>
            </form>
        </div>

    </body>
</html>