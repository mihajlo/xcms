<?php

if (isset($_POST['name'])) {

    $validation->addSource($_POST);
    $validation->addRule('name', 'string', true, 1, 255, true);

    $validation->run();
    
    if(count($storage->get('tag',['name'=>@$_POST['name']]))>0){
        $validation->errors['name']='Tag "'.@$_POST['name'].'" already exist.';
    };

    if (count($validation->errors) > 0) {
        foreach($validation->errors as $error){
            $action_message .= '<p>' . $error . '</p>';
        }
    } 
    else {
        $inserted_data = $storage->insert(
                'tag', [
                    'name' => trim(addslashes(strip_tags($_POST['name']))),

                ]
        );
        $url->redirect('tag/action/insert');
    }
}