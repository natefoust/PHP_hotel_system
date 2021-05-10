<?php
  session_start();

  unset($_SESSION['priority']);
  header("Location: http://cinema/index.php");
 ?>
