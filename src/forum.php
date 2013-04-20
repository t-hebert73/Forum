<?php
/*
 * filename: forum.php
 * last edited: April 19, 2013
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
	<p><?php echo $r['topic_desc']; ?></p>
	
	<div class="container section">
		<div class="row">
			<div class="span10"><h4>Name</h4></div>
			<div class="span1"><h4>Date</h4></div>
			<div class="span1"><h4>Replies</h4></div>
		</div>
		<?php
		// Get all of the threads from that topic
		// TODO : Limit the number of threads.
		$q = mysql_query("SELECT t.*, COUNT(c.user_id) AS replies FROM thread t LEFT JOIN comment c ON t.thread_id=c.thread_id AND t.topic_id=".$_GET['id']);
		
		// Display all of the threads
		while( $r = mysql_fetch_array($q) ):
		?>
			<div class="row">
				<div class="span10"><?php echo $r['thread_name']; ?></div>
				<div class="span1"><?php echo date('Y/m/d', strtotime($r['thread_date'])); ?></div>
				<div class="span1"><?php echo $r['replies']; ?></div>
			</div>
		<?php endwhile; ?>
	</div>
<?php
include 'footer.php';// include the footer file
?>