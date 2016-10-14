<?php

$storage->delete('page', ['_id' => $url->segment(3)]);
$url->redirect('page/action/delete');