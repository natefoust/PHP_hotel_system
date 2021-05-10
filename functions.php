<?php session_start() ?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Hello, world!</title>
  </head>
  <body>


<?php

function build_admin_rep_form()
{
  build_navbar();
  comment();
  show_comments();
}

function build_user_rep_form()
{
  build_navbar();
  comment();
  show_comments();
}

function build_unlogged_rep_form()
{
  build_navbar();
}

function build_unlogged_form()
{
    build_navbar();
    build_main_card();
    build_carousel();
}

function build_user_form()
{
  build_navbar();
  build_main_card();
  build_carousel();
}


function build_admin_form()
{
  build_navbar();
  build_main_card();
  build_carousel();
}

function build_admin_session_form()
{
  build_navbar();
  build_sessions();
}

function build_user_session_form()
{
  build_navbar();
  build_sessions();
}

function build_unlogged_session_form()
{
  build_navbar();
  build_sessions();
}

function build_unlogged_reg_form()
{
  build_navbar();
}

function build_reg_form()
{
  build_navbar();
  build_registration_room_form();
}

function build_registration_room_form()
{
  include_once("connection.php");
  $query = "SELECT COUNT(room) FROM orders WHERE room = '0'";
  $lux = mysqli_query($connection, $query);
  $lux = mysqli_fetch_all($lux);
  $query = "SELECT COUNT(room) FROM orders WHERE room = '1'";
  $biz = mysqli_query($connection, $query);
  $biz = mysqli_fetch_all($biz);
  $query = "SELECT COUNT(room) FROM orders WHERE room = '2'";
  $love = mysqli_query($connection, $query);
  $love = mysqli_fetch_all($love);
  $query = "SELECT COUNT(room) FROM orders WHERE room = '3'";
  $family = mysqli_query($connection, $query);
  $family = mysqli_fetch_all($family);
  $query = "SELECT COUNT(room) FROM orders WHERE room = '4'";
  $econom = mysqli_query($connection, $query);
  $econom = mysqli_fetch_all($econom);

  $lux = $lux[0][0];
  $biz = $biz[0][0];
  $love = $love[0][0];
  $family = $family[0][0];
  $econom = $econom[0][0];
  
  settype($lux, 'integer');
  settype($biz, 'integer');
  settype($love, 'integer');
  settype($family, 'integer');
  settype($econom, 'integer');

  echo '<form action="payment.php" method = "POST">
  <div style= "margin: 0 auto; width: 40%" >
  <div class="form-group">
    <h4><label for="login_password">Заполните некоторые данные для продолжения</label></h4>

    <label for="login_password">Номер*</label> <br>
    <select class="form-select" aria-label="Default select example" name="room">';
    if($lux < 3)
    {
      echo '<option value="0">Люкс</option>';
    }
    if($biz < 3)
    {
      echo '<option value="1">Бизнес класс</option>';
    }
    if($love < 3)
    {
      echo '<option value="2">Для влюблённых</option>';
    }
    if($family < 3)
    {
      echo '<option value="3">Семейный</option>';
    }
    if($econom < 3)
    {
      echo '<option value="4">Эконом</option>';
    }

  echo '</select>

  <br>
    <label for="login_password">Фамилия*</label>
    <input type="text" class="form-control" name="surname" id="password" name="pass" placeholder="">
    <label for="login_password">Имя*</label>
    <input type="text" class="form-control" name="name" id="password" name="pass" placeholder="">
    <label for="login_password">Отчество*</label>
    <input type="text" class="form-control" name="middle_name" id="password" name="pass" placeholder="">
    <label for="login_password">Страна прибытия*</label>
    <input type="text" class="form-control" name="country" id="password" name="pass" placeholder="">
    <label for="login_password">Серия и номер паспорта*</label>
    <input type="text" class="form-control" name="passport" id="password" name="pass" placeholder="">
    <label for="login_password">Номер телефона</label>
    <input type="text" class="form-control" name="phone" id="password" name="pass" placeholder="">
    <label for="login_password">Дата заселения*</label>
    <input type="text" class="form-control" name="income" id="password" name="pass" placeholder="">
    <label for="login_password">Дата выезда*</label>
    <input type="text" class="form-control" name="outcome" id="password" name="pass" placeholder="">
    <br>
    <label for="login_password">* - обязательно для заполнения</label>
  </div>
  <button type="submit" class="btn btn-primary" name="makeorder">Оплатить</button>
  </div>
  </form>
  ';
}

function comment()
{
  echo '<form action="reports.php" method = "POST">
  <div style= "margin: 0 auto; width: 40%" >
  <div class="form-group">
    <label for="login_password">Понравилось у нас? Оставьте свой отзыв!</label>
    <input type="text" class="form-control" name="comm" id="password" name="pass" placeholder="">
  </div>
  <button type="submit" class="btn btn-primary" name="commentbtn">Отправить</button>
  </div>
  </form>
  ';
}

function show_comments()
{
  require("connection.php");
  $query = "SELECT * FROM comments";
  $result = mysqli_query($connection, $query);
  $res = mysqli_fetch_all($result);
  $rows = mysqli_num_rows($result);

echo '<div style="margin: 0 auto; width: 30%;">';
  for ($i=0; $i < $rows ; $i++)
  {
    echo '<img src="sep.jpg" width="100%" height="10px">';

    echo $res[$i][2];
    echo '<br />';
    echo $res[$i][3]; echo '<br />';
  }
echo '</div>';
}

function build_navbar()
{
  echo '<nav class="navbar navbar-expand-lg bg-light sticky-top">
    <a href="#" class="navbar-brand">
      <img src="logo.png" width="40" height="40" alt="logo">
      </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse"
  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php"><b>Домой</b> <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="sessions.php"><b>Номера</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="reports.php"><b>Отзывы</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><em>Желание клиента - это для нас закон</em></a>
    </li>';
    if($_SESSION['priority'] == "admin")
    {
        echo '<li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Режим администратора</a>
        </li>';
    }
  echo '</ul>';

  if ($_SESSION['priority'] == "admin")
  {
    echo '<form method="POST" action="logout.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-dark">Выйти</button>
    </form>
    <form method="POST" action="adminpanel.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-dark">Редактировать</button>
    </form>
    </div>
    </nav>';
  }

  if ($_SESSION['priority'] == "user")
  {
    echo '<form method="POST" action="logout.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-dark">Выйти</button>
    </form>
    </div>
    </nav>';
  }

  if(!($_SESSION['priority']))
  {
    echo '<form method="POST" action="register.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-dark">Войти</button>
    </form>
    </div>
    </nav>';
  }

}

function build_sessions()
{
  require("connection.php");
  $query = "SELECT * FROM sessions";
  $result = mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);

    for ($i=0; $i < $count; $i++)
    {
        while($row = mysqli_fetch_array($result))
        {
        echo '<div class="card" style="width: 20rem; margin: 0.5%; display: inline-block; vertical-align: top; text-align: justify;">';
        echo '<img src='.$row[img].' width="50" height="250" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">'.$row[title].'</h5>
        <p class="card-text">'.$row[description].'</p>
        <p class="card-text">Бесплатный завтрак: '.$row[ctime].'</p>
        <p class="card-text">Удобства: '.$row[start].'</p>
        <p class="card-text">Услуги: '.$row[stop].'</p>
        <p class="card-text">'.$row[cost].'</p>
        <a href="regroom.php" class="btn btn-primary">Купить</a>';
        echo '</div>';echo '</div>';
        }
    }
}

function build_main_card()
{
  require("connection.php");
  $id = 1;
  $query = "SELECT * FROM cards WHERE id = '$id'";
  $data = mysqli_query($connection, $query);
  $ddata = mysqli_fetch_assoc($data);
  echo'  <div class="row">
  <div class = "col-xl-3">
    <div class="card" style="width: 13rem; left: 50px; top: 25px">
    <img src='.$ddata['img'].' class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title">'.$ddata['title'].'</h5>
    <p class="card-text">'.$ddata['ctext'].'</p>
    <a href="#" class="btn btn-primary">Подробнее</a>
    </div>
    </div>
  </div>';
}

function build_carousel()
{
  require("connection.php");
  $query = "SELECT * FROM carousel";
  $result = mysqli_query($connection, $query);
  $count = mysqli_num_rows($result);
  echo '<div class = "col-xl-8">
    <div class="bd-example">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">';


          for($i = 0; $i < $count; $i++)
          {
            if($i == 0)
            {
            echo '<li data-target="#carouselExampleCaptions" data-slide-to='.$i.' class="active"></li>';
            continue;
            }
            echo '<li data-target="#carouselExampleCaptions" data-slide-to='.$i.'></li>';
          }

          echo '</ol> <div class="carousel-inner">';

          for ($i=0; $i < $count + 1; $i++)
          {
            while($row = mysqli_fetch_array($result))
            {
              if($i == 0)
              {
              echo '<div class="carousel-item active">
              <img src='.$row[img].' class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              <h5>'.$row[label].'</h5>
              <p>'.$row[ttext].'</p>
              </div>
              </div>'; $i++;
              }

              else
              {
              echo '<div class="carousel-item">
              <img src='.$row[img].' class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              <h5>'.$row[label].'</h5>
              <p>'.$row[ttext].'</p>
              </div>
              </div>';
              }
            }
          }

          echo '</div>';

        echo '<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        </div>
        </div>
        </div>';
}

 ?>

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
 </html>
