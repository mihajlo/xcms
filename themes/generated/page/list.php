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

        <div class="container">
            <h2>Manage page</h2>
            <hr>
            
            <div class="row">
                <div class="col-sm-12">
                    <h4>Filter pages</h4>
                    <form id="filter_search" class="form-inline" action="<?php echo $url->site_url('page');?>" method="get">
                                                 <input type="search" class="filterItem form-control" name="parent" value="<?php echo @$_GET['parent'];?>" placeholder="Search parent">
                                                     <input type="search" class="filterItem form-control" name="alias" value="<?php echo @$_GET['alias'];?>" placeholder="Search alias">
                                                     <input type="search" class="filterItem form-control" name="title" value="<?php echo @$_GET['title'];?>" placeholder="Search title">
                                                     <input type="search" class="filterItem form-control" name="description" value="<?php echo @$_GET['description'];?>" placeholder="Search description">
                                                     <input type="search" class="filterItem form-control" name="body" value="<?php echo @$_GET['body'];?>" placeholder="Search body">
                                                     <input type="search" class="filterItem form-control" name="photo" value="<?php echo @$_GET['photo'];?>" placeholder="Search photo">
                                                     <input type="search" class="filterItem form-control" name="private" value="<?php echo @$_GET['private'];?>" placeholder="Search private">
                                                     <input type="search" class="filterItem form-control" name="created" value="<?php echo @$_GET['created'];?>" placeholder="Search created">
                                                     <input type="search" class="filterItem form-control" name="updated" value="<?php echo @$_GET['updated'];?>" placeholder="Search updated">
                                                     <input type="search" class="filterItem form-control" name="active" value="<?php echo @$_GET['active'];?>" placeholder="Search active">
                            
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
                                                        <th>parent</th>                            <th>alias</th>                            <th>title</th>                            <th>description</th>                            <th>body</th>                            <th>photo</th>                            <th>private</th>                            <th>created</th>                            <th>updated</th>                            <th>active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pages as $page) { ?>
                            <tr>
                                <td><?php echo $page['_id']; ?></td>
                                                                <td><?php echo $page['parent']; ?></td>                            <td><?php echo $page['alias']; ?></td>                            <td><?php echo $page['title']; ?></td>                            <td><?php echo $page['description']; ?></td>                            <td><?php echo $page['body']; ?></td>                            <td><?php echo $page['photo']; ?></td>                            <td><?php echo $page['private']; ?></td>                            <td><?php echo $page['created']; ?></td>                            <td><?php echo $page['updated']; ?></td>                            <td><?php echo $page['active']; ?></td>

                                <td>
                                    <a href="<?php echo $url->site_url('page/view/' . $page['_id']); ?>"  class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
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