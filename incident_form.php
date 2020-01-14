	<?php require("mysql/config.php");
	?>
	<html>		
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>incident of eko AddNew</title>
		</head>
		<center>
		<body>
			<h1>Form Incident of Eko AddNew</h1>
				
			<?php
			//รันปี+เลขรหัสอัตโนมัติ
				$year=(date('Y/'));
				$sql="SELECT Max(substr(Incident_No,-5))+1 as MaxID from incident_of_report where Incident_No";
				require("mysql/connect.php");
				$result=mysqli_query($conn,$sql);
				$data=mysqli_fetch_assoc($result);
				$new_id=$data['MaxID'];
				if(Incident_No==""){
					$Incident_No=$year."00001";
				}else{
					$Incident_No="$year".sprintf("%05d",$new_id);
				}
			?>
				<form action="incident_insert.php" method="POST">
						Incident_No:
							<input type="text" name="Incident_No" value="<?php echo$Incident_No?>"/><br />
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						Start_Date:
							<input type="datetime-local" name="Start_Date" value="<?php echo$Start_Date?>"/><br />
						Priority:<br />
							<input type="radio" name="Priority" value="P1" checked="checked" /> P1<br />
							<input type="radio" name="Priority" value="P2" /> P2<br />
							<input type="radio" name="Priority" value="P3" /> P3<br />
							<input type="radio" name="Priority" value="P4" /> P4<br />
						Reporter:<br />
							<input type="radio" name="Reporter" value="Eko" checked="checked" /> Eko<br />
							<input type="radio" name="Reporter" value="Egg" /> Egg<br />
							&nbsp&nbsp
							<input type="radio" name="Reporter" value="ศิริราช" />ศิริราช<br />
						Team_Support:<br />
							<input type="radio" name="Team_Support" value="Egg" checked="checked" /> Egg<br />
							<input type="radio" name="Team_Support" value="Eko" /> Eko<br />
							&nbsp&nbsp
							<input type="radio" name="Team_Support" value="ศิริราช" />ศิริราช<br />&nbsp&nbsp
							<input type="radio" name="Team_Support" value="gosoft" />gosoft<br />
							&nbsp&nbsp
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						Problem:
							<textarea name="Problem" rows="5" cols="55" wrap="hard"></textarea>
							<br />
							&nbsp&nbsp&nbsp
							<?php
							//ตั้งเป็นเวลาปัจจุบัน
							$Last_Update = date("Y-m-d H:i:s");
							?>
						Last_Update:
							<input type="datetime" name="Last_Update" value="<?php echo$Last_Update?>" /> <br />
						solving_problems:
							<textarea name="solving_problems" rows="5" cols="55" wrap="hard"></textarea><br />
						Complete_Date:
							<input type="datetime-local" name="Complete_Date" "/> <br />						
						Status:
							<select name="Status" id="Status">
								<option value="Pending">Pending</option>
								<option value="Complete">Complete</option>
							</select><br/><br />
							<button type="submit">Submit</button>
							&nbsp&nbsp&nbsp&nbsp&nbsp
							<button type="button" onclick="javascript:window.history.back();">Back</button>
				</form>

		</body>
	</html>
