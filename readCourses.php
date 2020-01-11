<?php

$servername = "localhost";
$username = "id8835700_root";
$password = "cscibiola";
$database = "id8835700_cscidb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

//retireve all table information
$searchsql = "SELECT Course.crn, Course.coursename, Course.profname, Course.coursedesc, Course.prereq, Course.link 
	FROM Course ORDER BY crn;";
$result = $conn->query($searchsql); //table
$conn->close();


//HTML pass
echo "<tr>";
echo "<th>CRN</th>";
echo "<th>Course Name</th>";
echo "<th>Instructor</th>";
echo "<th>Course Description</th>";
echo "<th>Prerequisites</th>";
echo "<th>Link</th>";
echo "</tr>";
while($row = $result->fetch_row()){ //checks each row from the table
//needs to convert this data to inline HTML

	echo "<tr>";
	echo "<td>CSCI $row[0]</td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	echo "<td><a href='$row[5]' target='_blank' >$row[5]</a></td>";
	echo "</tr>";
}

?>