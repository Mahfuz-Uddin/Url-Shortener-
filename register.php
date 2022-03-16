<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="styleRegistration.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme2.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!--This is the javascript to check for password on the server-side -->
    <script>
        window.jQuery || document.write('<script src="http://mysite.com/jquery.min.js"><\/script>')
    </script>

    <script>
        function checkPasswordMatch()
        {
            var password = $("#password").val();
            var confirmPassword = $("#confirmpassword").val();

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html("Passwords do not match!");
            else
                $("#divCheckPasswordMatch").html("Passwords match.");
        }

        jQuery(document).ready(function ()
        {
            $("#password, #confirmpassword").keyup(checkPasswordMatch);
        });
    </script>
</head>

<body>
<div class="form-body">
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
        </div>
        <div class="col-md-5" style="height:0px;"></div>
        <div class="col-md-5" style="height:0px;"></div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <span style="font-family: 'Press Start 2P', cursive; color: white;"><h2>Make An Account</h2></span>

                    <div class="page-links">
                        <a href="index.php">Login</a>
                    </div>

                    <form action = "registration.php" method = "POST" name = "register"  novalidate >
                        <input class="form-control" type="text" name="name" placeholder="User Name" required>
                        <input class="form-control" type="text" name="firstname" placeholder="First Name" required>
                        <input class="form-control" type="text" name="lastname" placeholder="Last Name" required><br>
                        <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                        <input class="form-control" type="password" name="password" id = "password" placeholder="Password" required>
                        <input class="form-control" type="password" name="confirmpassword" id ="confirmpassword" placeholder="Confirm Password" onChange = "checkPasswordMatch();" required >
                        <div id = "divCheckPasswordMatch" style = "color: white;" ></div>
                        <div class="form-button">
                            <button id="submit" type="submit" name = "signup" class="ibtn">Register</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>