<?php

$datastring = $_POST['data'];
$data = json_decode($datastring, true);
echo "data received";

$name = $data['name1'];
$email = $data['email1'];
$companyName = $data['companyName1'];

$position = $data['position1'];
$jobType = $data['jobType1'];
$jobDescription = $data['jobDescription1'];
$joblink = $data['joblink1'];


$servername = "localhost";
$username = "id8835700_root";
$password = "cscibiola";
$database = "id8835700_cscidb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";



//Insert recruiter info to database
$sql1 = "INSERT INTO Recruiter (recruiterid, recruitername, emailaddress, companyName)
VALUES (NULL, '$name', '$email', '$companyName')";

if ($conn->query($sql1) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql1 . "<br>" . $conn->error;
}



//retrieve recruiterid for entry into opportunity query
$retrieveid = "SELECT recruiterid FROM Recruiter WHERE recruitername = '$name';";
$result = $conn->query($retrieveid);
$recid = $result->fetch_row()[0];


// insert opportunity info into database
$sql2 = "INSERT INTO Opportunity (opportunityid, jobposition, jobtype, recruiterid, jobdescription, joblink)
VALUES (NULL, '$position', '$jobType', '$recid', '$jobDescription', '$joblink')";

if ($conn->query($sql2) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();


?>