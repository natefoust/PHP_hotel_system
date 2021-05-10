<?php
  require("functions.php");
  require("connection.php");

  if(isset($_POST['sesbtn']))
  {
    $sesname = $_POST['sesname'];
    $sesimg = $_POST['sesimg'];
    $sestext = $_POST['sestext'];
    $sesstart = $_POST['sesstart'];
    $sesend = $_POST['sesend'];
    $sescost = $_POST['sescost'];
    $sestime = $_POST['sestime'];
    mysqli_query($connection, "INSERT INTO sessions(title, ctime, cost, description, start, stop, img) VALUES ('$sesname', '$sestime', '$sescost', '$sestext', '$sesstart' ,'$sesend' ,'$sesimg')");
  }

  if (isset($_POST['cardname']) && isset($_POST['cardimg']) && isset($_POST['cardtext']) && isset($_POST['cardbtn']))
  {
    $query ="DELETE FROM cards WHERE id = '1'";
    mysqli_query($connection, $query);
    $cardname = $_POST['cardname'];
    $cardimg = $_POST['cardimg'];
    $cardtext = $_POST['cardtext'];
    mysqli_query($connection, "INSERT INTO cards(id,title, ctext, img) VALUES ('1','$cardname', '$cardtext', '$cardimg')");
  }

  $submit = $_POST['c'];
  if(isset($submit))
  {
    $cname = $_POST['cname'];
    $ctext = $_POST['ctext'];
    $cimg = $_POST['cimg'];
    echo "$cname";
    mysqli_query($connection, "INSERT INTO carousel(label, ttext, img ) VALUES ( '$cname', '$ctext', '$cimg' )");
  }

  if(isset($_POST['delses']))
  {
    $del = $_POST['dname'];
    mysqli_query($connection, "DELETE FROM sessions WHERE title = '$del'");
  }

 ?>

<html>
<head>
</head>
<body>
  <center>
  <form method="POST" action="adminpanel.php">
  Карточка: <br>
  <table border="1">
  <tr> <td>Название</td> <td><input type="text" name="cardname"></td> </tr>
  <tr> <td>Картинка</td> <td><input type="text" name="cardimg"></td> </tr>
  <tr> <td>Текст</td> <td><input type="text" name="cardtext"></td> </tr>
  </table>
  <button type="submit" name="cardbtn">изменить</button>
</form>

  Номера:
  <form method="POST" action="adminpanel.php">
    <table border="1">
    <tr> <td>Название</td> <td><input type="text" name="sesname"></td> </tr>
    <tr> <td>Картинка</td> <td><input type="text" name="sesimg"></td> </tr>
    <tr> <td>Описание</td> <td><input type="text" name="sestext"></td> </tr>
    <tr> <td>Удобства</td> <td><input type="text" name="sesstart"></td> </tr>
    <tr> <td>Услуги</td> <td><input type="text" name="sesend"></td> </tr>
    <tr> <td>Цена</td> <td><input type="text" name="sescost"></td> </tr>
    <tr> <td>Бесплатный завтрак</td> <td><input type="text" name="sestime"></td> </tr>
  </table>
  <button type="submit" name="sesbtn">изменить</button>
  </form>

  Карусель:
  <form method="POST" action="adminpanel.php">
    <table border="1">
    <tr> <td>Заголовок</td> <td><input type="text" name="cname"></td> </tr>
    <tr> <td>Описание</td> <td><input type="text" name="ctext"></td> </tr>
    <tr> <td>Картинка</td> <td><input type="text" name="cimg"></td> </tr>
  </table>
  <button type="submit" name="c">изменить</button>
  </form>

  Удалить номер:
  <form method="POST" action="adminpanel.php">
    <table border="1">
    <tr> <td>Название</td> <td><input type="text" name="dname"></td> </tr>
  </table>
  <button type="submit" name="delses">удалить</button>
  </form>

  <form method="POST" action="index.php">
    <button type="submit" name="exbtn">Выйти</button>
  </form>

</center>

</body>
</html>
