<?php
header('Content-Type: application/json; charset=utf-8');
include 'connection.php';

$ptitle = $_POST["ptitle"];
$pprice = $_POST["pprice"];
$pDescription = $_POST["pDescription"];
$pIs_available = $_POST["pIs_available"];
$pis_displaye = $_POST["pis_displaye"];
$plarge_image = $_POST["plarge_image"];
$pthumbnail_image = $_POST["pthumbnail_image"];

$res = mysqli_query($conn,"select * from product where title='$ptitle'") or die(mysqli_error($conn));
if(mysqli_num_rows($res)>=1)
{
    $response["status"]=false;
    $response["message"]="product already exist!";
}
else
{
    $result = mysqli_query($conn,"insert into product (title,price,Description,Is_available,is_displaye,large_image,thumbnail_image,Category_id) values ('$ptitle','$pprice','$pDescription','$pIs_available','$pis_displaye','$plarge_image','$pthumbnail_image','12')") or die(mysqli_error($conn));

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