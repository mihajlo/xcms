<?php

if (isset($_POST['site_name']) && isset($_POST['site_slogan']) && isset($_POST['copyright']) && isset($_POST['active']) && $url->segment(3)) {

    $validation->addSource($_POST);

    $validation->addRule('site_name', 'string', true, 1, 255, true);
    $validation->addRule('site_slogan', 'string', true, 1, 255, true);
    $validation->addRule('copyright', 'string', true, 1, 255, true);
    $validation->addRule('active', 'string', true, 1, 255, true);


    $validation->run();

    if (count($validation->errors) > 0) {
        foreach ($validation->errors as $error) {
            $action_message .= '<p>' . $error . '</p>';
        }
    } else {
        $storage->update(
                'settings', [
                    'site_name' => trim(addslashes(strip_tags($_POST['site_name']))),
                    'site_slogan' => trim(addslashes(strip_tags($_POST['site_slogan']))),
                    'copyright' => trim(addslashes(strip_tags($_POST['copyright']))),
                    'active' => trim(addslashes(strip_tags($_POST['active']))),

                ], 
                [_id => $url->segment(3)]
        );
        $url->redirect('settings/action/edit');
    }
}
