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

$tasks = $taskManager->getTasks();

?>

<!DOCTYPE html>
<html>
<head>
<title>Todo</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

<table class="table">
  <thead>
    <th>ID</th>
    <th>Description</th>
    <th>Complete</th>
    <?php foreach($tasks as $task):?>
    <tbody>
      <tr>
        <td><?php echo $task->getId(); ?></td>
        <td><?php echo $task->getDescription(); ?></td>
        <td><?php echo $task->getComplete() ? 1 : 0; ?></td>
      </tr>
    </tbody>
    <?php endforeach;?>
  </thead>
</table>

</body>

</html>
