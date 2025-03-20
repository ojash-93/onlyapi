<?php
header('Content-Type: application/json; charset=utf-8');
include 'connection.php';

$email = $_POST["email"];
$password = $_POST["password"];



$res = mysqli_query($conn,"select * from tbl_user where email='$email' and password='$password'") or die(mysqli_error($conn));
if(mysqli_num_rows($res)>=1)
{
    $response["status"]=true;
    $response["message"]="Login Successfully!";
    $response["data"]=mysqli_fetch_assoc($res);
}
else
{
    $response["status"]=false;
    $response["message"]="Login Failed";
}
echo json_encode($response);

