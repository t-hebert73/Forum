<?php
/*
 *
 * filename: newSection.php
 * last edited: April 22, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: Creates a section on the forum
 *
 */
 include 'connect.php';
 
 // Get the name of the section
 $name = $_POST['sec_name'];
 
 // Run the query
 mysql_query("INSERT INTO section (sec_name,sec_date) VALUES ('".$name."', NOW())");
 
 // Back to the index
 header('location:index.php');