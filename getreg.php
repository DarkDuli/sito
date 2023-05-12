<?php
require 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql="SELECT * FROM users WHERE username='$nickname'";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "L'utente con questo username: ".$nickname." è già registrato";
}else{
    $password=md5($password);
    $sql="INSERT INTO users (username,password) VALUES('$nickname','$password')";
    if($conn->query($sql)===TRUE){
        echo "Registrazione effettuta";
        header('location: login.php');
    }else{
        echo $conn->error;
    }
     
}
$conn->close();
?>