<?php

error_reporting(0);
session_start();

include 'connect.php';
 
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    }

 
$name = $_POST['name'];
$Password = $_POST['pass'];


if (isset($_POST['Login'])) 
{


	$q= "select * from accountdetails where email = '$name' and pass = '$Password'";

	$res = mysqli_query($conn,$q);
	$res1 = mysqli_num_rows($res);
    
    if ($res1 == 0) 
    {
          header("location:index.php?user=Incorrect username or Password");		
	}	

    while ($row = mysqli_fetch_array($res)) {

    	if ($row['email'] == $name  &&  $row['pass'] == $Password)
    	 {
    	 	$_SESSION['name'] = $name ;
    		$_SESSION['password'] = $Password ;
            $_SESSION['id'] = $row['sno'];
            $_SESSION['ac'] = $row['accID'];

    		if ($row['accID'] == '101') {
    			
    			header("location:index1.php");
    			
    		}

    		else
    		{
    			header("location:index2.php");
            }

    	}

    	
    }



}

 
?>


<html>
<head> 
    <title>Login Page</title>
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
        .login{
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
            
            window.history.replaceState( null, window.location.href); 
        }
    </script>
      
     
</head>


<body>


<div class = 'login'>
    <h1>Login</h1>
    <form name="myForm"  method="post">
        <table id="table1">
        <tr>
            <td>Email</td>
            <td><input type="text" name="name"  class="form-control" required><td>
        </tr>
       
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass" class="form-control" required><td>
        </tr>
         <tr>
            <td>New User</td>
            <td><a href="req.php">Request Account</a><td>
        </tr>
        <tr>
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td> <button name="Login" class="btn btn-success">Login</button><td>
        </tr>
       
        </table>
    </form>

    
  <div>
  	<p class="text-danger"><?php echo $_GET['user']; ?></p><br> 
    <p><?php echo $_GET['password']; ?></p><br>
    <p><?php echo $_GET['both']; ?></p>
  </div>
</div>

 
</body>
</html>
