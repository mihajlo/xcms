<?php

if (isset($_POST['parent']) && isset($_POST['alias']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['body']) && isset($_POST['photo']) && isset($_POST['private']) && isset($_POST['active'])) {

    $validation->addSource($_POST);
    
    $validation->addRule('alias', 'string', true, 1, 255, true);
    $validation->addRule('title', 'string', true, 1, 255, true);
    $validation->addRule('description', 'string', true, 1, 255, true);

    $validation->run();
     
    if(@$_POST['tags']){
        foreach(@$_POST['tags'] as $tag){
            if(count($storage->get('tag',['name'=>$tag]))<1){
                $storage->insert('tag',[
                    'name'=>$tag
                ]);
            }
        }
    }
    
    if(count($storage->get('page',['alias'=>@$_POST['alias']]))>0){
        $validation->errors['alias']='Page with alias "'.@$_POST['alias'].'" already exist.';
    };
    
    $reserved_pages= scandir(APPPATH . '/pages/');
    unset($reserved_pages[0]);
    unset($reserved_pages[1]);
    $reserved_pages= array_values($reserved_pages);
    $r_pages=[];
    
    foreach($reserved_pages as $p){
        if(!is_dir(APPPATH . '/pages/'.$p)){
           $r_pages[]= str_replace('.php', '', $p);
        }
    }
    $reserved_pages=$r_pages;
    //$reserved_pages=['404','category','comment','home','menu','page','settings','tag','user','xcrud','node'];
    if(in_array(trim($_POST['alias']),$reserved_pages)){
        $validation->errors['alias']='These strings for alias are reserved: '.implode(', ',$reserved_pages);
    }
    
    if(strlen(@$_POST['type'])<1){
        $validation->errors['type']='Page type is required';
    };

    if (count($validation->errors) > 0) {
        foreach($validation->errors as $error){
            $action_message .= '<p>' . $error . '</p>';
        }
    } 
    else {
        $inserted_data = $storage->insert(
                'page', [
                    'user_id' => 1,
                    'type' => trim(addslashes(strip_tags($_POST['type']))),
                    'categories' => implode(',',$_POST['categories']),
                    'tags' => implode(',',$_POST['tags']),
                    'parent' => trim(addslashes(strip_tags($_POST['parent']))),
                    'alias' => trim(addslashes(strip_tags($_POST['alias']))),
                    'title' => trim(addslashes(strip_tags($_POST['title']))),
                    'description' => trim(addslashes(strip_tags($_POST['description']))),
                    'body' => $_POST['body'],
                    'photo' => trim(addslashes(strip_tags($_POST['photo']))),
                    'comments_allowed' => trim(addslashes(strip_tags($_POST['comments_allowed']))),
                    'private' => trim(addslashes(strip_tags($_POST['private']))),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s'),
                    'active' => trim(addslashes(strip_tags($_POST['active']))),

                ]
        );
        $url->redirect('page/action/insert');
    }
}