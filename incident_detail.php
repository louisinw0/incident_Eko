	<?php 
		require("mysql/config.php");
		$Incident_No=$_GET['Incident_No'];
		require("incident_select.php");
	?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>incident_of_eko_application_report</title>
	</head>

	<body>

	<h1>Incident of Eko detail</h1>
		Incident_No:<?php echo $Incident_No; ?><br />
		Start_Date:<?php echo $Start_Date; ?><br />
		Priority:<?php echo $Priority; ?><br />
		Reporter:<?php echo $Reporter; ?><br />
		Team_Support:<?php echo $Team_Support; ?><br />
		Problem:<?php echo $Problem; ?><br />
		Last_Update:<?php echo $Last_Update; ?><br />
		solving_problems:<?php echo $solving_problems; ?><br />
		Complete_Date : <?php echo $Complete_Date; ?><br />
		Status : <?php echo $Status; ?><br />
			<a href="incident_formup.php?Incident_No=<?php echo $Incident_No; ?>">Edit</a>&nbsp;
			<a href="incident_list.php">Home</a>
	</body>
	</html>