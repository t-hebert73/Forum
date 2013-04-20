<?php
/*
 * filename: index.php
 * last edited: April 18, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This is the index page.
 */

 //include the connect and header files
include 'connect.php';
include 'header.php';
?>
	<h1>Welcome to the Best Programming Forum!</h1>
	<p>Hey, want to be cool? Then you should <a href="signup.php">sign up</a> right away.</p>
	<p>If you are cool, then <a href="signin.php">sign in</a> and start posting.</p>

	<?php
		// Display the sections currently registered
		$q_sec = mysql_query("SELECT * FROM section ORDER BY sec_name");
		while( $r_sec = mysql_fetch_array($q_sec) ):
	?>
		<div class="section">
			<h2><?php echo $r_sec['sec_name']; ?></h2>
			<?php
				// Get the topics for that section
				$q_top = mysql_query("SELECT * FROM topic WHERE sec_id=".$r_sec['sec_id']." ORDER BY topic_name");
				while( $r_top = mysql_fetch_array($q_top) ):
			?>
				<h4><a href="forum.php?id=<?php echo $r_top['topic_id']; ?>"><?php echo $r_top['topic_name']; ?></a></h4>
				<p><?php echo $r_top['topic_desc']; ?></p>
			<?php endwhile; ?>
		</div>
	<?php endwhile; ?>

<?php
include 'footer.php';
?>