	<?php require("mysql/config.php");
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
		$sql="UPDATE incident_of_report SET Incident_No='$Incident_No',Start_Date='$Start_Date',Priority='$Priority',Reporter='$Reporter',Team_Support='$Team_Support',Problem='$Problem',Last_Update='$Last_Update',solving_problems='$solving_problems',Complete_Date='$Complete_Date',Status='$Status' WHERE Incident_No='$Incident_No'";
		require("mysql/connect.php");
		$result=mysqli_query($conn,$sql);
		$v1=($result==1)?1:0;
		require("mysql/unconn.php");
	?>

	<html>
		<head>
			<meta charset="UTF-8">
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
