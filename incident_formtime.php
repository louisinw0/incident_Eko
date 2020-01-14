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
			$Complete_Date = $row['Complete_Date'];
			$Time_total = $row['Time_total'];
		?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>incident of eko SumTime</title>
	</head>
	<center>
	<body>
		<h1>Form Incident of Eko SumTime</h1>
			<form action="incident_updatetime.php" method="POST">
						&nbsp&nbsp&nbsp&nbsp&nbsp Incident_No:
					<input type="text" name="Incident_No" value="<?php echo $Incident_No; ?>" /><br />
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Start_Date:
					<input type="text" name="Start_Date" value="<?php echo $Start_Date; ?>" /><br />
				Complete_Date : 
					<input type="text" name="Complete_Date" value="<?php echo $Complete_Date; ?>"><br />
						<?php
						//สูตรคำนวณเวลารวม
						$date1 = strtotime("$Start_Date"); 
						$date2 = strtotime("$Complete_Date"); 
						$diff = abs($date2 - $date1);
						$years = floor($diff / (365*60*60*24)); 
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
						$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
						$minutes = floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24-$hours*60*60)/60); 
						$Time_total=("$months months $days days $hours hours $minutes minutes");
						?>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
				Time_total:
					<input type="text" name="Time_total" value="<?php echo $Time_total; ?>"><br /><br />
							&nbsp&nbsp&nbsp&nbsp&nbsp
						<button type="submit">Submit</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<button type="button" onclick="javascript:window.history.back();">Back</button>
					
	</body>
	</html>