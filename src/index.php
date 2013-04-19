<?php
/*
 * filename: index.php
 * last edited: April 16, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This is the index page.
 */

 //include the connect and header files
include 'connect.php';
include 'header.php';
?>
	<h1>Welcome to the best forum!</h1>
	<p>You can do forum things here!</p>
	<p>If you want <a href="signin.php">sign in</a> and start posting.</p>

	<?php
		// Display the sections currently registered
		$q_sec = mysql_query("SELECT * FROM section ORDER BY sec_name");
		while( $r_sec = mysql_fetch_array($q_sec) ):
	?>
		<div class="section" style="background-color:white; border:1px solid #333; border-radius:3px; margin-bottom:10px;">
			<h2><?php echo $r_sec['sec_name']; ?></h2>
			<?php
				// Get the topics for that section
				$q_top = mysql_query("SELECT * FROM topic WHERE sec_id=".$r_sec['sec_id']." ORDER BY topic_name");
				while( $r_top = mysql_fetch_array($q_top) ):
			?>
				<h4><?php echo $r_top['topic_name']; ?></h4>
			<?php endwhile; ?>
		</div>
	<?php endwhile; ?>

<?php
include 'footer.php';
?>