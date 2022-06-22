<?php
    $infoBdd = array(
    'interface' => 'pdo', 
    'type' => 'mysql',
    'host' => 'localhost', 
    'port' => 3306,
    'charset' => 'UTF8', 
    'dbname' => 'gestion_stock', 
    'user' => 'root', 
    'pass' => 'mynewpassword',
   );
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
   }
 ?>