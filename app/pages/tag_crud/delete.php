<?php

$storage->delete('tag', ['_id' => $url->segment(3)]);
$url->redirect('tag/action/delete');