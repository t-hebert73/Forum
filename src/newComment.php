<?php
/*
 * filename: newComment.php
 * last edited: April 20, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: Creates a comment within a thread.
 */
 
//include the connect and header files 
include 'connect.php';
include 'header.php';

// Check to see if it's a post
if( isset($_POST['submit']) && isset($_SESSION['signed_in']) ){
	// Get the values of the post
	$comment = $_POST['comment'];
	$thread_id = $_POST['thread_id'];
	
	// Insert the comment
	mysql_query("INSERT INTO comment (user_id,thread_id,comment_text,comment_date) VALUES (".$_SESSION['user_id'].", ".$thread_id.", '".$comment."', NOW())");
	
	// Go to the thread
	header('location:thread.php?id='.$thread_id);
	exit;
}

// Make sure the user has logged in  
if(!isset($_SESSION['signed_in'])):?>
<<<<<<< HEAD
	<div class="section container">
		<h3>Please signin <a href="signin.php">here</a></h3>
	</div>
=======
	<p>Please <a href="signin.php">login</a> here</p>
>>>>>>> fourth commit
<?php else: ?>
	<div class="section container">
		<h3>Reply</h3>
		<form action="newComment.php" method="POST">
			<table>
				<tr><td>Reply :</td><td><textarea name="comment" placeholder="Reply" required="required"></textarea></td></tr>
				<tr><td><input class="btn" type="submit" name="submit" value="Reply"></td></tr>
			</table>
			<input type="hidden" name="thread_id" value="<?php echo $_GET['id']; ?>">
		</form>
	</div>
<?php endif; include 'footer.php'; ?>