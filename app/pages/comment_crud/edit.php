<?php

if (isset($_POST['user_id']) && isset($_POST['comment']) && $url->segment(3)) {
    $_POST['comment']=substr($_POST['comment'],0,1000);
    $validation->addSource($_POST);

    $validation->addRule('user_id', 'string', true, 1, 255, true);
    $validation->addRule('comment', 'string', true, 1, 1000, true);


    $validation->run();

    if (count($validation->errors) > 0) {
        foreach ($validation->errors as $error) {
            $action_message .= '<p>' . $error . '</p>';
        }
    } else {
        $storage->update(
                'comment', [
                    'user_id' => trim(addslashes(strip_tags($_POST['user_id']))),
                    'comment' => trim(addslashes(strip_tags($_POST['comment'])))

                ], 
                [_id => $url->segment(3)]
        );
        $url->redirect('comment/action/edit');
    }
}
