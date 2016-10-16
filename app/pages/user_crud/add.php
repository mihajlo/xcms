<?php

if (isset($_POST['type']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['display_name']) && isset($_POST['email']) && isset($_POST['active']) && isset($_POST['banned'])) {

    $validation->addSource($_POST);
    $validation->addRule('type', 'string', true, 1, 255, true);
    $validation->addRule('username', 'string', true, 5, 100, true);
    $validation->addRule('password', 'string', true, 5, 100, true);
    $validation->addRule('display_name', 'string', true, 1, 255, true);
    $validation->addRule('email', 'email', true, 1, 255, true);
    $validation->addRule('active', 'string', true, 1, 255, true);
    $validation->addRule('banned', 'string', true, 1, 255, true);

    $validation->run();
    
    
    if(count($storage->get('user',['username'=>@$_POST['username']]))>0){
        $validation->errors['username']='username "'.@$_POST['username'].'" already exist';
    }
    
    if(count($storage->get('user',['email'=>@$_POST['email']]))>0){
        $validation->errors['email']='user with email "'.@$_POST['email'].'" already exist';
    }
    
    

    if (count($validation->errors) > 0) {
        foreach($validation->errors as $error){
            $action_message .= '<p>' . $error . '</p>';
        }
    } 
    else {
        $inserted_data = $storage->insert(
                'user', [
                    'type' => trim(addslashes(strip_tags($_POST['type']))),
                    'username' => trim(addslashes(strip_tags($_POST['username']))),
                    'password' => md5($_POST['password']),
                    'display_name' => trim(addslashes(strip_tags($_POST['display_name']))),
                    'email' => trim(addslashes(strip_tags($_POST['email']))),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s'),
                    'active' => trim(addslashes(strip_tags($_POST['active']))),
                    'banned' => trim(addslashes(strip_tags($_POST['banned']))),

                ]
        );
        $url->redirect('user/action/insert');
    }
}