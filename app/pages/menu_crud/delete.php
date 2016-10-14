<?php

$storage->delete('menu', ['_id' => $url->segment(3)]);
$url->redirect('menu/action/delete');