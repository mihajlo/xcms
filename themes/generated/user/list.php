<!DOCTYPE html>
<html lang="en">
    <head>
        <title>user</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <?php echo $jquery->load('1.12.4');?>
        <script>
          $(document).ready(function() {
            $('#user_results').DataTable();
            } );
        </script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">
            <h2>Manage users</h2>
            <hr>
            
            <div class="row">
                <div class="col-sm-12">
                    <h4>Filter users</h4>
                    <form id="filter_search" class="form-inline" action="<?php echo $url->site_url('user');?>" method="get">
                                                 <input type="search" class="filterItem form-control" name="type" value="<?php echo @$_GET['type'];?>" placeholder="Search type">
                                                     <input type="search" class="filterItem form-control" name="username" value="<?php echo @$_GET['username'];?>" placeholder="Search username">
                                                     <input type="search" class="filterItem form-control" name="display_name" value="<?php echo @$_GET['display_name'];?>" placeholder="Search display name">
                                                     <input type="search" class="filterItem form-control" name="email" value="<?php echo @$_GET['email'];?>" placeholder="Search email">
                                                     
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button> <a href="<?php echo $url->site_url('user') ?>" class="btn btn-default"><span class="glyphicon glyphicon-erase"></span> Clear filters</a>
                    </form>
                </div>
            </div>
            
            <hr>
            <a href="<?php echo $url->site_url('user/add'); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add user</a>
            <a href="<?php echo $url->site_url('user') ?>" class="btn btn-default btn-sm pull-right"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            <hr>
            
            
            <?php if ($action_msg) { ?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $action_msg; ?></strong>
                </div>
            <?php } ?>

            <?php if (count($users) > 0) { ?>

                <table class="table table-striped" id="user_results">
                    <thead>
                        
                        
                        <tr>
                            <th>_id</th>
                                                        
                            <th>User type</th>                            
                            <th>Username</th>                            
                            <th>Display name</th>                            
                            <th>Email</th>                          
                            <th>Is active?</th>                            
                            <th>Is banned?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user['_id']; ?></td>
                                                                
                                <td><a href="<?=$url->site_url('user?type='.$user['type']);?>"><?php echo $user['type']; ?></a></td>                            
                                <td><?php echo $user['username']; ?></td>                          
                                <td><?php echo $user['display_name']; ?></td>                            
                                <td><?php echo $user['email']; ?></td>                          
                                <td><?php if($user['active']){ echo '<span style="color:green;">Yes</span>';}else{echo '<span style="color:red;">No</span>';} ?></td>                            
                                <td><?php if($user['banned']){ echo '<span style="color:red;">Yes</span>';}else{echo '<span style="color:green;">No</span>';} ?></td>

                                <td>
                                    <a href="<?php echo $url->site_url('user/view/' . $user['_id']); ?>"  class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                    <a href="<?php echo $url->site_url('user/edit/' . $user['_id']); ?>"  class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo $url->site_url('user/delete/' . $user['_id']); ?>"  class="btn btn-danger btn-xs" onclick="return confirm('are you sure to delete')"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-info" role="alert">
                    <strong>No users Found!</strong>
                </div>
            <?php } ?>

        </div>
<br>
<br>
    </body>
</html>