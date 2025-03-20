<?php
header('Content-Type: application/json; charset=utf-8');
include 'connection.php';

$response=array();
//check
if(isset($_POST["id"]))
{
    $id=$_POST["id"];
    $res = mysqli_query($conn,"select * from category where category_id='$id'") or die(mysqli_error($conn));
    if(mysqli_num_rows($res)>=1)
    {
        //delete
        $result =  mysqli_query($conn,"delete from category where category_id='$id'") or die(mysqli_error($conn));
        if($result)
        {
            $response["status"]=true;
            $response["message"] = "Category deleted!";
        }
        else
        {
            $response["status"]=false;
            $response["message"] = "Error!";
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