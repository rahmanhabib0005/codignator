<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <h1><?= esc(ucfirst($page)) ?></h1>
     <form action="/user/insert" method="post">
          <?= csrf_field() ?>

          <label for="title">Name</label>
          <input type="input" name="name" value="">
          <br>

          <label for="body">E-mail</label>
          <input type="email" name="email" value="">
          <br>
          
          <label for="title">Password</label>
          <input type="password" name="password" value="">
          <br>

          <input type="submit" name="submit" value="Create User">
     </form>
</body>

</html>