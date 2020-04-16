<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<meta name="content-type"; charset="UTF-8">
</head>
<?php
   include("header.php");
?>
<body>
    <div class="content" align="center">
        <div class="header">
        <h1>Sign Up </h1>
        </div>
        <div class="middle">
            <form action="regrister.php" method="post">
                <table border="0">
                    <tr>
                        <td>Username(the name you need to login)：</td>
                        <td><input type="text" id="id_name" name="username" required="required" value = "user"></td>
                    </tr>
                    <tr>
                        <td>Password：</td>
                        <td><input type="password" id="password" name="password" required="required"></td>
                    </tr>
                    <tr>
                        <td>Re-enter：</td>
                        <td><input type="password" id="re_password" name="re_password" required="required"></td>
                    
                    <tr>
                        <td>First Name：</td>
                        <td><input type="text" id="first" name="first" required="required"></td>
                    </tr>
					<tr>
                        <td>Last Name：</td>
                        <td><input type="text" id="last" name="last" required="required"></td>
                    </tr>
                    <tr>
                        <td>Email：</td>
                        <td><input type="email" id="email" name="email" required="required"></td>
                    </tr>
                    <tr>
                        <td>CellPhone：</td>
                        <td><input type="text" id="phone" name="phone" required="required"></td>
                    </tr>
					<tr>
                        <td>Nickname(the name you want to show others)：</td>
                        <td><input type="text" id="nick" name="nick" required="required"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="color:red;font-size:10px;">
                            <?php
                                $err=isset($_GET["err"])?$_GET["err"]:"";
                                switch($err) {
                                    case 1:
                                    echo "username already exist";
                                    break;
                                    case 2:
                                    echo "The two times you entered different password";
                                    break;
                                    case 3:
                                    echo "sign up successful";
									case 4:
                                    echo "Password length has to be at least 8";
                                    break;
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" id="register" name="register" value="submit">
                            <input type="reset" id="reset" name="reset" value="Reset">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            If you already had an account, go <a href="../login/loginpage.php"	>login</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="footer">
        </div>
    </div>
	
</body>


</html>
