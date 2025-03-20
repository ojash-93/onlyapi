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
       //Update
       $cname = $_POST["cname"];
       $cimage = $_POST["cimage"];
       $result = mysqli_query($conn,"update category set category_name='$cname',category_image='$cimage' where category_id='$cat_id'") or die(mysqli_error($conn));
       if($result)
       {
        $response["status"]=true;
        $response["message"] = "Category Updated!";
       }
       else
       {
        $response["status"]=false;
        $response["message"] = "Error";
       }
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