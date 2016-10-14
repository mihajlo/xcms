<?php

if (isset($_POST['type']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['display_name']) && isset($_POST['email']) && isset($_POST['created']) && isset($_POST['updated']) && isset($_POST['active']) && isset($_POST['banned']) && $url->segment(3)) {

    $validation->addSource($_POST);

    $validation->addRule('type', 'string', true, 1, 255, true);
    $validation->addRule('username', 'string', true, 1, 255, true);
    $validation->addRule('password', 'string', true, 1, 255, true);
    $validation->addRule('display_name', 'string', true, 1, 255, true);
    $validation->addRule('email', 'string', true, 1, 255, true);
    $validation->addRule('created', 'string', true, 1, 255, true);
    $validation->addRule('updated', 'string', true, 1, 255, true);
    $validation->addRule('active', 'string', true, 1, 255, true);
    $validation->addRule('banned', 'string', true, 1, 255, true);


    $validation->run();

    if (count($validation->errors) > 0) {
        foreach ($validation->errors as $error) {
            $action_message .= '<p>' . $error . '</p>';
        }
    } else {
        $storage->update(
                'user', [
                    'type' => trim(addslashes(strip_tags($_POST['type']))),
                    'username' => trim(addslashes(strip_tags($_POST['username']))),
                    'password' => trim(addslashes(strip_tags($_POST['password']))),
                    'display_name' => trim(addslashes(strip_tags($_POST['display_name']))),
                    'email' => trim(addslashes(strip_tags($_POST['email']))),
                    'created' => trim(addslashes(strip_tags($_POST['created']))),
                    'updated' => trim(addslashes(strip_tags($_POST['updated']))),
                    'active' => trim(addslashes(strip_tags($_POST['active']))),
                    'banned' => trim(addslashes(strip_tags($_POST['banned']))),

                ], 
                [_id => $url->segment(3)]
        );
        $url->redirect('user/action/edit');
    }
}
