<?php

include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login Panel</title>
</head>
<body>
    <div class="container">
        <div class="myform">
        <form method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>ADMIN LOGIN PANEL</h2>
            <input type="text" name="Admin_Name" placeholder="Admin Name">
            <input type="text" name="Admin_Password" placeholder="Password">
            <button type="submit" value="login" name="Login">LOGIN</button>
        </form>
        </div>
        <div class="image">
       <img src="worskpace.jpg" width="300px" height="250px">
        </div>
    </div>

<?php

function input_filter($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

 if(isset($_POST['Login']))
 {
     #filtering user input
     $AdminName=input_filter($_POST['Admin_Name']);
     $AdminPass=input_filter($_POST['Admin_Password']);
    
     #escaping special symbols used in SQL statement
     mysqli_real_escape_string($conn,$AdminName);
     mysqli_real_escape_string($conn,$AdminPass);
    
     #query template

     $query="SELECT * FROM `admin_login` WHERE `Admin_Name`=?  AND `Admin_Password`=?";
     
     #prepared statement

     if($stmt=mysqli_prepare($conn,$query))
     {
         
        mysqli_stmt_bind_param($stmt,"ss",$AdminName,$AdminPass); //binding value to the prepared statement
        mysqli_stmt_execute($stmt); //executing prepared statement
        mysqli_stmt_store_result($stmt); //transferring the result of execution in $stmt
        if(mysqli_stmt_num_rows($stmt)==1)
        {
            session_start();
            $_SESSION['AdminLoginId']=$AdminName;
            header("location: adminpanel.php");
        }else
        {
             echo "<script>alert('Invalid Admin Name or Password');</script>";
        }
        mysqli_stmt_close();
     }else
     {
         echo "<script>alert('SQL QUERY cannot be prepared');<script>";
     }



 }


?>
 
</body>
</html>

