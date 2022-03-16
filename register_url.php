<?php
include 'connection_to_db.php';
$absolute_url="https://venus.cs.qc.cuny.edu/~udma8810/short/checkurl.php?u=";

header("Content-Type: application/json");

$array=array();
if (!empty($_POST['fullurl']))
{
    $url=$_POST['fullurl'];
    $shortUniqueUrl="";
    if (strlen($_POST['shorturl']) > 0) {
        $results = mysqli_query($db, "Select * from url where shorten_url = '" . $_POST['shorturl'] . "' LIMIT 1");
        if (mysqli_num_rows($results) > 0) {
            $array['error'] = false;
            $array['message'] = "Provided URL already in use. Please try another one.";
        }else{
            $query = "Insert into url (user_id, clicks, full_url, shorten_url) 
                  values ( '" . $_SESSION['user_id'] . "',0, '$url', '".$_POST['shorturl']."' )";
            if (mysqli_query($db, $query)) {
                $array['success'] = true;
                $array['message'] = "short url generated successfully:<br><span style='font-size:12px;'>" . $absolute_url . $_POST['shorturl'] . "</span>";
            }
        }
    } else {
    $notUnique=true;
    while($notUnique)
    {
    	$uniqueString= substr(md5(microtime()), rand(0, 26), 8);
    	$results = mysqli_query( $db , "Select * from url where shorten_url = '$uniqueString' LIMIT 1" ) ;
        if(mysqli_num_rows($results)>0)
        {
        	//
        }
        else
        {
        	$notUnique=false;
        	$shortUniqueUrl=$uniqueString;
        }
    }
    $query = "Insert into url (user_id, clicks, full_url, shorten_url) 
                  values ( '".$_SESSION['user_id']."',0, '$url', '$shortUniqueUrl' )" ;
    if(mysqli_query($db , $query))
    {
       	$array['success']=true;
       	$array['message']="Url Generated:<br><span style='font-size:12px;'>".$absolute_url.$shortUniqueUrl."</span>";
    }
    }
}
else
{
	$array['error']=false;
	$array['message']="Provide a URL";
}
echo json_encode($array);
?>