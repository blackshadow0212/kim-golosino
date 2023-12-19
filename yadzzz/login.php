<?php 

$is_invalid  = false;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/data.php";

    $sql = sprintf("SELECT * FROM kim
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);

    $kim = $result->fetch_assoc();

    if ($kim) {
        if(password_verify($_POST["password"], $kim["password_hash"]))  {
            
            session_start();

            $_SESSION["user_id"] = $kim["id"];

            header("Location: home.php");
            exit;
        }

    }
    $is_invalid = true;
    

} 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="login.js"></script>
    <title>LOGIN</title>
</head>
<body>
    
      <form method="post">
        
        <div class="roller">  
        <h1 id="pol">LOGIN</h1>
        <input type="email" name="email" id="email" autocomplete="off" placeholder="Email" required><br>
        <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required><br>
        <button>LOGIN</button>
        <p class="register123">You have no account?</p>
        <a href="register.html" class="register123">click here!!</a>
      
    </div>
</form>
    
</body>
</html>