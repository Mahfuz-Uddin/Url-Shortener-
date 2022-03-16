<?php
include('connection_to_db.php');
//Login users


$email = $_POST['email'] ;
$password = $_POST['password']  ;

if(isset($_POST['login']) )
{
    
    $errors = array() ;

    if( empty($email))
    {
        array_push($errors , "Email is required" ) ;
    }
    if( empty($password))
    {
        array_push($errors , "Password is required" ) ;
    }
    if( count($errors) == 0 )
    {
        $password = md5($password) ;
        $query = "Select * from users where email = '$email' AND password = '$password' limit 1" ;
        //echo $query; die("Stop Execution");
        $results = mysqli_query($db , $query) ;

        if( mysqli_num_rows($results) )
        {
            $row=mysqli_fetch_row($results);
            $_SESSION['email'] = $email ;
            $_SESSION['user_id'] = $row[0]['id'] ;
            $_SESSION['success'] = "Logged in Successfully" ;

            echo "You are now logged in. Thank you :)" ;
            header('location:shortener.php') ;

        }
        else
        {
            array_push($errors , "Wrong email/Password combination. Please try again." ) ;

            header("Refresh:1; url= index.php");

        }
    }
    mysqli_close($db);
}

else

{
    session_start() ;


    $errors = array() ;

//register users
    //print_r($_POST); die("stop");

    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $confirmpassword = $_POST['confirmpassword'];

//form validation

    if( empty($name) )
    {
        array_push( $errors , "Name is required") ;
    }

    if( empty($email) )
    {
        array_push($errors , "email is required") ;
    }
    if( empty($firstname) )
    {
        array_push($errors , "first name is required") ;
    }
    if( empty($lastname) )
    {
        array_push($errors , "last name is required") ;
    }

    if( empty($password))
    {
        array_push($errors , "Password is required") ;
    }

    if( $password != $confirmpassword )
    {
        array_push($errors , "Password do not match" ) ;
    }

//check database for existing user with same username
    $user_check_query = "Select * from users where email = '$email' LIMIT 1" ;

    $results = mysqli_query( $db , $user_check_query ) ;
    $user = mysqli_fetch_assoc($results) ;


    if($user)
    {
        if($user["email"] === $email)
        {
            array_push($errors , "This email is already registered" ) ;
        }
    }

//Register user if no errors

    if( count($errors) == 0 )
    {
        $password = md5($password) ; //This will encrypt password

        $query = "Insert into users (username , firstName, lastName, email , password) 
                  values ( '$name' ,'$firstname','$lastname', '$email' ,'$password'  )" ;

        mysqli_query($db , $query ) ;

        $_SESSION['username'] = $name ;
        $_SESSION['success'] = "You are now signed Up" ;

        header( 'location: index.php' ) ;
        mysqli_close($db);
    }

}

?>
<?php if (is_countable($errors) && count($errors) > 0) : ?>
    <div>
        <?php foreach($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
        <!--redirect to indexlogin.php after 3 seconds-->
        <?php header("Refresh:3; url= index.php"); ?>
    </div>

<?php endif ?>
