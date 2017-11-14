<?php
require_once "./app/init.php";
require_once "../local_CDN/dBug.php";
$user = $_SESSION['user_id'];
$task = trim($_POST['task']);
if (!empty($task)){
  $id = rand();
  $created = time();
  $query = "INSERT INTO `items`(`id`,`username`,`task`,`done`,`created`) VALUES ($id,$user,\"$task\",0,$created)";
  $db->query($query);
}else{
  if(isset($_POST['empty']) && $_POST['empty'] === 'Empty List'){
    $query = "DELETE FROM items WHERE 1=1";
    $db->query($query);
  }
}
header('Location:index.php');

?>