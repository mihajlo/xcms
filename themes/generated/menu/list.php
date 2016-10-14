<!DOCTYPE html>
<html lang="en">
    <head>
        <title>menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <?php echo $jquery->load('1.12.4');?>
        <script>
          $(document).ready(function() {
            $('#menu_results').DataTable();
            } );
        </script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Manage menu</h2>
            <hr>
            
            <div class="row">
                <div class="col-sm-12">
                    <h4>Filter menus</h4>
                    <form id="filter_search" class="form-inline" action="<?php echo $url->site_url('menu');?>" method="get">
                                                 <input type="search" class="filterItem form-control" name="parent" value="<?php echo @$_GET['parent'];?>" placeholder="Search parent">
                                                     <input type="search" class="filterItem form-control" name="url" value="<?php echo @$_GET['url'];?>" placeholder="Search url">
                                                     <input type="search" class="filterItem form-control" name="name" value="<?php echo @$_GET['name'];?>" placeholder="Search name">
                                                     <input type="search" class="filterItem form-control" name="target" value="<?php echo @$_GET['target'];?>" placeholder="Search target">
                                                     <input type="search" class="filterItem form-control" name="private" value="<?php echo @$_GET['private'];?>" placeholder="Search private">
                                                     <input type="search" class="filterItem form-control" name="order" value="<?php echo @$_GET['order'];?>" placeholder="Search order">
                            
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button> <a href="<?php echo $url->site_url('menu') ?>" class="btn btn-default"><span class="glyphicon glyphicon-erase"></span> Clear filters</a>
                    </form>
                </div>
            </div>
            
            <hr>
            <a href="<?php echo $url->site_url('menu/add'); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add menu</a>
            <a href="<?php echo $url->site_url('menu') ?>" class="btn btn-default btn-sm pull-right"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            <hr>
            
            
            <?php if ($action_msg) { ?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $action_msg; ?></strong>
                </div>
            <?php } ?>

            <?php if (count($menus) > 0) { ?>

                <table class="table table-striped" id="menu_results">
                    <thead>
                        
                        
                        <tr>
                            <th>_id</th>
                                                        <th>parent</th>                            <th>url</th>                            <th>name</th>                            <th>target</th>                            <th>private</th>                            <th>order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menus as $menu) { ?>
                            <tr>
                                <td><?php echo $menu['_id']; ?></td>
                                                                <td><?php echo $menu['parent']; ?></td>                            <td><?php echo $menu['url']; ?></td>                            <td><?php echo $menu['name']; ?></td>                            <td><?php echo $menu['target']; ?></td>                            <td><?php echo $menu['private']; ?></td>                            <td><?php echo $menu['order']; ?></td>

                                <td>
                                    <a href="<?php echo $url->site_url('menu/view/' . $menu['_id']); ?>"  class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                    <a href="<?php echo $url->site_url('menu/edit/' . $menu['_id']); ?>"  class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo $url->site_url('menu/delete/' . $menu['_id']); ?>"  class="btn btn-danger btn-xs" onclick="return confirm('are you sure to delete')"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-info" role="alert">
                    <strong>No menus Found!</strong>
                </div>
            <?php } ?>

        </div>
<br>
<br>
    </body>
</html>