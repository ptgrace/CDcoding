<?php
include('header.php');
?>

    <article>
      <form action="write-process.php" method="post">
        <div class="form-group">
          <label for="form-title">제목</label>
          <input type="text" name="title" class="form-control" id="form-title" placeholder="제목을 적어주세요">
        </div>

        <div class="form-group">
          <label for="form-author">작성자</label>
          <input type="text" name="author" class="form-control" id="form-author" placeholder="이름을 적어주세요">
        </div>

        <div class="form-group">
          <label for="form-author">본문</label>
          <textarea class="form-control" rows="10" name="description" id="form-author" placeholder="본문을 적어주세요"></textarea>
        </div>

        <input type="submit" name="name" class="btn btn-default btn-lg">
      </form>
    </article>
<hr>

<?php
include('footer.php');
?>
