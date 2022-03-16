<?php
//include 'connection_to_db.php';
//
//if(isset($_GET['id'])){
//    $delete_id = mysqli_real_escape_string($db, $_GET['id']);
//    $sql = mysqli_query($db, "DELETE FROM url WHERE shorten_url = '{$delete_id}'");
//    if($sql){
//        header("Location: http://localhost/shortUrls/shortener.php");
//    }else{
//        header("Location: http://localhost/shortUrls/shortener.php");
//    }
//}elseif(isset($_GET['delete'])){
//    $sql3 = mysqli_query($db, "DELETE FROM url");
//    if($sql3){
//        header("Location: http://localhost/shortUrls/shortener.php");
//    }else{
//        header("Location: http://localhost/shortUrls/shortener.php");
//    }
//}else{
//    header("Location: http://localhost/shortUrls/shortener.php");
//}
//?>