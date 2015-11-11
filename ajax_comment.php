<script>
	alert("999")
</script>
<?php
echo "111"
if (isset( $_SERVER['HTTP_X_REQUESTED_WITH'] )) {
echo "333"

	if (!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['comment']) AND !empty($_POST['post_id'])) {
		$name = mysql_real_escape_string($_POST['name']);
		$mail = mysql_real_escape_string($_POST['mail']);
		$comment = mysql_real_escape_string($_POST['comment']);
		$postId = mysql_real_escape_string($_POST['post_id']);


	}
}


?>

<div class="comment-item">
    <h3><?php echo $name; ?> <span>said....</span></h3>
		<p><?php echo $mail; ?></p>
    <p><?php echo $comment; ?></p>
</div>

<?php

echo "222"
?>
