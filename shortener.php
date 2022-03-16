<?php
include 'connection_to_db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Url Shortner</title>
    <link rel="stylesheet" type="text/css" href="StyleForLogin.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <script src="mutemusic.js"></script>
<style>
    tr, td, th{
        border: 1px solid silver;
    }
</style>
</head>

<body>
<!-- NAVBAR BEGINS HERE-->
<nav id="navbar">
    <ul>
        <li class="dropdown">
            <a href="shortener.php" class="dropbtn current" >Home</a>
            <div class ="dropdown-content">
            </div>
        </li>
        <li class="dropdown">
            <a href="movie_index.html" class="dropbtn" >Movie Info Finder App</a>
            <div class ="dropdown-content">
            </div>
        </li>
        <li class="dropdown">
            <a href="subway.html" class="dropbtn" >Subway App</a>
            <div class ="dropdown-content">
            </div>
        </li>
        <li class="dropdown">
            <a href="#" class="dropbtn">Course</a>
            <div class="dropdown-content">
                <a href="https://tophat.com/" target="_blank">TopHat</a>
                <a href="https://tinyurl.com/CSCI355-Summer2021" target="_blank">Course Google Drive</a>
                <a href="https://www.w3schools.com/" target="_blank">W3Schools</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="#" class="dropbtn">About</a>
            <div class="dropdown-content">
                <a href="aboutme.html">About The Developer</a>
                <a href="contact.html">Contact</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="logout.php" class="dropbtn" >Log Out</a>
            <div class ="dropdown-content">
            </div>
        </li>
    </ul>
    <li id="mutebutton">
        <button class="mute" onclick="toggleSound()">mute music</button>
    </li>
    <audio id="music" autoplay="autoplay">
        <source src="lofi.mp3" />
    </audio>

    <style>@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');*{  box-sizing: border-box;  margin:0;  padding:0;  font-family: "Monseratt", sans-serif;}html{  background-color: #222629;}section h2 h1{  font-family: "Monseratt", sans-serif;  text-align: center;  height: 200px;  color: white;  font-size: 20px;}ul {  list-style-type: none;  overflow: hidden;}.dropdown {  float: left;  text-align: center;}a {  text-align: center;}.dropbtn {  display: inline-block;  color: white;  text-align: center;  padding: 14px 15px;  text-decoration: none;}li a:hover{  background-color: #34495e;}.dropdown {  display: inline-block;}.dropdown-content {  display: none;  position: absolute;  background-color: #f9f9f9;  min-width: 160px;  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);}.dropdown-content a {  color: grey;  padding: 14px 16px;  text-decoration: none;  display: block;  text-align: left;}.dropdown-content a:hover {background-color: #eeeeee;}.dropdown:hover .dropdown-content {  display: block;}/*Contact.html*/.contact-section{  background-size:cover;  background: #222629;  padding: 40px 0;}.contact-section h1{  text-align: center;  color: #E0E0E0;}.border{  width:100px;  height: 10px;  background: #34495e;  margin: 40px auto;}.contact-form{  max-width: 600px;  margin: auto;  padding: 0 10px;  overflow: hidden;}.contact-form-text{  display: block;  width: 100%;  box-sizing border-box;  margin: 16px 0;  border: 0;  background: #111;  padding: 20px 40px;  outline: none;  color: #ddd;  transition: 0.5s;}.contact-form-text:hover{  box-shadow: : 0 0 10px 4px #34495e;}textarea.contact-form-text{  resize: none;  height:120px;}.contact-form-btn{  float: right;  border: 0;  background: #34495e;  padding: 12px 50px;  border-radius: 20px;  cursor: pointer;  transition: 0.5s;}.contact-form-btn:hover{  background: #2980b9;}</style>
</nav>





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



                    <form action= "" method = "POST" >
                    <div style="width:400px; margin: auto; font-size: 19px; font-family: sans-serif;">
                    	<p id="true-msg" style="color:#fff; letter-spacing: 1px; display:none;">
                    		Successful
                    	</p>
                    	<p id="err-msg" style="color:rgba(255,0,0, 0.8); letter-spacing: 1px; display:none; text-shadow: 2px 2px 4px #fff;">
                    		<?php

                    		 echo  "Error Occurred!"; ?>
                    	</p>
                    </div>
                        <input style='width: 80%; height: 30px' class="form-control" type="text" name="full" id="full" placeholder="Type Full URL" required>
                        <input style='width: 40%; height: 30px' class="form-control" type="text" name="short" id="short" placeholder="(Optional) Custom URL" required>
                        <br>
                        <div class="form-button">
                            <button style='width: 35%' type="submit" id="shortUrl" name="shortUrl" class="ibtn">Shorten and Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div  style="margin-top: 50px; text-align: center">
            <table class="table table-hover" style="font-size: 20px;display: inline-block; text-align:left ">
                <thead>
                <tr>
                    <th>URL</th>
                    <th>Full URL</th>
                    <th>Clicks</th>
                    <th>Date Created</th>
                    <th style='color:darkred'>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $results = mysqli_query( $db , "Select * from url where user_id = '".$_SESSION['user_id']."'");
                while ($row = mysqli_fetch_assoc($results)) {
                    ?>
                    <tr>
                        <td><a href="<?php echo 'https://venus.cs.qc.cuny.edu/~udma8810/short/checkurl.php?u='.$row['shorten_url']?>"><?php echo  $row['shorten_url']; ?></a></td>
                        <td><a href="<?php echo $row['full_url']?>"> <?php echo  $row['full_url'] ?></a></td>
                        <td><?php echo  $row['clicks']; ?></td>
                        <td><?php echo  $row['date_created']; ?></td>
                        <td><a href="delete.php?id=<?php echo  $row['id']; ?>" style="color: darkred">Delete</a> </td>
                    </tr>

                    <style>
                        table td:hover {
                            background-color: yellowgreen;
                            overflow: visible;
                            white-space: normal;
                            height: auto;
                            text-overflow: initial;
                        }

                        td,tr,a{
                            color:white;
                            background-color: darkslategrey;
                        }
                        th{
                            background-color: black;
                        }
                    </style>
                <?php
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
    $('#shortUrl').on('click', function(event)
    { 
    	event.preventDefault();
    	var fullurl=$('#full').val();
        var shorturl=$('#short').val();
        $.ajax({
            type      : 'POST',
            url       : 'register_url.php',
            data      : {'fullurl':fullurl, 'shorturl': shorturl},

            success   : function(data) {
                            if (data.success) {
                            	$('#true-msg').text("").css("display","block").html(data.message);
                            	$('#err-msg').text("").css("display","none");
                            	$('#full').val("");
                            }
                            else {
                                    $('#err-msg').text("").css("display","block").html(data.message);
                                    $('#true-msg').text("").css("display","none");
                                }
                            }
        });
    });
});
</script>


<a href="publicsources.html" style="font-size: 20px;">Public Sources</a>
</body>

</html> 