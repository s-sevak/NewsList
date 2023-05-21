<?php
// includes/db.php
$servername = '';
$username = '';
$password = '';
$dbname = 'database_news';

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die('Database connection error: ' . $db->connect_error);
}

$db->set_charset("utf8"); // Установка кодировки
