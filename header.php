<?php
include('session.php');
?>
<?php
  require("config/config.php");
  require("lib/db.php");
  $conn=db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
  $result=mysqli_query($conn,"SELECT*FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

     <link rel="stylesheet" type="text/css" href="/style.css">

     <link href="/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">



</head>
<body id="target">
  <div class="container">
    <header>
        <div>
          ID : <input type="text">
          PASSWORD : <input type="text">
          <input type="button" value="로그인">
          <input type="button" value="회원가입">
        </div>
        <div class="jumbotron text-center">
        <img src="http://pds15.egloos.com/pds/200907/10/70/d0062670_4a56a5c42f1f5.jpg" alt="웹앱만들어보기" class="img-circle" id="logo">
        <h1><a href="/list.php">JavaScript</a></h1>
        </div>
    </header>
    <div class="row">

    <nav class="col-md-3">
        <ol class="nav nav-pills nav-stacked">
        <?php
        while( $row=mysqli_fetch_assoc($result) ){
          echo '<li><a href="/list.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
        }
        ?>
        </ol>
    </nav>

    <div class="col-md-9">

    <div id="profile">
      <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
      <b id="logout"><a href="logout.php">Log Out</a></b>
    </div>
