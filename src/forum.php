<?php
/*
 * filename: forum.php
 * last edited: April 18, 2013
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
			<div class="span2"><h4>Threads</h4></div>
		</div>
		<div class="row">
			<div class="span10">test123</div>
			<div class="span2">234123</div>
		</div>
	</div>
<?php
include 'footer.php';// include the footer file
?>