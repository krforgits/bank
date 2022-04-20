<?php


include 'connect.php';
 
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
session_start();

 if(!$_SESSION['name'])
{
  header("location:index.php");
 }
if($_SESSION['ac'] != 101){
header("location:index2.php");
}

?>


<html>
<head> 
    <title>Intrest Provider</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <style>
        body {

            font-size:20px;
            font-family: "Trirong", serif;
            background: #f5fce3;
            background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
            background: linear-gradient(to right, #f5fce3,#e1e6d6 );
            background-image: url("images/bg.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .transferMoney{
            margin-top: 30px;
            color:red;
            background: #91c1c9;
            background: -webkit-linear-gradient(to bottom,  #8ce2f1, #2f02fa );
            background: linear-gradient(to bottom, #8ce2f1, #2f02fa);
            padding: 40px;
            position:fixed;
            top:50%;
            left:50%;
            transform: translate(-50%, -50%);
        }

    </style>
        
     
</head>


<body>

<?php include('navbar.php'); ?>

<div class = 'transferMoney'>
    <h1>Click to start intrest process</h1>
    <form name="myForm" action="intf.php"  method="post">
        <table id="table1">
         
      <tr>
            <td>Intrest in (%)</td>
            <td><input type="number" name="int"  min=1 required><td>
        </tr>
     
        
        <tr>
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td> <input type="submit" value="Intrest"><td>
        </tr>
       
        </table>
    </form>
</div>
</body>
</html>
