<?php
// public/index.php

require_once './Common/env.php';
require_once './Common/funtion.php';
require_once './Common/rauter.php';

// Tạo router và xác định controller và action tương ứng
$router = new Router();
$router->route();
?>
