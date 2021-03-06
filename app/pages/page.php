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


$storage->create_table('page');


//------------------->   action messages

$action_message = false;

if ($url->segment(2) == 'action' && $url->segment(3) == 'delete') {
    $action_message = 'page has been deleted!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'insert') {
    $action_message = 'page has been added!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'edit') {
    $action_message = 'page has been updated!';
}






//------------------->   handling actions
if(in_array($url->segment(2), ['add','edit','delete'])){
    include_once 'page_crud/'.$url->segment(2).'.php';
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
        $results=$storage->get('page',$search_parms,['parent'=>['page','_id']]);
    }
    else{
        $results=$storage->get('page',[],['parent'=>['page','_id']]);
    }
    $view->load("themes/generated/page/list.php", [
        'url' => $url,
        'pages' => $results,
        'action_msg' => $action_message,
        'jquery'=>module('jquery')
    ]);
} 


else if ($url->segment(2) == 'add') {
    $parents=$storage->get('page',['type'=>'page']);
    $categories=$storage->get('category');
    $tags=$storage->get('tag');
    $view->load("themes/generated/page/add.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'parents'=>$parents,
        'jquery'=>module('jquery'),
        'categories'=>$categories,
        'tags'=>$tags
    ]);
}

else if ($url->segment(2) == 'edit' && $url->segment(3)) {
    $page=$storage->get('page',['_id'=>$url->segment(3)]);
    $page=$page[0];
    
    $parents=$storage->get('page',['type'=>'page']);
    $categories=$storage->get('category');
    $tags=$storage->get('tag');
    $view->load("themes/generated/page/edit.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'page'=>$page,
        'parents'=>$parents,
        'jquery'=>module('jquery'),
        'categories'=>$categories,
        'tags'=>$tags
    ]);
}
