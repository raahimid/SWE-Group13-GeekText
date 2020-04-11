<?php
    /* clear session (i.e. soft log out) */
    session_start();
    $_SESSION = array();

    $email_exists = false;

    /* if form submitted */
    if(isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['password']) && !empty($_POST['password'])
        && isset($_POST['name']) && !empty($_POST['name']))
    {
        require_once('includes/connect.inc.php');
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        /* check if email exists */
        if ($stmt = mysqli_prepare($con, "SELECT email FROM user WHERE
            email = ?"))
        {
            /* sql manipulation */
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $db_email);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            /* if not in db, "register" new user */
            if (empty($db_email) && $stmt = mysqli_prepare($con, "INSERT INTO
                user (email, f_name, l_name, nickname, password) VALUES (?, ?, ?, ?, ?)"))
            {
                /* split name */
                $names = explode(" ", $name);
                $nickname = $names[0];
                $fname = $names[0];
                $lname = "";

                if (isset($names[1])) //if lname exists
                {
                    $names = array_slice($names, 1); // remove fname
                    $lname = implode(" ", $names);
                }

                /* hash password */
                $password = password_hash($password, PASSWORD_DEFAULT);

                /* insert user row into db */
                mysqli_stmt_bind_param($stmt, "sssss", $email, $fname, $lname, $nickname, $password);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                /* redirect to login */
                $_SESSION['new_account'] = true;
                header('Location: login.php');
                exit();
            }
            else
            {
                $email_exists = true;
            }
        } // else stmt prep failure
    }// else don't register, fail silently as input check handled in front end
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>GeekText Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/geektext-lr.css">
</head>

<body>
    <div class="geektext-title-container"><a class="geektext-title" href="index.php">GeekText</a></div>
    <div class="geektext-lr geektext-error geektext-dialog" style="display: <?php echo ($email_exists) ? 'block' : 'none'; ?>;">
        <i class="fa fa-exclamation-triangle fa-2x geektext-dialog-icon" aria-hidden="true"></i>
        <h4>There was a problem</h4>
        <p>An account with this email already exists</p>
    </div>
    <form method="post" action="register.php" class="container geektext-lr" id="register-form">
        <h3 style="padding-bottom: 5px">Create account</h3>
        <div class="form-group">
            <label>Your name</label>
            <input class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="email" required>
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label>Password</label>
            <input id="password1" type="password" class="form-control" required>
        </div>
        <div class="form-group">
            <div><i id="sixlen-check" class="fa fa-circle geektext-icon"></i>At least 6 characters</div>
            <div><i id="upperlower-check" class="fa fa-circle geektext-icon"></i>Upper/lowercase letters</div>
            <div><i id="numpunc-check" class="fa fa-circle geektext-icon"></i>Number or punctuation</div>
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label>Re-enter password</label>
            <input id="password2" type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <div><i id="passmatch-check" class="fa fa-circle geektext-icon"></i>Passwords match</div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Create your GeekText account</button>
        <div style="padding-top: 16px; padding-bottom: 4px">Already have an account? <a href="login.php">Sign in</a></div>
    </form>
    <script src="js/register.js"></script>
</body>

</html>