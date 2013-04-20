<?php
/*
 * filename: signin.php
 * last edited: April 16, 2013
 * authors: Trevor Hebert, Miguel Mawyin
 * file description: This file signs the user
 */
  
//include the connect and header files
include 'connect.php';  
include 'header.php';  

?>
<h2>Sign In</h2> 
<?php
  
//check the session variable to see if already logged in 
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)  
{  
    // Go to the index
	header('location:index.php');
	exit;
}  
else // Not already logged in
{  
    if($_SERVER['REQUEST_METHOD'] != 'POST')//check if the form has been posted  
    {  
        /*the form not been posted so display it */  
        ?>
        <form class="form-horizontal" method="post" action="">
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
        	<div class="controls">
        		<button type="submit" class="btn btn-primary">Sign in</button> 
        	</div>  
        </div>
        
  	 </form>
        
     <?php
        
    } 
    else // the form has been posted
    { 
        /* create the error array */ 
        $errors = array();  
          
        if(!isset($_POST['user_name']))  //if the username is not entered
        {  
            $errors[] = 'The username field must not be empty.';  //add the error
        }  
          
        if(!isset($_POST['user_pass']))  //if the password is not entered
        {  
            $errors[] = 'The password field must not be empty.';  //add the error
        }  
          
        if(!empty($errors)) //if there are errors in the errors array
        {  
            echo 'Uh-oh.. a couple of fields are not filled in correctly..'; //display the error message
            echo '<ul>'; 
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */ 
            { 
                echo '<li>' . $value . '</li>'; /* error list items*/ 
            } 
            echo '</ul>'; 
        } 
        else //there are no errors 
        { 
            //create the query with encryption
            $sql = "SELECT user_id, user_name, user_level FROM users WHERE user_name = '" . mysql_real_escape_string($_POST['user_name']) . "' AND user_pass = '" . sha1($_POST['user_pass']) . "'";  
            //get the result
            $result = mysql_query($sql);  
            if(!$result)  //if the query was unsuccessful
            {  
                //display the error  
                echo 'there is an error with the query'; 
            } 
            else //if the query was successful
            { 
                
                if(mysql_num_rows($result) == 0) //if no users were found
                { 
                    echo 'You have supplied a wrong user/password combination. Please try again.'; //display the error message
                } 
                else //a user was found
                { 
                    //set the signed_in session variable to true
                    $_SESSION['signed_in'] = true; 
                     
                    //set the user id, name and level session variables to the current logged in users values
                    while($row = mysql_fetch_assoc($result)) //while there are results
                    { 
                        $_SESSION['user_id']    = $row['user_id']; 
                        $_SESSION['user_name']  = $row['user_name']; 
                        $_SESSION['user_level'] = $row['user_level']; 
                    } 
                   	
					//welcome the user and provide a link to the forum
                    echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to the Forum</a>.'; 
                } 
            } 
        } 
    } 
}
//include the footer.
include 'footer.php';  
?>         