	<?php require("mysql/config.php");
		//รับค่า input
		$Incident_No = $_POST['Incident_No'];
		$Start_Date=$_POST['Start_Date'];
		$Last_Update=$_POST['Last_Update'];
		$solving_problems=$_POST['solving_problems'];
		$Complete_Date=$_POST['Complete_Date'];
		$Status=$_POST['Status'];
			$date1 = strtotime("$Start_Date"); 
			$date2 = strtotime("$Complete_Date"); 
			$diff = abs($date2 - $date1);
			$years = floor($diff / (365*60*60*24)); 
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
			$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
			$minutes = floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24-$hours*60*60)/60); 
			$Time_total=("$days days,$hours hours,$minutes minutes");
		$sql="UPDATE incident_of_report SET Last_Update='$Last_Update',solving_problems='$solving_problems',Complete_Date='$Complete_Date',Status='$Status',Time_total='$Time_total' WHERE Incident_No='$Incident_No'";
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
						window.location.replace('incident_detail.php?Incident_No=<?php echo $Incident_No; ?>');
					}else{
						alert('การแก้ไขล้มเหลว');
						window.history.back();
						 }
			</script>
		</body>
	</html>