<?php
/*
 * filename: connect.php
 * last edited: April 16, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 *
 */

//This code connects to the database.
mysql_connect('localhost','root','root')or die('Unable to connect to database'); 
mysql_select_db('forum')or die('Unable to select the forum database'); 
//======================================================================

?>