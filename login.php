<?php

$datastring = $_POST['data'];
$data = json_decode($datastring, true);

$user = $data['username1'];
$pass = $data['password1'];


$servername = "localhost";
$username = "id8835700_root2";
$password = "cscibiola";
$database = "id8835700_credentialsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//Retrieve login credentials
$checkcredentials = "SELECT * FROM Admin WHERE username = '$user' AND password = '$pass';";
$result = $conn->query($checkcredentials);
$key = $result->fetch_row();

$response = 0;


if(sizeof($key)>0){
	$response = "success";
}
else{
	$response = "failure";
}

echo($response);
$conn->close();


?>