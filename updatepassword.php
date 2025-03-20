<?php
header('Content-Type: application/json; charset=utf-8');
include 'connection.php';

$id = $_POST["id"];
$oldpassword = $_POST["oldpassword"];
$newpassword = $_POST["newpassword"];
$response=array();

if(isset($_POST["id"]))
{
  
    $res = mysqli_query($conn,"select * from tbl_user where usre_id  ='$id' and  password='$oldpassword'") or die(mysqli_error($conn));
    if(mysqli_num_rows($res)>=1)

{
$response["status"]=true;
$result = mysqli_query($conn,"update tbl_user set password='$newpassword' where  usre_id  ='$id'") or die(mysqli_error($conn));

$response["message"] = "password Updated!";
}
else
{
$response["status"]=false;
$response["message"] = "old password wrong";
}


echo json_encode($response);
}