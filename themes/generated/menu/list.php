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
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">
            <h2>Manage menu</h2>
            <hr>
            
            <div class="row">
                <div class="col-sm-12">
                    <h4>Filter menus</h4>
                    <form id="filter_search" class="form-inline" action="<?php echo $url->site_url('menu');?>" method="get">
                                                     <input type="search" class="filterItem form-control" name="name" value="<?php echo @$_GET['name'];?>" placeholder="Search in Menu Item">
                                                     <input type="search" class="filterItem form-control" name="url" value="<?php echo @$_GET['url'];?>" placeholder="Search in URL">
                                                     
                            
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
                            <th>Menu item</th>                           
                            <th>URL</th>                             
                            <th>Target</th>                            
                            <th>Private</th>                            
                            <th>Order score</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menus as $menu) { ?>
                            <tr>
                                <td><?php echo $menu['_id']; ?></td>                        
                                <td><?php if($menu['parent']){echo $menu['parent']['name'].'<br>&nbsp; &raquo; '.$menu['name'];}else{echo $menu['name'];} ?></td>                           
                                <td><a href="<?php echo $menu['url']; ?>" target="_blank"><?php echo $menu['url']; ?></a></td>                            
                                <td><?php echo $menu['target']; ?></td>                            
                                <td><?php if($menu['private']){echo '<span style="color:orange;">Private</span>';}else{echo '<span style="color:blue;">Public</span>';}; ?></td>                            
                                <td><?php echo $menu['order']; ?></td>

                                <td>
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