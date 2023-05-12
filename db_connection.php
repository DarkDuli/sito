<?php
$ip = "18.208.220.83";
$db_name = "awssite";
$password = "vvsiWuB51FAL";
$username = "admin";
$connection = new mysqli($ip, $username, $password, $db_name);
$response = [];
if ($connection->connect_error) {
  $response['message'] = 'Connection to db failed';
  http_response_code(400);
  echo json_encode($response);
  die;
}
return $connection;
?>