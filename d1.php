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
    <title>Delete Page</title>
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

<?php include('navbar.php'); ?>

<div class = 'transferMoney'>
    <h1>Delete Customer</h1>
    <form name="myForm" action="d2.php"  onsubmit="return validateForm()" method="post">
        <table id="table1">
        
        <tr>
            <td>Sl no.</td>
            <td><input type="number" name="slno" min=2 required><td>
        </tr>
        <tr>
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td> <input type="submit" value="Delete"><td>
        </tr>
       
        </table>
    </form>
</div>

 <script>
 
 function validateForm() {

            var z = document.forms["myForm"]["slno"].value;
            var regex=/^[0-9]+$/;

            
            if ( z=="") {
                alert("Fill it!!");
                return false;
            }

            if ( z=="1") {
                alert("Can't Delete Cash!!");
                return false;
            }

            //var num = z>0?1:-1;
            if((Math.sign(z)==-1)||(Math.sign(z)==-0)||z==0){
                alert("Enter a valid Sl no to delete");
                return false;
            }
            if(isNaN(z)||!z.match(regex)){
                alert("Enter correct input!");
                return false;
            }
        }
            
 </script>
</body>
</html>
