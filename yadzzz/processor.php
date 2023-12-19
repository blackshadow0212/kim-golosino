<?php 

if(empty($_POST["newemail"])) {
    die("Required Email");
}

if(strlen($_POST["newpassword"]) < 8) {
    die("NEED EIGHT OR MORE CHARACTERS IN YOUR PASSWORD");
}

if($_POST["newpassword"] !== $_POST["confrmpassword"]) {
    die("YOUR PASSWORD DOES NOT MATCH");
}

$password_hash = password_hash($_POST["newpassword"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/data.php";

$sql = "INSERT INTO kim (email, password_hash, confrmpassword)
         VALUES (?, ?, ?)";
$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["newemail"],
                  $password_hash,
                  $_POST["confrmpassword"]);
                  
if($stmt->execute()) {
    header("Location: registersucc.php");
    exit;


}

else {
    die($mysqli->error . " " . $mysqli->errno);
}

?>