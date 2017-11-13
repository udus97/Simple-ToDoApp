<?php
session_start();

$_SESSION['user_id'] = 1;
$db = new SQLite3('todoList.db');

if(!isset($_SESSION['user_id'])){
  die("You are not signed in");
}


?>