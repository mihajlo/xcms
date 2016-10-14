<?php

$storage->delete('user', ['_id' => $url->segment(3)]);
$url->redirect('user/action/delete');