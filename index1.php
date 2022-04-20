<?php

session_start();

 if(!$_SESSION['name'])
{
  header("location:index.php");
 }
if($_SESSION['ac'] != 101){
header("location:index2.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
    <title>Hostel Bank</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <style>
        body {
        
        font-size:25px;
        font-family: "Sofia", sans-serif;
        color:red;
        background: #78a7ff;
        background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
        background: linear-gradient(to right, #f5fce3,#e1e6d6 );
        background-image: url("images/bg.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
      }
      .center{
        padding-top:6px;
        padding-left: 6px;
        padding-right: 6px;
        padding-bottom: 6px;
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        width: 50%
        
      }
      footer{
        text-align: center;
      }

      img {
        border-radius: 10%;
      }
      a{
        color: black;
      }
      p{
        font-family:"Trirong", sans-serif;
      }
    </style>
</head>

<body>


<?php include('navbar.php'); ?>
  
<div class="center">
    <h1 style="text-align: center">Welcome to Hostel Bank<h1>
    <img class ="center" src="images/Banklogo-2.JPG" alt="" width="150" height="300" >
</div>

<footer>
  <p>Project By <b>Krishna Raja</b> <br><a href=> Hostel Bank</a></p>
</footer>

</body>
</html>