<?php

$datastring = $_POST['data'];
$data = json_decode($datastring, true);

$crn = $data['crn1'];
$courseName = $data['courseName1'];
$profName = $data['profName1'];
$courseDesc = $data['courseDesc1'];
$prereq = $data['prereq1'];
$link = $data['link1'];

$servername = "localhost";
$username = "id8835700_root";
$password = "cscibiola";
$database = "id8835700_cscidb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

//Insert course info to database
$sql1 = "INSERT INTO Course (courseid, crn, coursename, profname, coursedesc, prereq, link)
VALUES (NULL, '$crn', '$courseName', '$profName', '$courseDesc', '$prereq', '$link')";

if ($conn->query($sql1) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();


?>