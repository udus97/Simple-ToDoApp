<?php
require_once "./app/init.php";
require_once "../local_CDN/dBug.php";

$user = $_SESSION['user_id'];
$itemsQuery = "SELECT id,task,done FROM items WHERE username = $user";

$result = $db->query($itemsQuery);
$rows = [];

while($row = $result->fetchArray(SQLITE3_ASSOC)){
  $rows[] = $row;
}
// new dBug($rows);
$items = count($rows) ? $rows : [];

// echo '<pre>',print_r($items),'</pre>';
// foreach ($items as $item ) {
//   echo $item['task'],"<br>";
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <title>My ToDo App</title>
</head>

<body>
  <div class="list">
    <h1 class="header">To Do</h1>
    <?php
    if(!empty($items)){?>
    <ul class="items">
    <?php
      foreach ($items as $item ) {
        $itemID = $item['id'];
        $done = $item['done'] ? 'done':'';
        // $doneButton = $done ? '':"<a href = \"mark.php?as=done&id=$itemID\" class = \"done-button\">Mark as done</a>";
        $doneButton = $done ? "<a href = \"mark.php?as=undone&id=$itemID\" class = \"done-button\">Mark as undone</a>":"<a href = \"mark.php?as=done&id=$itemID\" class = \"done-button\">Mark as done</a>";
        $task = $item['task'];
        $heredoc = <<<START
        <li><span class = "item $done">$task</span>$doneButton</li>
START;
        // echo("<li><span class=","</li>");
        echo $heredoc;
      }
    ?>
      <!--<li>
        <span class="item done">Code</span>
      </li>
      <li>
        <span class="item">Sleep</span> <a href="#" class="done-button">Mark as done</a>
      </li>
      <li>
        <span class="item">Go to EKSUTH</span> <a href="#" class="done-button">Mark as done</a>

      </li>-->

    </ul>
    <?php }
      else{
        echo "<p>You have not added any items yet</p>";
      }
    ?>
    <form action="add.php" method="POST" class="item-add">
      <input type="text" name="task" placeholder="Type a new item here" class="input" autocomplete="off" required>
      <input name = "submit" type="submit" value="Add">
    </form>


  </div>
</body>

</html>
