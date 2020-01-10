<!DOCTYPE html>
	<?php
		require("mysql/config.php");
		$Incident_No = (isset($_GET['Incident_No'])) ? $_GET['Incident_No'] : '';
		$sql = "SELECT * FROM incident_of_report WHERE Incident_No = '$Incident_No'";
		require("mysql/connect.php");
		$result=mysqli_query($conn,$sql);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$Incident_No = $row['Incident_No'];
		$Start_Date = $row['Start_Date'];
		$Priority = $row['Priority'];
		$Reporter = $row['Reporter'];
		$Team_Support = $row['Team_Support'];
		$Problem = $row['Problem'];
		$Last_Update = $row['Last_Update'];
		$solving_problems = $row['solving_problems'];
		$Complete_Date = $row['Complete_Date'];
		$Status = $row['Status'];
		$Time_total = $row['Time_total'];
	?>
	<html>
	<head>
	
	<meta charset="UTF-8">
	<title>incident_of_eko_application_report</title>
	</head>
	<center>
	<body>    
	<h1>Form Incident of Eko Update</h1>
		<form action="incident_update.php" method="POST">
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Incident_No:
				<input type="text" name="Incident_No" value="<?php echo $Incident_No; ?>" /><br />
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Start_Date : 
				<input type="text" name="Start_Date" value="<?php echo $Start_Date; ?>" /><br />
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Priority : 
				<input type="text" name="Priority" value="<?php echo $Priority; ?>" /><br />
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Reporter : 
				<input type="text" name="Reporter" value="<?php echo $Reporter; ?>" /><br />
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Team_Support :
			<input type="text" name="Team_Support" value="<?php echo $Team_Support; ?>" /><br />
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Problem :
				<textarea name="Problem" cols="55" rows="5"><?php echo $Problem; ?></textarea><br />
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Last_Update : 
				<input type="datetime" name="Last_Update" value="<?php echo $Last_Update; ?>"><br />
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			solving_problems :
				<textarea name="solving_problems" cols="55" rows="5" wrap="hard" ><?php echo $solving_problems; ?></textarea>
				<br />
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			Complete_Date : 
				<input type="datetime-local" name="Complete_Date" value="<?php echo $Complete_Date; ?>">
				<br />
			Status :
				<select name="Status" id="Status">
				<option value="<font face="verdana" color="red">Pending</font>">Pending</option>
				<option value="Complete">Complete</option>
				</select>
				<br />
				<br />
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<button type="submit">Submit</button>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<button type="button" onclick="javascript:window.history.back();">Back</button>
		</form>
		<script>

		</script>
	</body>
	</html>
