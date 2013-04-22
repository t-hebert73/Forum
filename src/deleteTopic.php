<?php
/*
 *
 * filename: deleteTopic.php
 * last edited: April 22, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This script deletes topics selected
 *
 */
 include 'connect.php';
 
 // Check if we are deleting anything
 if( isset($_POST['topic']) ){
	foreach ($_POST['topic'] as $id){
		// Delete the section
		mysql_query("DELETE FROM topic WHERE topic_id=".$id);
	}
 }
 
 // Go back to the index
 header('location:index.php');