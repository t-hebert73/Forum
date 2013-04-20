<?php
/*
 *
 * filename: header.php
 * last edited: April 16, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This is the header file. It has the doctype info and nav bar.
 *
 */
 
 //Start sessions
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Forum</title>
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
          <a class="brand" href="index.php">Programming Forum</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
			  <?php
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