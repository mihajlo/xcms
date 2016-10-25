<?php
$auth=module('auth');
$auth->access(['admin']);
//init "view" module
$view = module('view');
//init "url" module
$url = module('url');
//init "storage" module
$storage = module('storage');
//init "validation" module
$validation=module('validation');


$storage->create_table('category');


//------------------->   action messages

$action_message = false;

if ($url->segment(2) == 'action' && $url->segment(3) == 'delete') {
    $action_message = 'category has been deleted!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'insert') {
    $action_message = 'category has been added!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'edit') {
    $action_message = 'category has been updated!';
}






//------------------->   handling actions
if(in_array($url->segment(2), ['add','edit','delete'])){
    include_once 'category_crud/'.$url->segment(2).'.php';
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
        $results=$storage->get('category',$search_parms);
    }
    else{
        $results=$storage->get('category');
    }
    $view->load("themes/generated/category/list.php", [
        'url' => $url,
        'categorys' => $results,
        'action_msg' => $action_message,
        'jquery'=>module('jquery')
    ]);
} 


else if ($url->segment(2) == 'add') {
    $view->load("themes/generated/category/add.php", [
        'url' => $url,
        'action_msg' => $action_message
    ]);
}

else if ($url->segment(2) == 'edit' && $url->segment(3)) {
    $category=$storage->get('category',['_id'=>$url->segment(3)]);
    $category=$category[0];
    $view->load("themes/generated/category/edit.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'category'=>$category
    ]);
}

else if ($url->segment(2) == 'view' && $url->segment(3)) {
    $category=$storage->get('category',['_id'=>$url->segment(3)]);
    $category=$category[0];
    $view->load("themes/generated/category/view.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'category'=>$category
    ]);
}