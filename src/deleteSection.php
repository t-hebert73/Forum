<?php
/*
 *
 * filename: deleteSection.php
 * last edited: April 22, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This script deletes sections selected
 *
 */
 include 'connect.php';
 
 // Check if we are deleting anything
 if( isset($_POST['section']) ){
	foreach ($_POST['section'] as $id){
		// Delete the section
		mysql_query("DELETE FROM section WHERE sec_id=".$id);
	}
 }
 
 // Go back to the index
 header('location:index.php');