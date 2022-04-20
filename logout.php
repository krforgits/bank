<?php

session_start();
session_destroy();

header("location:index.php?user=Logged%20Out");
?>