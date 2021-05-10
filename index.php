<?php session_start(); ?>

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
      include_once("functions.php");
      include_once("connection.php");

    if(isset($_POST['log']) && isset($_POST['pass']))
    {
      $login = $_POST['log'];
      $password = $_POST['pass'];

        $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $count = mysqli_num_rows($result);

        $user = mysqli_fetch_assoc($result);
        $_SESSION['usr_name'] = $user['username'];
        $_SESSION['usr_id'] = $user['id'];

        if($count == 1)
        {
          $Pquery = "SELECT permissions FROM users WHERE login = '$login'";
          $perm = mysqli_query($connection, $Pquery) or die(mysqli_error($connection));
          $priority = mysqli_fetch_assoc($perm);

          if ($priority['permissions'] == "admin")
          {
            $_SESSION['priority'] = "admin";
          }
          if($priority['permissions'] == "user")
          {
            $_SESSION['priority'] = "user";
          }
        }
        else
        {
          $_SESSION['priority'] = "unlogged";
        }
      }


    if($_SESSION['priority'] == "admin")
    {
      build_admin_form();
    }

    elseif($_SESSION['priority'] == "user")
    {
      build_user_form();
    }

    else build_unlogged_form();


    if(isset($_POST['subm_order']))
    {
      $name = $_SESSION['o_name'];
      $surname = $_SESSION['o_surname'];
      $middle_name = $_SESSION['o_middle_name'];
      $passport = $_SESSION['o_passport'];
      $country = $_SESSION['o_country'];
      $room = $_SESSION['o_room'];
      $income = $_SESSION['o_income'];
      $outcome = $_SESSION['o_outcome'];
      include_once("connection.php");
      $query = "INSERT INTO orders(name, surname, middle_name, country, passport, income, outcome, room) VALUES('$name', '$surname', '$middle_name', '$country', '$passport', '$income', '$outcome', '$room')";
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
