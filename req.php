<?php


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
  
    <script type="text/javascript">
        if(window.history.replaceState){
            
            window.history.replaceState(null, null, window.location.href); 
        }
    </script>
      
     
</head>


<body>



<div class = 'transferMoney'>
    <h1>Request Account</h1>
    <b>No gaurantee of acc</b>
    <form name="myForm" action="req2.php"  method="post">
        <table id="table1">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"  required><td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" required ><td>
        </tr>
        <tr>
            <td>Password needed</td>
            <td><input type="password" name="pass" required><td>
        </tr>
        <tr>
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td> <input type="submit" value="Request"><td>
        </tr>
       
        </table>
    </form>
</div>


</body>
</html>
