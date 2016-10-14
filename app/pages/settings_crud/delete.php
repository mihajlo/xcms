<?php

$storage->delete('settings', ['_id' => $url->segment(3)]);
$url->redirect('settings/action/delete');