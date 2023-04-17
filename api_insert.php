<?php 
header('Content-Type:application/json');
header('Acess-Control_Allow_Origin: *');
header('Acess-Control_Allow_Methods:POST');
header('Acess-Control_Allow_Headers:Acess-Control_Allow_Headers, Content-Type,Acess-Control_Allow_Methods,Authorization,X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);

$movie_name = $data['movie'];
$movie_director = $data['director'];
$movie_date = $data['release_date'];
include "config.php";
$sql = "INSERT INTO students(movie,director,release_date) VALUES ('{$movie_name}','{$movie_director}','{$movie_date}')";

if(mysqli_query($conn, $sql) ){
    echo json_encode(array('message'=>'Movie Inserted','status'=>true));
}
else{
    echo json_encode(array('message'=>'Movie Insertion Failed','status'=>false));
}

?>