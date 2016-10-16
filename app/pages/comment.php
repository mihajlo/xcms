<?php

//init "view" module
$view = module('view');
//init "url" module
$url = module('url');
//init "storage" module
$storage = module('storage');
//init "validation" module
$validation=module('validation');


$storage->create_table('comment');


//------------------->   action messages

$action_message = false;

if ($url->segment(2) == 'action' && $url->segment(3) == 'delete') {
    $action_message = 'comment has been deleted!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'insert') {
    $action_message = 'comment has been added!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'edit') {
    $action_message = 'comment has been updated!';
}






//------------------->   handling actions
if(in_array($url->segment(2), ['add','edit','delete'])){
    include_once 'comment_crud/'.$url->segment(2).'.php';
}




//------------------->   handling views

if (!$url->segment(2) || $url->segment(2) == 'action') {
    if(@$_GET){
        $search_parms=[];
        foreach(@$_GET as $search_k=>$search_v){
            if($search_v){
                $search_parms[$search_k.'%']=$search_v;
            }
        }
        $results=$storage->get('comment',$search_parms,['user_id'=>['user','_id']]);
    }
    else{
        $results=$storage->get('comment',[],['user_id'=>['user','_id']]);
    }
    $view->load("themes/generated/comment/list.php", [
        'url' => $url,
        'comments' => $results,
        'action_msg' => $action_message,
        'jquery'=>module('jquery')
    ]);
} 


else if ($url->segment(2) == 'add') {
    $users=$storage->get('user',['active'=>1,'banned'=>NULL]);
    $view->load("themes/generated/comment/add.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'users'=>$users
    ]);
}

else if ($url->segment(2) == 'edit' && $url->segment(3)) {
    $comment=$storage->get('comment',['_id'=>$url->segment(3)]);
    $comment=$comment[0];
    $users=$storage->get('user',['active'=>1,'banned'=>NULL]);
    $view->load("themes/generated/comment/edit.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'comment'=>$comment,
        'users'=>$users
    ]);
}

else if ($url->segment(2) == 'view' && $url->segment(3)) {
    $comment=$storage->get('comment',['_id'=>$url->segment(3)],['user_id'=>['user','_id']]);
    $comment=$comment[0];
    $view->load("themes/generated/comment/view.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'comment'=>$comment
    ]);
}