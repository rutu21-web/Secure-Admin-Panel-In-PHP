<?php

session_start();
//preventing session hijacking
session_regenerate_id(true);
if(!isset($_SESSION['AdminLoginId']))
{
    header("location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
    body{
        margin: 0;

    }

        .header{
         color: white;
         font-family: poppins;
         display: flex;
         flex-direction: row;
         align-items: center;
         justify-content: space-between;
         padding: 0 60px;
         background-color: black;
        }

     button{
         background: aqua;
         font-size: 16px;
         font-weight: 550;
         padding: 12px;
         border: 3px solid darkgrey;
         border-radius: 4px;

     }

    </style>
</head>
<body>
  
<div class="header">
    <h1>ADMIN PANEL -<?php echo $_SESSION['AdminLoginId']; ?></h1>
    <form action="<?php echo $_SERVER['PHP_SELF']?> " method="POST">
   <button type="button" name="Logout"><a href="logout.php">LOG OUT</a></button>
   </form>
</div>
  


</body>
</html>