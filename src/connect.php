<?php
/*
 * filename: connect.php
 * last edited: April 22, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 *
 */

//This code connects to the database.
mysql_connect('webdesign4.georgianc.on.ca','db200177840','10174')or die('Unable to connect to database'); 
mysql_select_db('db200177840')or die('Unable to select the forum database'); 

date_default_timezone_set('America/Toronto'); //fixes a stupid php error with timezones
//======================================================================

?>