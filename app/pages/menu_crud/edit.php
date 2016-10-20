<?php

if (isset($_POST['parent']) && isset($_POST['url']) && isset($_POST['name']) && isset($_POST['target']) && isset($_POST['private']) && isset($_POST['order']) && $url->segment(3)) {

    $validation->addSource($_POST);
    $validation->addRule('url', 'string', true, 1, 1500, true);
    $validation->addRule('name', 'string', true, 1, 255, true);
    $validation->addRule('order', 'string', true, 1, 255, true);


    $validation->run();

    if (count($validation->errors) > 0) {
        foreach ($validation->errors as $error) {
            $action_message .= '<p>' . $error . '</p>';
        }
    } else {
        $storage->update(
                'menu', [
                    'parent' => trim(addslashes(strip_tags($_POST['parent']))),
                    'url' => trim(strip_tags($_POST['url'])),
                    'name' => trim(addslashes(strip_tags($_POST['name']))),
                    'target' => trim(strip_tags($_POST['target'])),
                    'private' => trim(addslashes(strip_tags($_POST['private']))),
                    'order' => trim(addslashes(strip_tags($_POST['order']))),

                ], 
                [_id => $url->segment(3)]
        );
        $url->redirect('menu/action/edit');
    }
}
