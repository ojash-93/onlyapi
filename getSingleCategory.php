<?php
header('Content-Type: application/json; charset=utf-8');
include 'connection.php';
$response=array();
//check
if(isset($_POST["cat_id"]))
{
    $cat_id = $_POST["cat_id"];
    $res = mysqli_query($conn,"select * from category where category_id='$cat_id'") or die(mysqli_error($conn));
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