<?php
include('header.php');
?>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="script.js"></script>

    <article>
    <?php
    if( empty($_GET['id']) === false ){
      $sql="SELECT topic.id,title,name,description  FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
      $result=mysqli_query($conn, $sql);
      $row=mysqli_fetch_assoc($result);
      echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
      echo '<p>'.htmlspecialchars($row['name']).'</p>';
      echo strip_tags($row['description'],'<a><h1><h2><h3><h4><h5><ul><ol><li>');
      echo '<br><br>';
      echo '<a href="http://localhost:8080/update.php?id='.$_GET['id'].'" class="btn btn-success btn-lg">'.수정.'</a>';
      echo '<a href="http://localhost:8080/delete-process.php?id='.$_GET['id'].'" class="btn btn-success btn-lg">'.삭제.'</a>';
    }
    ?>
    </article>
<hr>



<?php


  if(empty($_GET['id']) === false ) {
    echo "<h2>Comments.....</h2>";
  }
?>

<div class="comment-block">
<!-- comment will be apped here from db -->
<?php

    if(empty($_GET['id']) === false ) {
      $sql_comment = "SELECT `comment.id`, name, `date`, comment FROM comment WHERE post_id=".$_GET['id'];
      $result_comment = mysqli_query($conn, $sql_comment);
      while($row_comment = mysqli_fetch_assoc($result_comment)) {
?>

<div class="comment-item">
    <h3><?php echo $row_comment['name']; ?> <span>said....</span></h3>
    <p><?php echo $row_comment['mail']; ?></p>
    <p><?php echo $row_comment['comment']; ?></p>
</div>
<?php
}
}
 ?>
</div>

<?php

  if(empty($_GET['id']) === false ) {
      echo "<h2>Submit new comment</h2>";
      echo "<form id='form' method='post'>";
      echo "<input type='hidden' name='post_id' value='".$_GET['id']."'/>";

      echo "<label>";
      echo "<span>Name *</span>";
      echo "<input type='text' name='name' id='comment-name' placeholder='Your name here....' required/>";
      echo "</label>";
      echo "<label>";
      echo "<span>Email *</span>";
      echo "<input type='email' name='mail' id='comment-mail' placeholder='Your mail here....' required/>";
      echo "</label>";
      echo "<label>";
      echo "<span>Your comment *</span><br>";
      echo "<textarea name='comment' id='comment' cols='30' rows='10' placeholder='Type your comment here....' required></textarea>";
      echo "</label>";

      echo "<input type='submit' id='submit' value='Submit Comment'/>";
      echo "</form>";
    }

?>

<?php
  include('footer.php')
 ?>
