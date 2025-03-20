

<?php
header('Content-Type: application/json; charset=utf-8');
include 'connection.php';

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile_number = $_POST["mobile_number"];

$res = mysqli_query($conn,"select * from tbl_user where email='$email'") or die(mysqli_error($conn));
if(mysqli_num_rows($res)>=1)
{
    $response["status"]=false;
    $response["message"]="email already exist!";
}
else
{
    $result = mysqli_query($conn,"insert into tbl_user (name,email,password,mobile_number) values ('$name','$email','$password','$mobile_number')") or die(mysqli_error($conn));

    $response=array();
    if($result)
    {
        $response["status"]=true;
        $response["message"]="Data inserted successfully";
    }
    else
    {
        $response["status"]=false;
        $response["message"]="Error";
    }
}
echo json_encode($response);

