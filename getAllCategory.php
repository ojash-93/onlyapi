<?php
header('Content-Type: application/json; charset=utf-8');
include 'connection.php';
$response=array();
$result = mysqli_query($conn,"select * from category") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($result))
{
    $response[]=$row;
}
echo json_encode($response);