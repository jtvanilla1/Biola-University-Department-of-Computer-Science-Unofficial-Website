<?php

$servername = "localhost";
$username = "id8835700_root";
$password = "cscibiola";
$database = "id8835700_cscidb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

//Insert course info to database
$sql1 = "SELECT Opportunity.jobposition, Recruiter.companyName, Recruiter.recruitername, Recruiter.emailAddress, Opportunity.jobdescription, Opportunity.joblink 
FROM Opportunity 
JOIN Recruiter
ON Opportunity.recruiterid = Recruiter.recruiterid
WHERE Opportunity.jobtype = 'Contractor'
ORDER BY jobposition;";


$result = $conn->query($sql1);
$conn->close();

//HTML pass
echo "<tr>";
echo "<th>Position</th>";
echo "<th>Company</th>";
echo "<th>Recruiter Name</th>";
echo "<th>Recruiter Email</th>";
echo "<th>Job Description</th>";
echo "<th>Link</th>";
echo "</tr>";
while($row = $result->fetch_row()){ //checks each row from the table
//needs to convert this data to inline HTML

	echo "<tr>";
	echo "<td>$row[0]</td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	echo "<td><a href='$row[5]' target='_blank' >$row[5]</a></td>";
	echo "</tr>";
}

?>