<?php
    //声明变量
	    include '../init.php';

    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $re_password = isset($_POST['re_password'])?$_POST['re_password']:"";
    $first = isset($_POST['first'])?$_POST['first']:"";
    $last = isset($_POST['last'])?$_POST['last']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $phone = isset($_POST['phone'])?$_POST['phone']:"";
    $nick = isset($_POST['nick'])?$_POST['nick']:"";
 if($password == $re_password) {
        //建立连接
        //准备SQL语句,查询用户名
        $sql_select="SELECT UserName FROM user WHERE UserName = '$username'";
        //执行SQL语句
        $ret = mysqli_query($link,$sql_select);
        $row = mysqli_fetch_array($ret);
        //判断用户名是否已存在
        if($username == $row['UserName']) {
            //用户名已存在，显示提示信息
            header("Location:sign up.php?err=1");
        } else {

            //用户名不存在，插入数据
            //准备SQL语句
            $insert = "INSERT INTO user(UserFirst,UserLast,Email,Nickname,Phone,PassWord,UserName) VALUES('$first','$last','$email','$nick','$phone','$password','$username')";            //执行SQL语句
            mysqli_query($link,$insert);
			$sql = "SELECT UserID FROM user where UserName= '$username' ";
			$result = $link->query($sql);
		while($row = mysqli_fetch_assoc($result))
		
		{
    
            $insertid = "INSERT INTO shipping(UserID) VALUES(" . $row['UserID'] . ")";           
            mysqli_query($link,$insertid);
            header("Location:profile.php?err=3");
			}
        }

        //关闭数据库
        mysqli_close($link);
    } else {
        header("Location:sign up.php?err=2");
    }


?>