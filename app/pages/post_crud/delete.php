<?php

$storage->delete('post', ['_id' => $url->segment(3)]);
$url->redirect('post/action/delete');