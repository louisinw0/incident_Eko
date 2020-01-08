	<?php require("mysql/config.php");?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>incident_of_eko_application_report</title>
	</head>

	<body>

	<?php
		//รับค่า input
		$Incident_No = $_POST['Incident_No'];
		$Start_Date=$_POST['Start_Date'];
		$Priority=$_POST['Priority'];
		$Reporter=$_POST['Reporter'];
		$Team_Support=$_POST['Team_Support'];
		$Problem=$_POST['Problem'];
		$Last_Update=$_POST['Last_Update'];
		$solving_problems=$_POST['solving_problems'];
		$Complete_Date=$_POST['Complete_Date'];
		$Status=$_POST['Status'];
		$sql="INSERT INTO `incident_of_report`(Incident_No,Start_Date,Priority,Reporter,Team_Support,Problem,Last_Update,solving_problems,Complete_Date,Status)"
		."VALUES('$Incident_No','$Start_Date','$Priority','$Reporter','$Team_Support','$Problem','$Last_Update','$solving_problems','$Complete_Date','$Status')";
		require("mysql/connect.php");
		$result=mysqli_query($conn,$sql);
		$v1=($result==1)?1:0;
		require("mysql/unconn.php");
	?>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Incident of Eko</title>
	</head>
	<body>
	<script>
		var v1 =<?php echo $v1; ?>;
			if(v1=1){
				alert('การบันทึกเสร็จสิ้น');
				window.location.replace("incident_detail.php?Incident_No=<?php echo($Incident_No);?>");
			}else{
				alert('การบันทึกล้มเหลว');
				window.history.back();
			}
	</script>
	</body>
	</html>