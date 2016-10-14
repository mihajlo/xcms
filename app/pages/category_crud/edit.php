<?php

if (isset($_POST['name']) && isset($_POST['active']) && $url->segment(3)) {

    $validation->addSource($_POST);

    $validation->addRule('name', 'string', true, 1, 255, true);
    $validation->addRule('active', 'string', true, 1, 255, true);


    $validation->run();

    if (count($validation->errors) > 0) {
        foreach ($validation->errors as $error) {
            $action_message .= '<p>' . $error . '</p>';
        }
    } else {
        $storage->update(
                'category', [
                    'name' => trim(addslashes(strip_tags($_POST['name']))),
                    'active' => trim(addslashes(strip_tags($_POST['active']))),

                ], 
                [_id => $url->segment(3)]
        );
        $url->redirect('category/action/edit');
    }
}
