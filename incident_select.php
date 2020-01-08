<?php
	$sql="SELECT * FROM incident_of_report WHERE Incident_No='$Incident_No'";
	require("mysql/connect.php");
	$result=mysqli_query($conn,$sql);
	$record=mysqli_fetch_array($result);
	$Incident_No=$record['Incident_No'];
	$Start_Date=$record['Start_Date'];
	$Priority=$record['Priority'];
	$Reporter=$record['Reporter'];
	$Team_Support=$record['Team_Support'];
	$Problem=$record['Problem'];
	$Last_Update=$record['Last_Update'];
	$solving_problems=$record['solving_problems'];
	$Complete_Date=$record['Complete_Date'];
	$Status=$record['Status'];
	require("mysql/unconn.php");
?>
