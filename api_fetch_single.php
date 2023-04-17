<?php 
header('Content-Type:application/json');
header('Acess-Control_Allow_Origin: *');
$data = json_decode(file_get_contents("php://input"),true);

$movie_id = $data['id'];
include "config.php";
$sql = "SELECT * FROM students WHERE id = {$movie_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed");

if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message'=>'No Record Found.','status'=>false));
}

?>