<?php

define('AUTHOR','Pavel');
define('YEAR','2023');

define('DBHOST','127.0.0.1');
define('DBLOGIN','root');
define('DBPASS','123');
define('DBNAME','TESTDB');

define('ORDERS','orders.txt');

session_start();

// unset($_SESSION['basket']);
if (!isset($_SESSION['basket']))
{
    $_SESSION['basket']=[];
}
?>
