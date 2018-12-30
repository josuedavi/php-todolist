<?php

//Connection to the MySQL Server by - tutbuzz.com

define('DB_SERVER', 'localhost'); // Mysql hostname, usually localhost
define('DB_USERNAME', 'root'); // Mysql username
define('DB_PASSWORD', 'root'); // Mysql password
define('DB_DATABASE', 'php_login_script'); // Mysql database name

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

if(!$conn)
{
	echo "Database connection faild...";
}
?>
