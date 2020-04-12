<?php 
	include '../init.php';

	header('Content-type:text/html; charset=utf-8');
 	session_start();
	if (isset($_POST['login'])) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$sql="SELECT * FROM user WHERE UserName= '$username'";
		$result = $link->query($sql);

		while($row = mysqli_fetch_assoc($result)){
		


		if (($username == '') || ($password == '')) {
			header('refresh:3; url=loginpage.php');
			echo "Username or password can not be empty";
			exit;
		} elseif(password_verify($password,$row['PassWord'] )){
				$_SESSION['username'] = $username;
				$_SESSION['islogin'] = 1;

		
				setcookie('username', $username, time()+20*60);
				
			header('location:../Profile.php');
			}
			else{
			header('refresh:3; url=loginpage.php');
			echo "Username or password wrong";
		}
	}}
 ?>

