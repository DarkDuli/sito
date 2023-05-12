<?php
require 'db_connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql="SELECT * FROM users WHERE username='$username'";
$result=$conn->query($sql);
if($result->num_rows == 0){
    echo "L' username utilizzato non è registrato";
}else{
    $password=md5($password);
    $sql="SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $_SESSION['id_user'] = $result->fetch_assoc()['id'];
        header('location: index.html');
    }else{
        echo "Spiacente le credenziali sono errate";
    }
}
$conn->close();
?>