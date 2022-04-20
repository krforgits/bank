<?php

header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sun,01 Jun 2001 05:00:00 GMT");
include 'connect.php';
 
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 


?>

<html>
<head> 
    <title>Request Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <style>
        body {
        
          font-size:18px;
          font-family: "Audiowide", sans-serif;
          background: #f5fce3;
          background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
          background: linear-gradient(to right, #f5fce3,#e1e6d6);
          background-image: url("images/bg.jpg");
          background-repeat: no-repeat;
          background-size: 100% 100%;
        }
        .center{
          padding-top:40px;
          background: #91c1c9;
          background: -webkit-linear-gradient(to bottom, #f5fce3, #e1e6d6 );
          background: linear-gradient(to bottom, #f5fce3, #e1e6d6);
          padding-top:6px;
          display: block;
          margin-top: 50px;
          margin-left: auto;
          margin-right: auto;
          width: 100%;    
        }
        .center2{
          font-size:10px;
          width:100%;
        }
        table {
          margin: 0 auto; 
        }
        td,th { border: 1px solid #ddd; padding: 8px;}
        #Table{   font-family: "Trirong", serif;
            border-collapse: collapse;}
        #Table tr:nth-child(even){ background-color: #d2d3d4; }
        #Table tr:nth-child(odd){ background-color: #dee2e3; }
        #Table tr:hover{ background-color: #b5d0eb; }
        #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color:  #043357; color:white; }

    </style>

    
</script>
</head>

<body>



<?php 
  if(isset($_POST['form_submitted'])){

      $NAME = $_POST['name'];
      $EMAIL = $_POST['email'];
      $PASS = $_POST['pass'];

      if(empty($NAME) || empty($EMAIL) || empty($PASS)){
        echo "<script> alert('Empty Fields !!');
        window.location.href='req.php';
        </script>";  
        exit() ;           
      }

      

      $sqlcount = "SELECT COUNT(1) FROM accountdetails where email='$EMAIL'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]>=1){
        echo "<script> alert('Email already exists !!');
        window.location.href='req.php';
        </script>";  
        exit() ;      
      }
    
       

   
          echo "<div class ='center'>";
          echo "<div class ='center2'>";
          echo "<h1 style='text-align: center'>Request Successfully Made</h1>";
                
         $SQL = "INSERT INTO `req` ( `name`, `email`, `password`) VALUES ('$NAME','$EMAIL','$PASS')";

if($conn->query($SQL)==true){
                    ?>         
                    <script>console.log("Record of this transaction saved! ")</script>
                    <?php
            }
            else{
                    ?>        
                    <script>alert("Record of this transaction saved! ERROR OCCURED!")</script>
                    <?php
            }





  }

  $conn->close();
?>
 
             
</body>
</html>
