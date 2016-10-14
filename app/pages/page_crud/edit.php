<?php

if (isset($_POST['parent']) && isset($_POST['alias']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['body']) && isset($_POST['photo']) && isset($_POST['private']) && isset($_POST['created']) && isset($_POST['updated']) && isset($_POST['active']) && $url->segment(3)) {

    $validation->addSource($_POST);

    $validation->addRule('parent', 'string', true, 1, 255, true);
    $validation->addRule('alias', 'string', true, 1, 255, true);
    $validation->addRule('title', 'string', true, 1, 255, true);
    $validation->addRule('description', 'string', true, 1, 255, true);
    $validation->addRule('body', 'string', true, 1, 255, true);
    $validation->addRule('photo', 'string', true, 1, 255, true);
    $validation->addRule('private', 'string', true, 1, 255, true);
    $validation->addRule('created', 'string', true, 1, 255, true);
    $validation->addRule('updated', 'string', true, 1, 255, true);
    $validation->addRule('active', 'string', true, 1, 255, true);


    $validation->run();

    if (count($validation->errors) > 0) {
        foreach ($validation->errors as $error) {
            $action_message .= '<p>' . $error . '</p>';
        }
    } else {
        $storage->update(
                'page', [
                    'parent' => trim(addslashes(strip_tags($_POST['parent']))),
                    'alias' => trim(addslashes(strip_tags($_POST['alias']))),
                    'title' => trim(addslashes(strip_tags($_POST['title']))),
                    'description' => trim(addslashes(strip_tags($_POST['description']))),
                    'body' => trim(addslashes(strip_tags($_POST['body']))),
                    'photo' => trim(addslashes(strip_tags($_POST['photo']))),
                    'private' => trim(addslashes(strip_tags($_POST['private']))),
                    'created' => trim(addslashes(strip_tags($_POST['created']))),
                    'updated' => trim(addslashes(strip_tags($_POST['updated']))),
                    'active' => trim(addslashes(strip_tags($_POST['active']))),

                ], 
                [_id => $url->segment(3)]
        );
        $url->redirect('page/action/edit');
    }
}
