<?php
// index.php
require_once 'controllers/NewsController.php';

$controller = new NewsController();
$controller->index();
