<?php

$storage->delete('category', ['_id' => $url->segment(3)]);
$url->redirect('category/action/delete');