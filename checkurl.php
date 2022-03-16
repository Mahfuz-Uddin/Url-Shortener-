<?php
if(!empty($_GET['u']))
{
	include 'connection_to_db.php';
	$queryString=$_GET['u'];
    $results = mysqli_query( $db , "Select * from url where shorten_url = '$queryString' LIMIT 1");
    $urls= mysqli_fetch_assoc($results) ;
    if($urls)
    {
        if($urls["shorten_url"] === $queryString)
        {
            mysqli_query( $db , "update url set clicks = '".($urls['clicks']+1)."' where shorten_url = '$queryString' and user_id='". $_SESSION['user_id']."'");
            header("Location: ".$urls['full_url']);
        }
    }
    else
    {
    	$error="No URL found ".$queryString;
    }
}
else
{
	$error= "no URL set";
}
if(isset($error)) {
    echo $error;
}
?>