<?php

if (isset($_POST['parent']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['body']) && isset($_POST['photo']) && isset($_POST['private']) && isset($_POST['active']) && $url->segment(3)) {

    $validation->addSource($_POST);
    
    $validation->addRule('title', 'string', true, 1, 255, true);
    $validation->addRule('description', 'string', true, 1, 255, true);

    $validation->run();

    
    if(strlen(@$_POST['type'])<1){
        $validation->errors['type']='Page type is required';
    };
    
    if (count($validation->errors) > 0) {
        foreach ($validation->errors as $error) {
            $action_message .= '<p>' . $error . '</p>';
        }
    } else {
        $storage->update(
                'page', [
                    'user_id' => 1,
                    'type' => trim(addslashes(strip_tags($_POST['type']))),
                    'categories' => implode(',',$_POST['categories']),
                    'tags' => implode(',',$_POST['tags']),
                    'parent' => trim(addslashes(strip_tags($_POST['parent']))),
                    'title' => trim(addslashes(strip_tags($_POST['title']))),
                    'description' => trim(addslashes(strip_tags($_POST['description']))),
                    'body' => $_POST['body'],
                    'photo' => trim(addslashes(strip_tags($_POST['photo']))),
                    'comments_allowed' => trim(addslashes(strip_tags($_POST['comments_allowed']))),
                    'private' => trim(addslashes(strip_tags($_POST['private']))),
                    'updated' => date('Y-m-d H:i:s'),
                    'active' => trim(addslashes(strip_tags($_POST['active']))),

                ], 
                [_id => $url->segment(3)]
        );
        $url->redirect('page/action/edit');
    }
}
