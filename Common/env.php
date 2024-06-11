<?php
//chứa thông tin cấu hình/biến môi trường
//Có 2 cách để kết nối CSDL: PDO, mysqli

//khai báo đường dẫn cơ bản
define('BASE_URL', 'http://localhost/asm'); 

//khai báo thông số để kết nối CSDL
define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'web2014.02');
// define('DB_NAME', 'books');

define('PATH_ROOT', __DIR__ . '/../');
?>
