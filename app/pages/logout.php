<?php
@session_destroy();
$url=module('url');
$url->redirect('login');

