<?php
$view = module('view');
$url=module('url');

$view->load($config['theme_path'].'home_view.php',
        [
            'url'=>$url
        ]
    );