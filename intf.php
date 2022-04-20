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



$sql = "SELECT * FROM accountdetails" ;
$result = $conn->query($sql);

?>


<html>
<head> 
    <title>Intrest Transaction Page</title>
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


</head>

<body>

<?php include('navbar.php'); ?>
<?php 
  if(isset($_POST['form_submitted'])){

      $IN = $_POST['int'];
      $da = $IN / 100;
      $INF = 1 + $da;

      if(empty($IN) ){
        echo "<script> alert('Empty Fields !!');
        window.location.href='int.php';
        </script>";  
        exit() ;           
      }

}
            

            date_default_timezone_set('Asia/Kolkata');           
            $date = date('Y-m-d H:i:s',time());

            while($row = $result->fetch_assoc()) { 
            $bal = $row['balance'];
            $newbal = $INF * $bal;
            $int = $newbal - $bal;
            $sn = $row['sno'];
            $pu = "INSERT INTO PB$sn (type, des, amt, balance, time) values ('Credit','Intrest','$int','$newbal','$date')";



            if($conn->query($pu)==true){
                    ?>         
                    <script>console.log("Record of this transaction saved! ")</script>
                    <?php
            }
            else{
                    ?>        
                    <script>alert("Record of this transaction saved! ERROR OCCURED!")</script>
                    <?php
            }
           


           $udb = "Update accountdetails set balance='$newbal' where sno='$sn'";
           
            if($conn->query($udb)==true){
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

?>
 Done 
<?php
            
  

  $conn->close();
?>
 
             
</body>
</html>
