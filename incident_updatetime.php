	<?php require("mysql/config.php");
		//รับค่า input
		$Incident_No = $_POST['Incident_No'];
		$Start_Date=$_POST['Start_Date'];
		$Complete_Date=$_POST['Complete_Date'];
		$Time_total=$_POST['Time_total'];
		$sql="UPDATE incident_of_report SET Time_total='$Time_total' WHERE Incident_No='$Incident_No'";
		require("mysql/connect.php");
		$result=mysqli_query($conn,$sql);
		$v1=($result==1)?1:0;
		require("mysql/unconn.php");
	?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>incident_of_eko_application_report</title>
	</head>

	<body>
	<script language="javascript">
		var v1 =<?php echo $v1; ?>;
		if(v1=1){
			alert('การแก้ไขเสร็จสิ้น');
			window.location.replace('incident_list.php');
		}else{
			alert('การแก้ไขล้มเหลว');
			window.history.back();
		}
	</script>
	</body>
	</html>