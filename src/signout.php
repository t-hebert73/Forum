<?php
/*
 * filename: signout.php
 * last edited: April 20, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This logs out the user.
 */
session_start();
session_destroy();
header('Location:index.php');
exit;
?>
