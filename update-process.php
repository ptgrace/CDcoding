<?php
  require("config/config.php");
  require("lib/db.php");
  $conn=db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

  $title=mysqli_real_escape_string($conn, $_POST['title']);
  $description=mysqli_real_escape_string($conn, $_POST['description']);


  $sql="UPDATE topic SET title='".$title."', description='".$description."', created=now() WHERE id='".$_POST['id']."'";
  $result=mysqli_query($conn,$sql);
  header('Location: http://localhost:8080/list.php?id='.$_POST['id'].'');
?>
