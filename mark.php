<?php
require_once "./app/init.php";
if(isset($_GET['as'],$_GET['id'])){
  $as = $_GET['as'];
  $id = $_GET['id'];
  $user = $_SESSION['user_id'];


  switch ($as) {
    case 'done':
      // $query = "INSERT INTO `items`(`id`,`username`,`task`,`done`,`created`) VALUES ($id,$user,\"$task\",0,$created)";
      $query = "UPDATE `items` SET `done` = 1 WHERE id = $id AND username = $user";
      $db->query($query);
      break;
    case 'undone':
      $query = "UPDATE `items` SET `done` = 0 WHERE id = $id AND username = $user";
      $db->query($query);
      break;
  }
}
header('Location:index.php');
?>