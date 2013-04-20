<?php  
/*
 * filename: signup.php
 * last edited: April 16, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This file connects to the database
 */

//include the database and header files
include 'connect.php';  
include 'header.php'; 

  
?>
<h2>Sign up</h2>
<?php
  
if($_SERVER['REQUEST_METHOD'] != 'POST')  
{  
    /*The form has not been posted so display it */  
	?><form class="form-horizontal" method="post" action="">
		<div class="control-group">
			<label class="control-label" for="user_name">Username: </label>
				<div class="controls">
					<input type="text" name="user_name" placeholder="Username"> 
				</div>
		</div>
		
		<div class="control-group">
   			<label class="control-label" for="user_pass">Password: </label>
   				<div class="controls">
   					<input type="password" name="user_pass" placeholder="Password">  
   				</div>
		</div>
   		
   		<div class="control-group">
        	<label class="control-label" for="user_pass_check">Retype Password: </label>
        		<div class="controls"> 
        			<input type="password" name="user_pass_check" placeholder="Retype Password">  
        		</div>
        </div>
        
        <div class="control-group">
        	<label class="control-label" for="user_email">E-mail: </label>
        		<div class="controls">
        			<input type="email" name="user_email" placeholder="Email">
        		</div>  
        </div>
        
        <div class="control-group">
        	<div class="controls">
        		<button type="submit" class="btn btn-success">Sign up</button> 
        	</div>  
        </div>
        
  	 </form>
   <?php 
} 
else /*  the form has been posted */
{ 
     
    $errors = array(); /* create the error array */  
      
    if(isset($_POST['user_name']))  //checks if the username has been entered
    {  
        //the user name has been entered
        if(!ctype_alnum($_POST['user_name']))  //check if it has non alphanumeric characters
        {  
            $errors[] = 'The username can only contain letters and digits.'; //it does so add it to error array 
        }  
        if(strlen($_POST['user_name']) > 40)  //check the length of the username entered
        {  
            $errors[] = 'The username cannot be longer than 40 characters.';  //username is too long so add it to error array
        }  
    }  
    else  // the username wasn't entered
    {  
        $errors[] = 'The username field must not be empty.';  //username wasn't added so add that to error array
    }  
      
      
    if(isset($_POST['user_pass']) && $_POST['user_pass'] != "")   //check if the user entered a password
    {  
        if($_POST['user_pass'] != $_POST['user_pass_check'])  //check that the entered password and retyped password are the same
        {  
            $errors[] = 'The two passwords did not match.';  //they are not the same so add error
        }  
    }  
    else  // the user didn't enter a password
    {  
        $errors[] = 'The password field cannot be empty.';  //add it to error array
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
        //create the query with encryption
        $sql = "INSERT INTO users(user_name, user_pass, user_email ,user_date, user_level) VALUES('" . mysql_real_escape_string($_POST['user_name']) . "', '" . sha1($_POST['user_pass']) . "', '" . mysql_real_escape_string($_POST['user_email']) . "', NOW(), 0)";  
        // hold the results                  
        $result = mysql_query($sql);  
        if(!$result)  //if the query was unsuccessful
        {  
            //display the error  
            echo 'There is already a user registered with that username or email.'; 
        } 
        else  // the query was successful
        { 
            echo 'Thank you for registering!. You can now <a href="signin.php">sign in</a> and start posting! Have fun!'; //success!
        } 
    } 
} 
 
 //include the footer
include 'footer.php';  
?>  