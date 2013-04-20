<?php
/*
 * filename: thread.php
 * last edited: April 20, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: Displays a specific thread
 */
 
//include the connect and header files 
include 'connect.php';
include 'header.php';

// Check for the id
if( !isset($_GET['id']) ){
	// Redirect
	header('location:index.php');
}

// Get the information from the id
$q = mysql_query("SELECT * FROM thread WHERE thread_id=".$_GET['id']);
$r = mysql_fetch_array($q);
?>
	<!-- Display the title and description of the topic -->
    <h1><?php echo $r['thread_name']; ?></h1>
	<div class="container">
		<div class="row">
			<div class="span10"><p>Submitted: <?php echo date('Y/m/d', strtotime($r['thread_date'])); ?></p></div>
			<div class="span2 text-right"><a href="newComment.php?id=<?php echo $_GET['id']; ?>" class="btn btn-small"><i class="icon-comment"></i>Comment</a></div>
		</div>
	</div>
	
	<div class="container section">
		<div class="row">
			<div class="span2 centered"><h4>User</h4></div>
			<div class="span10 centered"><h4>Post</h4></div>
		</div>
		<?php
			// Get all of the comments
			$q = mysql_query("SELECT c.*, u.* FROM comment c INNER JOIN users u ON c.user_id=u.user_id AND c.thread_id=".$_GET['id']." ORDER BY c.comment_date");
			while($r = mysql_fetch_array($q)):
		?>
			<div class="row">
				<div class="span2 centered">
					<h4><?php echo $r['user_name']; ?></h4>
					<p>Date Joined: <?php echo date('Y/m/d', strtotime($r['user_date'])); ?></p>
					<p>Posted: <?php echo date('Y/m/d', strtotime($r['comment_date'])); ?></p>
				</div>
				<div class="span10"><?php echo $r['comment_text']; ?></div>
			</div>
		<?php endwhile; ?>
	</div>
	
<?php include 'footer.php'; ?>