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

    <ul>
      <li>
        <span class="item done">Code</span>
      </li>
      <li>
        <span class="item">Sleep</span>
      </li>
      <li>
        <span class="item">Go to EKSUTH</span>
      </li>

    </ul>
    <form action="add.php" method="POST" class="item-add">
      <input type="text" name="name" placeholder="Type a new item here" class="input" autocomplete="off" required>
      <input type="submit" value="Add">Add</input>
    </form>


  </div>
</body>

</html>