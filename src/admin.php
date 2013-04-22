<?php
/*
 *
 * filename: admin.php
 * last edited: April 22, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This is the admin's main page. Allows to add/remove sections and topics
 *
 */
 
 //Start sessions
 session_start();
 include 'connect.php';
 
 // Check the user is an admin
 if( isset($_SESSION['user_level']) && $_SESSION['user_level'] == 0 ){
	header('location:index.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Forum - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This the login page for the forum.">
    <meta name="author" content="Trevor Hebert">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/forum.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->    
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">Forum</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
			  <?php
				// Check if the user is an admin
				if(isset($_SESSION['signed_in']) && $_SESSION['user_level'] == 1 ):
			  ?>
				<li class="active"><a href="admin.php">Admin</a></li>
			  <?php
				endif;
				//check the session variable to see if already logged in 
				if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true): //if the user is signed in show the edit profile and sign out tabs in the nav
				?>
				<li><a href="editProfile.php">Profile</a></li>
				<li><a href="signout.php">Sign Out</a></li>
				<?php else: ?> <!-- the user isn't signed in so show sign up and sign in tabs in the nav-->
              <li><a href="signup.php">Signup</a></li>
              <li><a href="signin.php">Sign In</a></li>
				<?php endif; ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
		<div class="section container">
			<h2>Sections</h2>
			
			<form action="newSection.php" method="post">
				<table>
					<tr><td><label for="sec_name">Name: </label></td><td><input id="sec_name" type="text" required="required" placeholder="Name" name="sec_name"></td></tr>
					<tr><td><input type="submit" class="btn btn-primary" name="sec_create" value="Create"></td></tr>
				</table>
			</form>
			<hr>
			<form action="deleteSection.php" method="post">
			<table class="table table-striped">
				<tr><th class="span10">Section</th><th class="span2">Action</th></tr>
				<?php
					// Get all of the sections
					$q = mysql_query("SELECT * FROM section");
					while($r = mysql_fetch_array($q)):
				?>
					<tr>
						<td><label for="<?php echo 'sec_'.$r['sec_id']; ?>"><?php echo $r['sec_name']; ?></label></td>
						<td><input id="<?php echo 'sec_'.$r['sec_id']; ?>" name="section[]" type="checkbox" value="<?php echo $r['sec_id']; ?>"></td>
					</tr>
				<?php endwhile; mysql_data_seek($q, 0); ?>
				<tr><td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td><td></td></tr>
			</table>
			</form>
		</div>
		
		<div class="section container">
			<h2>Topics</h2>
			
			<form action="newTopic.php" method="post">
				<table>
					<tr><td><label for="topic_name">Name: </label></td><td><input id="topic_name" type="text" required="required" placeholder="Name" name="topic_name"></td></tr>
					<tr><td>Section: </td><td>
						<select name='section'><?php
						// Get all of the sections
						//$q = mysql_query("SELECT * FROM section");
						while($r = mysql_fetch_array($q)){
							echo "<option value='".$r['sec_id']."'>".$r['sec_name']."</option>";
						}
						?>
						</select></td></tr>
					<tr><td><label for="topic_desc">Description: </label></td><td><textarea id="topic_desc" name="topic_desc" required="required" placeholder="Topic Description"></textarea></td></tr>
					<tr><td><input type="submit" class="btn btn-primary" name="topic_create" value="Create"></td></tr>
				</table>
			</form>
			<hr>
			<form action="deleteTopic.php" method="post">
			<table class="table table-striped">
				<tr><th class="span10">Topic</th><th class="span2">Action</th></tr>
				<?php
					// Get all of the sections
					$q = mysql_query("SELECT * FROM topic");
					while($r = mysql_fetch_array($q)):
				?>
					<tr>
						<td><label for="<?php echo 'topic_'.$r['topic_id']; ?>"><?php echo $r['topic_name']; ?></label></td>
						<td><input id="<?php echo 'topic_'.$r['topic_id']; ?>" name="topic[]" type="checkbox" value="<?php echo $r['topic_id']; ?>"></td>
					</tr>
				<?php endwhile; ?>
				<tr><td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td><td></td></tr>
			</table>
			</form>
		</div>
	</div>
<?php include 'footer.php'; ?>