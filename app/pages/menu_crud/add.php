<?php

if (isset($_POST['parent']) && isset($_POST['url']) && isset($_POST['name']) && isset($_POST['target']) && isset($_POST['private']) && isset($_POST['order'])) {

    $validation->addSource($_POST);
    $validation->addRule('parent', 'string', true, 1, 255, true);
    $validation->addRule('url', 'string', true, 1, 255, true);
    $validation->addRule('name', 'string', true, 1, 255, true);
    $validation->addRule('target', 'string', true, 1, 255, true);
    $validation->addRule('private', 'string', true, 1, 255, true);
    $validation->addRule('order', 'string', true, 1, 255, true);

    $validation->run();

    if (count($validation->errors) > 0) {
        foreach($validation->errors as $error){
            $action_message .= '<p>' . $error . '</p>';
        }
    } 
    else {
        $inserted_data = $storage->insert(
                'menu', [
                    'parent' => trim(addslashes(strip_tags($_POST['parent']))),
                    'url' => trim(addslashes(strip_tags($_POST['url']))),
                    'name' => trim(addslashes(strip_tags($_POST['name']))),
                    'target' => trim(addslashes(strip_tags($_POST['target']))),
                    'private' => trim(addslashes(strip_tags($_POST['private']))),
                    'order' => trim(addslashes(strip_tags($_POST['order']))),

                ]
        );
        $url->redirect('menu/action/insert');
    }
}