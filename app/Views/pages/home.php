<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <h1><?= esc(ucfirst($page)) ?></h1>
     <form action="/user/insert" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <label for="title">Name</label>
          <input type="input" name="name" value="">
          <br>

          <label for="body">Avater</label>
          <input type="file" multiple name="image[]" value="">
          <br>

          <input type="submit" name="submit" value="Create User">
     </form>
</body>

</html>