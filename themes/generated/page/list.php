<!DOCTYPE html>
<html lang="en">
    <head>
        <title>page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <?php echo $jquery->load('1.12.4');?>
        <script>
          $(document).ready(function() {
            $('#page_results').DataTable();
            } );
        </script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    </head>
    <body>
        <?php require_once APPPATH.'../themes/generated/menu.php';?>
        <div class="container">
            <h2>Manage pages</h2>
            <hr>
            
            <div class="row">
                <div class="col-sm-12">
                    <h4>Filter pages</h4>
                    <form id="filter_search" class="form-inline" action="<?php echo $url->site_url('page');?>" method="get">
                                                 
                                                     <input type="search" class="filterItem form-control" name="title" value="<?php echo @$_GET['title'];?>" placeholder="Search in Title">
                                                     <input type="search" class="filterItem form-control" name="alias" value="<?php echo @$_GET['alias'];?>" placeholder="Search in Alias">
                                                     <input type="search" class="filterItem form-control" name="description" value="<?php echo @$_GET['description'];?>" placeholder="Search in Description">
                                                     <input type="search" class="filterItem form-control" name="body" value="<?php echo @$_GET['body'];?>" placeholder="Search in Body">
                                                     
                            
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Search</button> <a href="<?php echo $url->site_url('page') ?>" class="btn btn-default"><span class="glyphicon glyphicon-erase"></span> Clear filters</a>
                    </form>
                </div>
            </div>
            
            <hr>
            <a href="<?php echo $url->site_url('page/add'); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add page</a>
            <a href="<?php echo $url->site_url('page') ?>" class="btn btn-default btn-sm pull-right"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            <hr>
            
            
            <?php if ($action_msg) { ?>
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $action_msg; ?></strong>
                </div>
            <?php } ?>

            <?php if (count($pages) > 0) { ?>

                <table class="table table-striped" id="page_results">
                    <thead>
                        
                        
                        <tr>
                            <th>_id</th>
                            <th>Type</th>          
                            <th>Parent page</th>                               
                            <th>Title</th>                            
                            <th>Alias (url)</th>                         
                            <th>Description</th>                             
                            <th>Is private?</th>                           
                            <th>Is active?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pages as $page) { ?>
                            <tr>
                                <td><?php echo $page['_id']; ?></td>
                                                                
                                <td><a href="<?php echo $url->site_url('page?type='.$page['type']); ?>"><?php echo $page['type']; ?></a></td>
                                <td><?php if($page['parent']){ echo $page['parent']['title'].' ('.$page['parent']['alias'].')'; } ?></td>                            
                                <td><?php echo $page['title']; ?></td> 
                                <td><a target="_blank" href="<?php echo $url->site_url($page['alias']); ?>" title="<?php echo $url->site_url($page['alias']); ?>">/<?php echo $page['alias']; ?></a></td>    
                                <td><?php echo substr($page['description'],0,40); ?>...</td>                               
                                <td><?php if($page['private']){ echo '<span style="color:orange;">Private</span>';}else{echo '<span style="color:blue;">Public</span>';} ?></td>                                     
                                <td><?php if($page['active']){ echo '<span style="color:green;">Yes</span>';}else{echo '<span style="color:red;">No</span>';} ?></td>
                                <td>
                                    <a target="_blank" href="<?php echo $url->site_url($page['alias']); ?>"  class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> Preview</a>
                                    <a href="<?php echo $url->site_url('page/edit/' . $page['_id']); ?>"  class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                    <a href="<?php echo $url->site_url('page/delete/' . $page['_id']); ?>"  class="btn btn-danger btn-xs" onclick="return confirm('are you sure to delete')"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-info" role="alert">
                    <strong>No pages Found!</strong>
                </div>
            <?php } ?>

        </div>
<br>
<br>
    </body>
</html>