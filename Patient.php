<!DOCTYPE html>
<html>
<head>
<title>Paitent Data</title>
</head>
<body>

<h1>Paitent Data.</h1>
<table>
	<tr>
		
	</tr>
</table>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT SessionNum, SessionDate, PatienNum, LenthOfSession, TherapistID, TherapyCode FROM Patient";
/* $sql = "SELECT SessionNum, SessionDate, PatienNum, LenthOfSession, TherapistID, TherapyCode FROM Patient WHERE (SessionNum > 32)"; */
$result = $conn->query($sql);
//var_dump($result);

if($result->num_rows > 0){
	echo "<H1>All Patients</H1>";
	echo "<table border=3>
			<tr>
				<td>SessionNum</td>
				<td>SessionDate</td>
				<td>PatienNum</td>
				<td>LenthOfSession</td>
				<td>TherapistID</td>
				<td>TherapyCode</td>";
			

	//output data of each row
	while($row = $result-> fetch_assoc()){
		//echo "Num: " . $row["SessionNum"];
		echo "<tr><td bgcolor=lightblue>$row[SessionNum]</td>
		<td bgcolor=blue>$row[SessionDate]</td>
		<td bgcolor=Green>$row[PatienNum]</td>
		<td bgcolor=pink>$row[LenthOfSession]</td>
		<td bgcolor=yellow>$row[TherapistID]</td>
		<td bgcolor=brown>$row[TherapyCode]</td></tr>";		
	}
	
	echo "</tr></table>";
}else{
	echo "0 results";
}
/* $sql = "SELECT SessionNum, SessionDate, PatienNum, LenthOfSession, TherapistID, TherapyCode FROM Patient"; */
$sql = "SELECT SessionNum, SessionDate, PatienNum, LenthOfSession, TherapistID, TherapyCode FROM Patient WHERE (SessionNum > 32) AND (LenthOfSession > 45)";
$result = $conn->query($sql);
if($result->num_rows > 0){
	echo "<H1>Patients who have sessionNum greater than 32</H1>";
	echo "<table border=3>
			<tr>
				<td>SessionNum</td>
				<td>SessionDate</td>
				<td>PatienNum</td>
				<td>LenthOfSession</td>
				<td>TherapistID</td>
				<td>TherapyCode</td>
				<td>Num * Length</td>";
				
			

	//output data of each row
	while($row = $result-> fetch_assoc()){
		
		//echo "Num: " . $row["SessionNum"];
		echo "<tr><td bgcolor=lightblue>$row[SessionNum]</td>
		<td bgcolor=blue>$row[SessionDate]</td>
		<td bgcolor=Green>$row[PatienNum]</td>
		<td bgcolor=pink>$row[LenthOfSession]</td>
		<td bgcolor=yellow>$row[TherapistID]</td>
		<td bgcolor=brown>$row[TherapyCode]</td>
		<td bgcolor=grey>" . (int)$row["SessionNum"]*(int)$row["LenthOfSession"] . "</td></tr>";		
	}
	
	
	echo "</tr></table>";
}else{
	echo "0 results";
}
$conn->close();

?>


</body>
</html>