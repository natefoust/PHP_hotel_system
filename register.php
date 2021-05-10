<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>LOG IN</title>
  </head>
  <body>

    <div class="container">

    <form method="POST" action="index.php">
  <div class="form-group">
    <label for="login_login">Логин</label>
    <input type="login" class="form-control" id="login" aria-describedby="" name="log" placeholder="">
  </div>

  <div class="form-group">
    <label for="login_password">Пароль</label>
    <input type="password" class="form-control" id="password" name="pass" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary">Войти</button>
  </form>

  <form action="index.php" method="POST">
    <button name="back_button" class="btn btn-primary">Назад</button>
  </form>

  <form action="login.php" method="POST">
    <button name="back_button" class="btn btn-primary">Зарегистрироваться</button>
  </form>

</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
