<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123123');
define('DB_NAME', 'todo_list');

$protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_URL', $protocol . $_SERVER['HTTP_HOST'] . DS . 'TodoList');

