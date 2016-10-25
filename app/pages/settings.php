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


$storage->create_table('settings');


//------------------->   action messages

$action_message = false;

if (@$_POST['site_name']) {
    $action_message = 'Saving successfully';
} 






//------------------->   handling actions
if(in_array($url->segment(2), ['edit'])){
    include_once 'settings_crud/'.$url->segment(2).'.php';
}




//------------------->   handling views

if (!$url->segment(2)) {
    $url->redirect('settings/edit/site');
} 



else if ($url->segment(2) == 'edit' && $url->segment(3)) {
    
    if (@$_POST) {
        $action_message = 'Saving successfully';
    } 
    $settings=$storage->get('settings',['_id'=>1]);
    $settings=$settings[0];
    $view->load("themes/generated/settings/edit.php", [
        'url' => $url,
        'action_msg' => $action_message,
        'settings'=>$settings
    ]);
}
