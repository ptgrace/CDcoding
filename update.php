<?php
include('header.php');
?>

    <article>
      <?php
      if( empty($_GET['id']) === false ){
        $sql="SELECT topic.id,title,name,description  FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        echo
          '<form action="update-process.php" method="post">
            <div class="form-group">
              <input type="hidden" name="id" class="form-control" id="form-title" value="'.htmlspecialchars($row['id']).'">
            </div>

            <div class="form-group">
              <label for="form-title">'.제목.'</label>
              <input type="text" name="title" class="form-control" id="form-title" value="'.htmlspecialchars($row['title']).'">
            </div>

            <div class="form-group">
              <label for="form-author">'.작성자.'</label>
              <input type="text" name="author" class="form-control" id="form-author" readonly value="'.htmlspecialchars($row['name']).'">
            </div>

            <div class="form-group">
              <label for="form-author">'.본문.'</label>
              <textarea class="form-control" rows="10" name="description" id="form-author">'.strip_tags($row['description'],'<a><h1><h2><h3><h4><h5><ul><ol><li><p>').'</textarea>
            </div>

            <input type="submit" name="name" class="btn btn-default btn-lg">
          </form>';
      }
      ?>
    </article>
<hr>

<?php
include('footer.php');
?>
