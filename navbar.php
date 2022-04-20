<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  
}
body {margin-top:0;}


.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}


.navbar b {
  float: right;
  
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.navbar b:hover, .dropdown:hover .dropbtn {
  background-color: red;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>
   <div class="navbar">
    <a href="index1.php">Home</a>
    <div class="dropdown">
    <button class="dropbtn">Customer
    <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="ViewCustomers.php">Customers Details</a>
    <a href="d1.php">Delete Customer</a>
    <a href="add.php">Add Customer</a>
    <a href="en.php">Edit Customer Name</a>
    <a href="ee.php">Edit Customer Email</a>
    <a href="p1.php">Change password</a>
    <a href="uh.php">Customer passbook</a>

    </div>
    </div>
     <div class="dropdown">
    <button class="dropbtn">Money
    <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="Transfer.php">Money Transfer</a>
    <a href="deposit.php">Money Deposit</a>
    <a href="Withdraw.php">Money Withdrawl</a>
    </div>
    </div>
    <a href="RecordsPage.php">Transaction History</a>
    <a href="int.php">Intrest</a>
    <a href="vr.php">View Request</a>
    <b><a href="logout.php">logout</a></b>
   </div>
<body>
</html>

