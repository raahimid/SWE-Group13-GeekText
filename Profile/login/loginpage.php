<?php
		 	session_start();

           include '../init.php';
		 
			
		   
?>

<form action="login.php" method="post">
    <fieldset>
        <legend>Login Page</legend>
        <ul>
            <li>
                <label>Username:</label>
                <input type="text" name="username">
            </li>
            <li>
                <label>Password:</label>
                <input type="password" name="password">
            </li>

           
                <label> </label>
                <input type="submit" name="login" value="Login">
        </ul>
    </fieldset>

</form>
<form action="../sign up/sign up.php" method="post">
Don't have an account? Sign up 
<input type="submit" name="login" value="sign up">