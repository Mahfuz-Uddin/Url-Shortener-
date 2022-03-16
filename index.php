<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="StyleForLogin.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

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
            <div class="form-content" style = "margin-top: 0px;">
                <div class="form-items">

                    <span style="font-family: 'Press Start 2P', cursive; color: white;"><h2>Url Shortener</h2></span>
                    <div class="page-links">
                        <a class = 'logreg1' href="index.php" class="active">Login</a>
                        <a class = 'logreg2' href="register.php">Register</a>
                    </div>

                    <form action= "registration.php" method = "POST" >
                        <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <br>
                        <input type="checkbox" id="chk1"><label for="chk1">Remember me</label>
                        <div class="form-button">
                            <button type="submit" id = "login" name = "login" class="ibtn">Login</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html> 