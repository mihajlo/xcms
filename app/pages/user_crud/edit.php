<?php

if (isset($_POST['password']) && isset($_POST['display_name']) && isset($_POST['active']) && isset($_POST['banned']) && $url->segment(3)) {

    $validation->addSource($_POST);
    $validation->addRule('display_name', 'string', true, 1, 255, true);
    $validation->addRule('active', 'string', true, 1, 255, true);
    $validation->addRule('banned', 'string', true, 1, 255, true);


    $validation->run();
    

    if (count($validation->errors) > 0) {
        foreach ($validation->errors as $error) {
            $action_message .= '<p>' . $error . '</p>';
        }
    } else {
        
        $for_update=[
                    
                    'display_name' => trim(addslashes(strip_tags($_POST['display_name']))),
                    'updated' => date('Y-m-d H:i:s'),
                    'active' => trim(addslashes(strip_tags($_POST['active']))),
                    'banned' => trim(addslashes(strip_tags($_POST['banned']))),

                ];
        if($_POST['password']){
            $for_update['password']=md5($_POST['password']);
        }
        $storage->update(
                'user', $for_update, 
                [_id => $url->segment(3)]
        );
        $url->redirect('user/action/edit');
    }
}
