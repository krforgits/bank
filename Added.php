<?php

header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sun,01 Jun 2001 05:00:00 GMT");
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
    <title>Added Detail</title>
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

<script type="text/javascript">
    
    if(window.history.replaceState){
        
        window.history.replaceState(null, null, window.location.href); 
    }
    
</script>
</head>

<body>

<?php include('navbar.php'); ?>

<?php 
  if(isset($_POST['form_submitted'])){

      $ACCID = $_POST['accID'];
      $NAME = $_POST['name'];
      $EMAIL = $_POST['email'];

      if(empty($ACCID) || empty($NAME) || empty($EMAIL)){
        echo "<script> alert('Empty Fields !!');
        window.location.href='add.php';
        </script>";  
        exit() ;           
      }

      if($ACCID <=100){
        echo "<script> alert('Account no must be greater than 100 !!');
        window.location.href='add.php';
        </script>";  
        exit() ;  
      }

      if(!ctype_digit($ACCID) || !ctype_print($NAME) || !ctype_graph($EMAIL)){
        echo "<script> alert('Incorrect Values!!');
        window.location.href='add.php';
        </script>";  
        exit() ;  
      }

      $sqlcount = "SELECT COUNT(1) FROM accountdetails where accID='$ACCID'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]>=1){
        echo "<script> alert('Account no already exists !!');
        window.location.href='add.php';
        </script>";  
        exit() ;      
      }
    
      $sqlcount = "SELECT COUNT(1) FROM accountdetails where email='$EMAIL'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]>=1){
        echo "<script> alert('Email already exists !!');
        window.location.href='add.php';
        </script>";  
        exit() ;      
      }

      
     

   
          echo "<div class ='center'>";
          echo "<div class ='center2'>";
          echo "<h1 style='text-align: center'>Added Successfully</h1>
                <p  style='text-align: center; font-size:25px;'>Details of added is as follows<p>
                <table id = 'Table'>
                <tr>
                <th>Sl no</th>
                <th>Account No</th>
                <th>Name</th>
                <th>Email</th>
               
                </tr>";


          $InsertTable ="INSERT INTO `accountdetails` ( `accID`, `name`, `email`, `balance`) VALUES ('$ACCID','$NAME','$EMAIL','0')";


           if($conn->query($InsertTable)==true){
                    ?>         
                    <script>console.log("Record saved! ")</script>
                    <?php
            }
            else{
                    ?>        
                    <script>alert("Record not saved! ERROR OCCURED!")</script>
                    <?php
            }

          $sql = "Select * from accountdetails where accID='$ACCID'";       
          if($result = $conn->query($sql)){            
               $row1 = $result->fetch_array(); 
                       echo "<tr> 
                            <td>".$row1['sno']."</td>
                            <td>".$row1['accID']."</td>
                            <td>".$row1['name']."</td>
                            <td>".$row1['email']."</td>
                           
                            </tr>";                        
                                  
            }
$sno = $row1['sno'];
        
         $sql1 = "CREATE TABLE `PB$sno` (
  `sno` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `type` varchar(10) NOT NULL,
  `des` varchar(100) NOT NULL,
  `amt` double NOT NULL,
  `balance` double NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";       
            if($result = $conn->query($sql1)){
}
          
            
            

           


            echo "<br>";
        echo "</div>";
        echo "</div>";
       
          
  }else{
      ?>
        <h1 style="color:white" align="center"><br><br><br>Details Added</h1>
      
      
<?php
  }

  $conn->close();
?>
 
             
</body>
</html>
