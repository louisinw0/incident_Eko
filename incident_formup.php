<!DOCTYPE html>
	<?php
		//พร่องตาย
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
	<body>    
	<h1>incident Eko Edit</h1>
	
		<form action="incident_update.php" method="POST">
		
			Start_Date : 
				<input type="text" value="<?php echo $Start_Date; ?>" /><br />
			Priority : 
				<input type="text" value="<?php echo $Priority; ?>" /><br />
			Reporter : 
				<input type="text" value="<?php echo $Reporter; ?>" /><br />
			Team_Support : <input type="text" value="<?php echo $Team_Support; ?>" /><br />
			Problem :
				<br />
				<textarea name="textarea" cols="55" rows="5" readonly><?php echo $Problem; ?></textarea><br />
			<?php $Last_Update = date("Y-m-d H:i:s");?>
			Last_Update : 
				<input type="datetime" name="Last_Update" value="<?php echo $Last_Update; ?>"><br />
			solving_problems :
				<br />
				<textarea name="solving_problems" cols="55" rows="5" wrap="hard" ><?php echo $solving_problems; ?></textarea>
				<br />
			<?php $Complete_Date = date("Y-m-d H:i:s");?>
			Complete_Date : 
				<input type="datetime" name="Complete_Date" value="<?php echo $Complete_Date; ?>">
				<br />
			Status :
				<select name="Status" id="Status">
				<option value="Pending">Pending</option>
				<option value="Complete">Complete</option>
				</select>
				<br />
				
				<br />
					<button type="submit">Submit</button>
					<button type="button" onclick="javascript:window.history.back();">Back</button>
		</form>
		<script>

		</script>
	</body>
	</html>