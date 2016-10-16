<?php
//global $url;
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">xCMS</a>
      </div>
      <ul class="nav navbar-nav">
        <li <?php if($url->segment(1)=='user'){echo 'class="active"';}?>><a href="<?=$url->site_url('user'); ?>"><span class="glyphicon glyphicon-user"></span> Users</a></li>
        <li <?php if($url->segment(1)=='category'){echo 'class="active"';}?>><a href="<?=$url->site_url('category'); ?>"><span class="glyphicon glyphicon-th-large"></span> Categories</a></li>
        <li <?php if($url->segment(1)=='tag'){echo 'class="active"';}?>><a href="<?=$url->site_url('tag'); ?>"><span class="glyphicon glyphicon-tags"></span> Tags</a></li>
        <li <?php if($url->segment(1)=='page'){echo 'class="active"';}?>><a href="<?=$url->site_url('page'); ?>"><span class="glyphicon glyphicon-file"></span> Pages</a></li>
        <li <?php if($url->segment(1)=='post'){echo 'class="active"';}?>><a href="<?=$url->site_url('post'); ?>"><span class="glyphicon glyphicon-pencil"></span> Posts</a></li>
        <li <?php if($url->segment(1)=='comment'){echo 'class="active"';}?>><a href="<?=$url->site_url('comment'); ?>"><span class="glyphicon glyphicon-comment"></span> Comments</a></li>
        <li <?php if($url->segment(1)=='menu'){echo 'class="active"';}?>><a href="<?=$url->site_url('menu'); ?>"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</a></li>
        <li <?php if($url->segment(1)=='settings'){echo 'class="active"';}?>><a href="<?=$url->site_url('settings'); ?>"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
      </ul>
  </div>
</nav>