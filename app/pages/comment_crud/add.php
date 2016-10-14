<?php

if (isset($_POST['user_id']) && isset($_POST['url']) && isset($_POST['comment']) && isset($_POST['created'])) {

    $validation->addSource($_POST);
    $validation->addRule('user_id', 'string', true, 1, 255, true);
    $validation->addRule('url', 'string', true, 1, 255, true);
    $validation->addRule('comment', 'string', true, 1, 255, true);
    $validation->addRule('created', 'string', true, 1, 255, true);

    $validation->run();

    if (count($validation->errors) > 0) {
        foreach($validation->errors as $error){
            $action_message .= '<p>' . $error . '</p>';
        }
    } 
    else {
        $inserted_data = $storage->insert(
                'comment', [
                    'user_id' => trim(addslashes(strip_tags($_POST['user_id']))),
                    'url' => trim(addslashes(strip_tags($_POST['url']))),
                    'comment' => trim(addslashes(strip_tags($_POST['comment']))),
                    'created' => trim(addslashes(strip_tags($_POST['created']))),

                ]
        );
        $url->redirect('comment/action/insert');
    }
}