<?php

$storage->delete('comment', ['_id' => $url->segment(3)]);
$url->redirect('comment/action/delete');