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

    //$sql = "SELECT * FROM customerinfo" ;
    $sql = "SELECT * FROM req" ;
    $result = $conn->query($sql);
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Request</title>    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            
            font-size:20px;
            font-family: "Audiowide", sans-serif;
            padding-bottom: 100px;
            background: #f5fce3;
            background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
            background: linear-gradient(to right, #f5fce3, #e1e6d6 );
            background-image: url("images/bg.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;

        }
        .container{      
            padding-top:6px;
            display: block;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 80%;    
        }

        td,th { border: 1px solid #ddd; padding: 8px;
            font-family: "Trirong", serif;
        }
        #Table{   font-family: "Trirong", serif;
            ; border-collapse: collapse; margin-bottom: 15px;}
        #Table tr:nth-child(even){ background-color: #FF0000; }
        #Table tr:nth-child(odd){ background-color: #dee2e3; }
        #Table tr:hover{ background-color: #5dacfc; }
        #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color: #043357; color:white;
            font-family: "Trirong", serif;
        }
        footer {
            background-color:  #c2e1fa;
            text-align: center;
            position: absolute;
            left: 0;
            bottom: 0;
            height: 100px;
            width: 100%;
            overflow: hidden;
        }
        p{
            font-family:"Trirong", sans-serif;
        }
    </style>
</head>

<body>
  <?php include('navbar.php'); ?>
       <div class="container">
            <h2 style="text-align: center">View Req</h2>
            <br>                   
            <table id="Table">
                <thead>
                    <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>EMail</th>
                    <th>Password</th>  
                    </tr>
                </thead>                     
                <?php
                while($row = $result->fetch_assoc()) { 
                ?> 
                <tr>
                    <td><?php echo $row['sno']; ?></td>
                    <td ><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    
                </tr>
                <?php
                }
                $conn->close();
                ?> 
            </table>
        </div>

    <footer>
        <p>Project by <b>Krishna Raja</b></p>
    </footer>
</body>
</html>


