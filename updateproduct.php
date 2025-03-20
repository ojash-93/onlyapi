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
        $ptitle = $_POST["ptitle"];
        $pprice = $_POST["pprice"];
        $pDescription = $_POST["pDescription"];
        $pIs_available = $_POST["pIs_available"];
        $pis_displaye = $_POST["pis_displaye"];
        $plarge_image = $_POST["plarge_image"];
        $pthumbnail_image = $_POST["pthumbnail_image"];

        $result = mysqli_query($conn,"update product set title='$ptitle',price='$pprice',Description='$pDescription',Is_available='$pIs_available',is_displaye='$pis_displaye',large_image='$plarge_image',thumbnail_image='$pthumbnail_image' where  product_id ='$pro_id'") or die(mysqli_error($conn));
        if($result)
       {
        $response["status"]=true;
        $response["message"] = "product Updated!";
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
        $response["message"] = "product not found";
    }
}
else
{
    $response["status"]=false;
    $response["message"] = "Parameter missing";
}
echo json_encode($response);