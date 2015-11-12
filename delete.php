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

    <article>
      삭제되었습니다.
    <?php
    if( empty($_GET['id']) === false ){
      $sql="SELECT topic.id,title,name,description  FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
      $result=mysqli_query($conn, $sql);
      $row=mysqli_fetch_assoc($result);
      echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
      echo '<p>'.htmlspecialchars($row['name']).'</p>';
      echo strip_tags($row['description'],'<a><h1><h2><h3><h4><h5><ul><ol><li>');
      echo '<br><br>';
      echo '<a href="http://localhost:8080/update.php?id='.$row['id'].'" class="btn btn-success btn-lg">'.수정.'</a>';
      echo '<a href="" class="btn btn-success btn-lg">'.삭제.'</a>';
    }
    ?>
    </article>
<hr>
    <div id="control">
      <div class="btn-group" role="group" aria-label="...">
        <input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-default btn-lg" />
        <input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-default btn-lg" />
      </div>
      <a href="http://localhost:8080/write.php" class="btn btn-success btn-lg">쓰기</a>
    </div>

    </div>

    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>
