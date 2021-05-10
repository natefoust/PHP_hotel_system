<?php session_start();

$name = $_POST['commentbtn'];
if($name)
{
  header('Location: /reports.php');
}

 ?>

<html lang="en">
  <head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    <title>cinema.by</title>
  </head>
  <body>
    <?php
      require("connection.php");
      include_once("functions.php");
      if ($_SESSION['priority'] == "admin")
      {
          build_admin_rep_form();
      }

      if ($_SESSION['priority'] == "user")
      {
          build_user_rep_form();
      }

      if (!($_SESSION['priority']))
      {
          build_unlogged_rep_form();
            echo('<br><br><br><br><br><h4><p align="center">Комментарии доступны только авторизированным пользователям</p></h4>');

      }

      if(isset($_POST['commentbtn']))
      {
        $id = $_SESSION['usr_id'];
        $username = $_SESSION['usr_name'];
        $com = $_POST['comm'];
        $query = "INSERT INTO comments(`user_id`, `name`, `text`) VALUES('$id', '$username', '$com')";
        $result = mysqli_query($connection, $query);
      }
   ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
