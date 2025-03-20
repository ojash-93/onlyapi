<?php
header('Content-Type: application/json; charset=utf-8');
include 'connection.php';

$cname = $_POST["cname"];
$cimage = $_POST["cimage"];
//duplication

$res = mysqli_query($conn,"select * from category where category_name='$cname'") or die(mysqli_error($conn));
if(mysqli_num_rows($res)>=1)
{
    $response["status"]=false;
    $response["message"]="Category already exist!";
}
else
{
    $result = mysqli_query($conn,"insert into category (category_name,category_image) values ('$cname','$cimage')") or die(mysqli_error($conn));

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