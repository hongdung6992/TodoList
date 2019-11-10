<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo list</title>
  <?php require_once 'css.php' ?>
  <?php require_once 'js.php' ?>
</head>

<body>
  <div class="container mt-5">
    <div id="content">

      <?php include_once './app/views/' . $data['page'] . '.php' ?>

    </div>
  </div>

 
</body>


</html>