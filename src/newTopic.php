<?php
/*
 *
 * filename: newTopic.php
 * last edited: April 22, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: Creates a topic on the forum
 *
 */
 include 'connect.php';
 
 // Get the name of the topic
 $sec = $_POST['section'];
 $name = $_POST['topic_name'];
 $desc = $_POST['topic_desc'];
 
 // Run the query
 mysql_query("INSERT INTO topic (sec_id, topic_name, topic_date, topic_desc) VALUES (".$sec.", '".$name."', NOW(), '".$desc."')");
 
 // Back to the index
 header('location:index.php');