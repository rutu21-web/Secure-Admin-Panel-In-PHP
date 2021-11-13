<?php

$conn=mysqli_connect("localhost","root","","secure");

if(mysqli_connect_error())
 {
     echo "Cannot connect to database";
     exit();
 }

?>