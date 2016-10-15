<?php
//global $url;
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">xCMS</a>
      </div>
      <ul class="nav navbar-nav">
        <li <?php if($url->segment(1)=='user'){echo 'class="active"';}?>><a href="<?=$url->site_url('user'); ?>">Users</a></li>
        <li <?php if($url->segment(1)=='category'){echo 'class="active"';}?>><a href="<?=$url->site_url('category'); ?>">Categories</a></li>
      </ul>
  </div>
</nav>