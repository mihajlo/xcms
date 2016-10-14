<!DOCTYPE html>
<html lang="en">
    <head>
        <title>settings</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <?php echo $jquery->load('1.12.4');?>
        <script>
          $(document).ready(function() {
            $('#settings_results').DataTable();
            } );
        </script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Manage settings</h2>
            <hr>
            
            <div class="row">
                <div class="col-sm-12">
                    <h4>Filter settingss</h4>
                    <form id="filter_search" class="form-inline" action="<?php echo $url->site_url('settings');?>" method="get">
                                                 <input type="search" class="filterItem form-control" name="site_name" value="<?php echo @$_GET['site_name'];?>" placeholder="Search site_name">
                                                     <input type="search" class="filterItem form-control" name="site_slogan" value="<?php echo @$_GET['site_slogan'];?>" placeholder="Search site_slogan">
                                                     <input type="search" class="filterItem form-control" name="copyright" value="<?php echo @$_GET['copyright'];?>" placeholder="Search copyright">
                                                     <input type="search" class="filterItem form-control" name="active" value="<?php echo @$_GET['active'];?>" placeholder="Search active">
                            
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button> <a href="<?php echo $url->site_url('settings') ?>" class="btn btn-default"><span class="glyphicon glyphicon-erase"></span> Clear filters</a>
                    </form>
                </div>
            </div>
            
            <hr>
            <a href="<?php echo $url->site_url('settings/add'); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add settings</a>
            <a href="<?php echo $url->site_url('settings') ?>" class="btn btn-default btn-sm pull-right"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            <hr>
            
            
            <?php if ($action_msg) { ?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $action_msg; ?></strong>
                </div>
            <?php } ?>

            <?php if (count($settingss) > 0) { ?>

                <table class="table table-striped" id="settings_results">
                    <thead>
                        
                        
                        <tr>
                            <th>_id</th>
                                                        <th>site_name</th>                            <th>site_slogan</th>                            <th>copyright</th>                            <th>active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($settingss as $settings) { ?>
                            <tr>
                                <td><?php echo $settings['_id']; ?></td>
                                                                <td><?php echo $settings['site_name']; ?></td>                            <td><?php echo $settings['site_slogan']; ?></td>                            <td><?php echo $settings['copyright']; ?></td>                            <td><?php echo $settings['active']; ?></td>

                                <td>
                                    <a href="<?php echo $url->site_url('settings/view/' . $settings['_id']); ?>"  class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                                    <a href="<?php echo $url->site_url('settings/edit/' . $settings['_id']); ?>"  class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo $url->site_url('settings/delete/' . $settings['_id']); ?>"  class="btn btn-danger btn-xs" onclick="return confirm('are you sure to delete')"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-info" role="alert">
                    <strong>No settingss Found!</strong>
                </div>
            <?php } ?>

        </div>
<br>
<br>
    </body>
</html>