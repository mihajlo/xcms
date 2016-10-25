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


$storage->create_table('menu');


//------------------->   action messages

$action_message = false;

if ($url->segment(2) == 'action' && $url->segment(3) == 'delete') {
    $action_message = 'menu has been deleted!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'insert') {
    $action_message = 'menu has been added!';
} 
else if ($url->segment(2) == 'action' && $url->segment(3) == 'edit') {
    $action_message = 'menu has been updated!';
}






//------------------->   handling actions
if(in_array($url->segment(2), ['add','edit','delete'])){
    include_once 'menu_crud/'.$url->segment(2).'.php';
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
        $results=$storage->get('menu',$search_parms,['parent'=>['menu','_id']]);
    }
    else{
        $results=$storage->get('menu',[],['parent'=>['menu','_id']]);
    }
    $view->load("themes/generated/menu/list.php", [
        'url' => $url,
        'menus' => $results,
        'action_msg' => $action_message,
        'jquery'=>module('jquery')
    ]);
} 


else if ($url->segment(2) == 'add') {
    $view->load("themes/generated/menu/add.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'menu_items'=>$storage->get('menu')
    ]);
}

else if ($url->segment(2) == 'edit' && $url->segment(3)) {
    $menu=$storage->get('menu',['_id'=>$url->segment(3)]);
    $menu=$menu[0];
    $view->load("themes/generated/menu/edit.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'menu'=>$menu,
        'menu_items'=>$storage->get('menu')
    ]);
}

else if ($url->segment(2) == 'view' && $url->segment(3)) {
    $menu=$storage->get('menu',['_id'=>$url->segment(3)]);
    $menu=$menu[0];
    $view->load("themes/generated/menu/view.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'menu'=>$menu
    ]);
}