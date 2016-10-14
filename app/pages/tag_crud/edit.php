<?php

if (isset($_POST['name']) && $url->segment(3)) {

    $validation->addSource($_POST);

    $validation->addRule('name', 'string', true, 1, 255, true);


    $validation->run();

    if (count($validation->errors) > 0) {
        foreach ($validation->errors as $error) {
            $action_message .= '<p>' . $error . '</p>';
        }
    } else {
        $storage->update(
                'tag', [
                    'name' => trim(addslashes(strip_tags($_POST['name']))),

                ], 
                [_id => $url->segment(3)]
        );
        $url->redirect('tag/action/edit');
    }
}
