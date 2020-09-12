<?php

use Todo\Models\Task;
use Todo\TaskManager;
use Todo\Storage\MySqlDatabaseTaskStorage;

require 'vendor/autoload.php';


$servername = "localhost";
$username = "root";
$password = "";
$database = "slim_project";


$db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$taskManager = new TaskManager(new MySqlDatabaseTaskStorage($db));

$task = $taskManager->getTasks();

var_dump($task);
