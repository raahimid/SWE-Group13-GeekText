<?php
   include("header.php");

    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $re_password = isset($_POST['re_password'])?$_POST['re_password']:"";
    $first = isset($_POST['first'])?$_POST['first']:"";
    $last = isset($_POST['last'])?$_POST['last']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $phone = isset($_POST['phone'])?$_POST['phone']:"";
    $nick = isset($_POST['nick'])?$_POST['nick']:"";
 if($password == $re_password) {
       
        $sql_select="SELECT UserName FROM user WHERE UserName = '$username'";
        $ret = mysqli_query($link,$sql_select);
        $row = mysqli_fetch_array($ret);
        if($username == $row['UserName']) {
            header("Location:sign up.php?err=1");
        } else {
		if(!isset($password{5})){
		 header("Location:sign up.php?err=4");

		
		}
		else{
			$hash = password_hash($password, PASSWORD_DEFAULT);

            $insert = "INSERT INTO user(UserFirst,UserLast,Email,Nickname,Phone,PassWord,UserName) VALUES('$first','$last','$email','$nick','$phone','$hash','$username')";            //Ö´ÐÐSQLÓï¾ä
            mysqli_query($link,$insert);
			$sql = "SELECT UserID FROM user where UserName= '$username' ";
			$result = $link->query($sql);
		while($row = mysqli_fetch_assoc($result))
		
		{
    
            $insertid1 = "INSERT INTO shipping(UserID) VALUES(" . $row['UserID'] . ")"; 
			 $insertid2 = "INSERT INTO billing(UserID) VALUES(" . $row['UserID'] . ")"; 
            mysqli_query($link,$insertid1);
			mysqli_query($link,$insertid2);
            header("Location:../profile.php?err=3");
			}
        }}

        mysqli_close($link);
    } else {
        header("Location:sign up.php?err=2");
    }


?>