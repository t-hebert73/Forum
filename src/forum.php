<?php
/*
 * filename: forum.php
 * last edited: April 20, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This is the forum page.
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
$q = mysql_query("SELECT * FROM topic WHERE topic_id=".$_GET['id']);
$r = mysql_fetch_array($q);
?>
	<!-- Display the title and description of the topic -->
    <h1><?php echo $r['topic_name']; ?></h1>
	<div class="container">
		<div class="row">
			<div class="span11"><p><?php echo $r['topic_desc']; ?></p></div>
			<div class="span1 centered"><a class="btn btn-small" href="newThread.php?id=<?php echo $_GET['id']; ?>"><i class="icon-file"></i>New</a></div>
		</div>
	</div>
	
	<div class="container section">
		<div class="row">
			<div class="span10"><h4>Name</h4></div>
			<div class="span1"><h4>Date</h4></div>
			<div class="span1"><h4>Replies</h4></div>
		</div>
		<?php
		// Get all of the threads from that topic
		// TODO : Limit the number of threads.
		$q = mysql_query("SELECT t.*, COUNT(c.user_id) AS replies FROM thread t, comment c WHERE t.thread_id=c.thread_id AND t.topic_id=".$_GET['id']." GROUP BY t.thread_id");
		
		// Display all of the threads
		while( $r = mysql_fetch_array($q) ):
		?>
			<div class="row">
				<div class="span10"><a href="thread.php?id=<?php echo $r['thread_id']; ?>"><?php echo $r['thread_name']; ?></a></div>
				<div class="span1"><?php echo date('Y/m/d', strtotime($r['thread_date'])); ?></div>
				<div class="span1"><?php echo $r['replies']-1; ?></div>
			</div>
		<?php endwhile; ?>
	</div>
<?php
include 'footer.php';// include the footer file
?>