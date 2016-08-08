<?php
session_start();

$db = ['host' => 'localhost', 'user' => 'root', 'pass' => '', 'base' => 'fenix'];

$link = new mysqli($db['host'], $db['user'], $db['pass'], $db['base']);
$link->set_charset('utf8');
if ($link->connect_error) {
    echo 'Mysql error: ' . $link->connect_error;
    exit();
}