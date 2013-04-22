<?php
/*
 * filename: newThread.php
 * last edited: April 20, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This is create thread page.
 */
 
//include the connect and header files 
include 'connect.php';
include 'header.php';

// Check to see if it's a post
if( isset($_POST['submit']) && isset($_SESSION['signed_in']) ){
	// Get the values of the post
	$thread_name = $_POST['thread_name'];
	$thread_comm = $_POST['thread_text'];
	$topic_id = $_POST['topic_id'];
	
	// Insert the thread
	mysql_query("INSERT INTO thread (user_id,topic_id,thread_name,thread_date) VALUES (".$_SESSION['user_id'].", ".$topic_id.", '".$thread_name."', NOW())");
	
	// Get the id of the thread
	$thread_id = mysql_insert_id();
	
	// Insert the comment
	mysql_query("INSERT INTO comment (user_id,thread_id,comment_text,comment_date) VALUES (".$_SESSION['user_id'].", ".$thread_id.", '".$thread_comm."', NOW())");
	
	// Go to the thread
	header('location:thread.php?id='.$thread_id);
	exit();
}

// Make sure the user has logged in
if(!isset($_SESSION['signed_in'])):?>
	<p>Please <a href="signin.php">login</a> here</p>
<?php else: ?>
	<div class="section container">
		<h3>New Thread</h3>
		<form action="newThread.php" method="post">
			<table>
				<tr><td>Name: </td><td><input type="text" name="thread_name" placeholder="Thread Name" required="required"></td></tr>
				<tr><td>Text: </td><td><textarea rows="10" cols="50" name="thread_text" placeholder="Thread Comment" required="required"></textarea></td></tr>
				<tr><td><input class="btn" type="submit" name="submit" value="Post"></td></tr>
			</table>
			<input type="hidden" name="topic_id" value="<?php echo $_GET['id']; ?>">
		</form>
	</div>
<?php endif; include 'footer.php'; ?>