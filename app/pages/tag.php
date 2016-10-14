<?php

//init "view" module
$view = module('view');
//init "url" module
$url = module('url');
//init "storage" module
$storage = module('storage');
//init "validation" module
$validation=module('validation');


$storage->create_table('tag');


//------------------->   action messages

$action_message = false;

if ($url->segment(2) == 'action' && $url->segment(3) == 'delete') {
    $action_message = 'tag has been deleted!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'insert') {
    $action_message = 'tag has been added!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'edit') {
    $action_message = 'tag has been updated!';
}






//------------------->   handling actions
if(in_array($url->segment(2), ['add','edit','delete'])){
    include_once 'tag_crud/'.$url->segment(2).'.php';
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
        $results=$storage->get('tag',$search_parms);
    }
    else{
        $results=$storage->get('tag');
    }
    $view->load("themes/generated/tag/list.php", [
        'url' => $url,
        'tags' => $results,
        'action_msg' => $action_message,
        'jquery'=>module('jquery')
    ]);
} 


else if ($url->segment(2) == 'add') {
    $view->load("themes/generated/tag/add.php", [
        'url' => $url,
        'action_msg' => $action_message
    ]);
}

else if ($url->segment(2) == 'edit' && $url->segment(3)) {
    $tag=$storage->get('tag',['_id'=>$url->segment(3)]);
    $tag=$tag[0];
    $view->load("themes/generated/tag/edit.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'tag'=>$tag
    ]);
}

else if ($url->segment(2) == 'view' && $url->segment(3)) {
    $tag=$storage->get('tag',['_id'=>$url->segment(3)]);
    $tag=$tag[0];
    $view->load("themes/generated/tag/view.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'tag'=>$tag
    ]);
}