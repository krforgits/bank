<?php
session_start();
header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sun,01 Jun 2001 05:00:00 GMT");
include 'connect.php';
 
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
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
 
    <title>Transaction Page</title>
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

      $ID = $_POST['sl'];
     
      $PASS = $_POST['new'];
      
      if(empty($PASS) || empty($ID)){
        echo "<script> alert('Empty Field !!');
        window.location.href='p1.php';
        </script>";  
        exit() ;           
      }
 

      $sqlcount = "SELECT COUNT(1) FROM accountdetails where sno='$ID'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('No Account found !!');
        window.location.href='p1.php';
        </script>";  
        exit() ;      
      }
    
    

      
      
      $sql = "UPDATE `accountdetails` SET pass = '$PASS' WHERE sno = '$ID'; ";       
          if($result = $conn->query($sql)){            
                echo "<script> alert('Done !!');
                window.location.href='p1.php';
                </script>";  
                exit() ; 
                }  

          }  


    

   
          
      


  $conn->close();
?>
 
             
</body>
</html>
