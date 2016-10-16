<!DOCTYPE html>
<html lang="en">
    <head>
        <title>comment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <?php echo $jquery->load('1.12.4');?>
        <script>
          $(document).ready(function() {
            $('#comment_results').DataTable();
            } );
        </script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">
            <h2>Comments</h2>
            <hr>
            
            <div class="row">
                <div class="col-sm-12">
                    <h4>Filter comments</h4>
                    <form id="filter_search" class="form-inline" action="<?php echo $url->site_url('comment');?>" method="get">
                                                     <input type="search" class="filterItem form-control" name="user_id" value="<?php echo @$_GET['user_id'];?>" placeholder="Search user_id">
                                                     <input type="search" class="filterItem form-control" name="url" value="<?php echo @$_GET['url'];?>" placeholder="Search url">
                                                     <input type="search" class="filterItem form-control" name="comment" value="<?php echo @$_GET['comment'];?>" placeholder="Search comment">
                                                     <input type="search" class="filterItem form-control" name="created" value="<?php echo @$_GET['created'];?>" placeholder="Search created">
                            
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button> <a href="<?php echo $url->site_url('comment') ?>" class="btn btn-default"><span class="glyphicon glyphicon-erase"></span> Clear filters</a>
                    </form>
                </div>
            </div>
            
            <hr>
           <a href="<?php echo $url->site_url('comment') ?>" class="btn btn-default btn-sm pull-right"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
           <br> <hr>
            
            
            <?php if ($action_msg) { ?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $action_msg; ?></strong>
                </div>
            <?php } ?>

            <?php if (count($comments) > 0) { ?>

                <table class="table table-striped" id="comment_results">
                    <thead>
                        
                        
                        <tr>
                            <th>_id</th>
                                                        <th>User</th>                            <th>URL</th>                            <th>Comment</th>                            <th>Date & time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $comment) { ?>
                            <tr>
                                <td><?php echo $comment['_id']; ?></td>
                                                                
                                <td><a href="<?=$url->site_url('comment?user_id='.$comment['user_id']['_id']);?>"><?php echo $comment['user_id']['display_name']; ?></a></td>                            
                                <td><a href="<?php echo $url->site_url('comment?url='.urlencode($comment['url'])); ?>"><?php echo $comment['url']; ?></a></td>                            
                                <td><?php echo substr($comment['comment'],0,50); ?> ...</td>                            
                                <td><?php echo $comment['created']; ?></td>

                                <td>
                                    <a href="<?php echo $url->site_url('comment/view/' . $comment['_id']); ?>"  class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                    <a href="<?php echo $url->site_url('comment/edit/' . $comment['_id']); ?>"  class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo $url->site_url('comment/delete/' . $comment['_id']); ?>"  class="btn btn-danger btn-xs" onclick="return confirm('are you sure to delete')"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-info" role="alert">
                    <strong>No comments Found!</strong>
                </div>
            <?php } ?>

        </div>
<br>
<br>
    </body>
</html>