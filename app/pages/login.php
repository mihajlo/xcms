<?php

if(@$_POST['keep_logged']){
    ini_set('session.cookie_lifetime', 9986400);
    ini_set('session.gc_maxlifetime', 9986400);
}
@session_start();
$view = module('view');
$url=module('url');
$storage=module('storage');
$msg='';
if(@$_POST['username']){
$u=$storage->get('user',[
    'username'=>$_POST['username'],
    'password'=>md5($_POST['password'])
]);
unset($u[0]['password']);
if(count($u)>0){
    @$_SESSION['logged_in']=$u[0];
    if(@$_SESSION['logged_in']['type']=='admin'){
            $url->redirect('page');
        }
        else if(@$_SESSION['logged_in']['type']=='user'){
            $url->redirect('home');
        }
}
else{
    $u=$storage->get('user',[
        'email'=>$_POST['username'],
        'password'=>md5($_POST['password'])
    ]);
    if(count($u)>0){
        @$_SESSION['logged_in']=$u[0];
        if(@$_SESSION['logged_in']['type']=='admin'){
            $url->redirect('page');
        }
        else if(@$_SESSION['logged_in']['type']=='user'){
            $url->redirect('home');
        }
    }
    else{
        $msg='<p style="color:red;">Invalid username and/or password!</p>';
        @session_destroy();
    }
}


}



$view->load($config['theme_path'].'login_view.php',['url'=>$url,'msg'=>$msg]);