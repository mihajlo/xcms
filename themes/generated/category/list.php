<!DOCTYPE html>
<html lang="en">
    <head>
        <title>category</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <?php echo $jquery->load('1.12.4');?>
        <script>
          $(document).ready(function() {
            $('#category_results').DataTable();
            } );
        </script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    </head>
    <body>
    <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">
            <h2>Categories</h2>
            <hr>
            
            <div class="row">
                <div class="col-sm-12">
                    <h4>Filter categories</h4>
                    <form id="filter_search" class="form-inline" action="<?php echo $url->site_url('category');?>" method="get">
                                                 <input type="search" class="filterItem form-control" name="name" value="<?php echo @$_GET['name'];?>" placeholder="Search name">
                                                     <input type="search" class="filterItem form-control" name="active" value="<?php echo @$_GET['active'];?>" placeholder="Search active">
                            
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button> <a href="<?php echo $url->site_url('category') ?>" class="btn btn-default"><span class="glyphicon glyphicon-erase"></span> Clear filters</a>
                    </form>
                </div>
            </div>
            
            <hr>
            <a href="<?php echo $url->site_url('category/add'); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add category</a>
            <a href="<?php echo $url->site_url('category') ?>" class="btn btn-default btn-sm pull-right"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            <hr>
            
            
            <?php if ($action_msg) { ?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $action_msg; ?></strong>
                </div>
            <?php } ?>

            <?php if (count($categorys) > 0) { ?>

                <table class="table table-striped" id="category_results">
                    <thead>
                        
                        
                        <tr>
                            <th>_id</th>
                                                        <th>Category name</th>                            <th>Is active?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorys as $category) { ?>
                            <tr>
                                <td><?php echo $category['_id']; ?></td>
                                <td><?php echo $category['name']; ?></td>                            
                                <td><?php if($category['active']){echo '<span style="color:green;">Yes</span>'; }else{ echo '<span style="color:red;">No</span>';} ?></td>

                                <td>
                                    <a href="<?php echo $url->site_url('category/view/' . $category['_id']); ?>"  class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                    <a href="<?php echo $url->site_url('category/edit/' . $category['_id']); ?>"  class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo $url->site_url('category/delete/' . $category['_id']); ?>"  class="btn btn-danger btn-xs" onclick="return confirm('are you sure to delete')"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-info" role="alert">
                    <strong>No categorys Found!</strong>
                </div>
            <?php } ?>

        </div>
<br>
<br>
    </body>
</html>