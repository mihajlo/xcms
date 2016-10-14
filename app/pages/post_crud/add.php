<?php

if (isset($_POST['user_id']) && isset($_POST['alias']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['body']) && isset($_POST['categories']) && isset($_POST['tags']) && isset($_POST['comments_active']) && isset($_POST['created']) && isset($_POST['updated']) && isset($_POST['photo'])) {

    $validation->addSource($_POST);
    $validation->addRule('user_id', 'string', true, 1, 255, true);
    $validation->addRule('alias', 'string', true, 1, 255, true);
    $validation->addRule('title', 'string', true, 1, 255, true);
    $validation->addRule('description', 'string', true, 1, 255, true);
    $validation->addRule('body', 'string', true, 1, 255, true);
    $validation->addRule('categories', 'string', true, 1, 255, true);
    $validation->addRule('tags', 'string', true, 1, 255, true);
    $validation->addRule('comments_active', 'string', true, 1, 255, true);
    $validation->addRule('created', 'string', true, 1, 255, true);
    $validation->addRule('updated', 'string', true, 1, 255, true);
    $validation->addRule('photo', 'string', true, 1, 255, true);

    $validation->run();

    if (count($validation->errors) > 0) {
        foreach($validation->errors as $error){
            $action_message .= '<p>' . $error . '</p>';
        }
    } 
    else {
        $inserted_data = $storage->insert(
                'post', [
                    'user_id' => trim(addslashes(strip_tags($_POST['user_id']))),
                    'alias' => trim(addslashes(strip_tags($_POST['alias']))),
                    'title' => trim(addslashes(strip_tags($_POST['title']))),
                    'description' => trim(addslashes(strip_tags($_POST['description']))),
                    'body' => trim(addslashes(strip_tags($_POST['body']))),
                    'categories' => trim(addslashes(strip_tags($_POST['categories']))),
                    'tags' => trim(addslashes(strip_tags($_POST['tags']))),
                    'comments_active' => trim(addslashes(strip_tags($_POST['comments_active']))),
                    'created' => trim(addslashes(strip_tags($_POST['created']))),
                    'updated' => trim(addslashes(strip_tags($_POST['updated']))),
                    'photo' => trim(addslashes(strip_tags($_POST['photo']))),

                ]
        );
        $url->redirect('post/action/insert');
    }
}