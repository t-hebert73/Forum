<?php
/*
 * filename: editProfile.php
 * last edited: April 20, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This is the edit profile page. The user can fill out the form to update their account details
 */

 //include the connect and header files
include 'connect.php';
include 'header.php';
?>


<h2>Edit Profile</h2>

<?php
	if($_SERVER['REQUEST_METHOD'] != 'POST'){ ?>
		
		<p>Fill in the fields below with updated information to update your profile.</p>

		<!--The form has not been posted so display it -->
		<form class="form-horizontal" method="post" action="">
		
			<div class="control-group">
   				<label class="control-label" for="user_pass">New Password: </label>
   					<div class="controls">
   						<input type="password" name="user_pass" placeholder="New Password">  
   					</div>
			</div>
   		
   			<div class="control-group">
        		<label class="control-label" for="user_pass_check">Retype New Password: </label>
        			<div class="controls"> 
        				<input type="password" name="user_pass_check" placeholder="Retype New Password">  
        			</div>
        	</div>
        
       		<div class="control-group">
        		<label class="control-label" for="user_email">New E-mail: </label>
        			<div class="controls">
        				<input type="email" name="user_email" placeholder="Email">
        			</div>  
        	</div>
        
        	<div class="control-group">
        		<div class="controls">
        			<button type="submit" class="btn btn-info">Update Information</button> 
        		</div>  
        	</div>
        
  		</form><?php
	}
		else //the form has been posted
	{
		
		$errors = array(); /* create the error array */  
      
    	if(isset($_POST['user_pass']) && $_POST['user_pass'] !="" && $_POST['user_pass_check'] !="")  //check if the user entered a password
    	{  
        	if($_POST['user_pass'] != $_POST['user_pass_check'])  //check that the entered password and retyped password are the same
        	{  
            	$errors[] = 'The two passwords did not match.';  //they are not the same so add error
        	}  
    	}  
    	else  // the user didn't enter a password
    	{  
        	$errors[] = 'The password fields cannot be empty.';  //add it to error array
    	}  
		
		if(isset($_POST['user_email']) && $_POST['user_email'] != "") //check if the user entered an email
		{
			//$errors[] = 'The email field cannot be empty.'; //add to the error array
		
		}
		else
		{
			$errors[] = 'The email field cannot be empty.'; //add to the error array
		}
		
      
    	if(!empty($errors)) // if the error array isnt empty
    	{  
        	echo 'Uh-oh.. a couple of fields are not filled in correctly..'; //display the error message
        	echo '<ul>'; 
        	foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */ 
        	{ 
            	echo '<li>' . $value . '</li>'; /* this generates a nice error list */ 
        	} 
        	echo '</ul>';
		 
    	}
    	else // there are no errors
    	{
    		//create the update query with encryption
			$updateSql = "UPDATE users SET user_pass='". sha1($_POST['user_pass']) ."', user_email='". mysql_real_escape_string($_POST['user_email']) ."' WHERE user_id='". $_SESSION['user_id'] ."'"; 
        	// hold the results
        	$updateResult = mysql_query($updateSql);
        	
        	if(!$updateResult)  //if the query was unsuccessful
        	{  
            	//display the error  
            	echo 'There was an error updating the database'; 
        	} 
        	else //the query was successful
        	{ 
            	echo 'You have successfully updated your profile! Why not try to <a href="index.php">post</a> something. Have fun!'; //success!
        	} 
    	} 
	}

?>






<?php
include 'footer.php';
?>