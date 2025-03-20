<?php
header('Content-Type: application/json; charset=utf-8');
include 'connection.php';
$response=array();
//check
if(isset($_POST["pro_id"]))
{
    $pro_id = $_POST["pro_id"];
    $res = mysqli_query($conn,"select * from product where product_id ='$pro_id'") or die(mysqli_error($conn));
    if(mysqli_num_rows($res)>=1)
    {
        $response["status"]=true;
        $response["message"] = "Succses";
        $response["data"] = mysqli_fetch_assoc($res);
    }
    else
    {
        $response["status"]=false;
        $response["message"] = "Category not found";
    }
}
else
{
    $response["status"]=false;
    $response["message"] = "Parameter missing";
}
echo json_encode($response);