<!DOCTYPE html>
<html lang="en">
    <head>
        <title>post</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <?php echo $jquery->load('1.12.4');?>
        <script>
          $(document).ready(function() {
            $('#post_results').DataTable();
            } );
        </script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Manage post</h2>
            <hr>
            
            <div class="row">
                <div class="col-sm-12">
                    <h4>Filter posts</h4>
                    <form id="filter_search" class="form-inline" action="<?php echo $url->site_url('post');?>" method="get">
                                                 <input type="search" class="filterItem form-control" name="user_id" value="<?php echo @$_GET['user_id'];?>" placeholder="Search user_id">
                                                     <input type="search" class="filterItem form-control" name="alias" value="<?php echo @$_GET['alias'];?>" placeholder="Search alias">
                                                     <input type="search" class="filterItem form-control" name="title" value="<?php echo @$_GET['title'];?>" placeholder="Search title">
                                                     <input type="search" class="filterItem form-control" name="description" value="<?php echo @$_GET['description'];?>" placeholder="Search description">
                                                     <input type="search" class="filterItem form-control" name="body" value="<?php echo @$_GET['body'];?>" placeholder="Search body">
                                                     <input type="search" class="filterItem form-control" name="categories" value="<?php echo @$_GET['categories'];?>" placeholder="Search categories">
                                                     <input type="search" class="filterItem form-control" name="tags" value="<?php echo @$_GET['tags'];?>" placeholder="Search tags">
                                                     <input type="search" class="filterItem form-control" name="comments_active" value="<?php echo @$_GET['comments_active'];?>" placeholder="Search comments_active">
                                                     <input type="search" class="filterItem form-control" name="created" value="<?php echo @$_GET['created'];?>" placeholder="Search created">
                                                     <input type="search" class="filterItem form-control" name="updated" value="<?php echo @$_GET['updated'];?>" placeholder="Search updated">
                                                     <input type="search" class="filterItem form-control" name="photo" value="<?php echo @$_GET['photo'];?>" placeholder="Search photo">
                            
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button> <a href="<?php echo $url->site_url('post') ?>" class="btn btn-default"><span class="glyphicon glyphicon-erase"></span> Clear filters</a>
                    </form>
                </div>
            </div>
            
            <hr>
            <a href="<?php echo $url->site_url('post/add'); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add post</a>
            <a href="<?php echo $url->site_url('post') ?>" class="btn btn-default btn-sm pull-right"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            <hr>
            
            
            <?php if ($action_msg) { ?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $action_msg; ?></strong>
                </div>
            <?php } ?>

            <?php if (count($posts) > 0) { ?>

                <table class="table table-striped" id="post_results">
                    <thead>
                        
                        
                        <tr>
                            <th>_id</th>
                                                        <th>user_id</th>                            <th>alias</th>                            <th>title</th>                            <th>description</th>                            <th>body</th>                            <th>categories</th>                            <th>tags</th>                            <th>comments_active</th>                            <th>created</th>                            <th>updated</th>                            <th>photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post) { ?>
                            <tr>
                                <td><?php echo $post['_id']; ?></td>
                                                                <td><?php echo $post['user_id']; ?></td>                            <td><?php echo $post['alias']; ?></td>                            <td><?php echo $post['title']; ?></td>                            <td><?php echo $post['description']; ?></td>                            <td><?php echo $post['body']; ?></td>                            <td><?php echo $post['categories']; ?></td>                            <td><?php echo $post['tags']; ?></td>                            <td><?php echo $post['comments_active']; ?></td>                            <td><?php echo $post['created']; ?></td>                            <td><?php echo $post['updated']; ?></td>                            <td><?php echo $post['photo']; ?></td>

                                <td>
                                    <a href="<?php echo $url->site_url('post/view/' . $post['_id']); ?>"  class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                    <a href="<?php echo $url->site_url('post/edit/' . $post['_id']); ?>"  class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo $url->site_url('post/delete/' . $post['_id']); ?>"  class="btn btn-danger btn-xs" onclick="return confirm('are you sure to delete')"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-info" role="alert">
                    <strong>No posts Found!</strong>
                </div>
            <?php } ?>

        </div>
<br>
<br>
    </body>
</html>