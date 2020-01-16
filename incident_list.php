	<?php require("mysql/config.php");?>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>incident of eko application report</title>
			<!----รูปแบบตาราง--->
			<style>
				table {
				  border-collapse: collapse;
				}

				table, td, th {
				  border: 1px solid black;
				}
			</style>
		</head>
			<body>
				<?php
				//ช่องค้นหาหาเลข Incident_No คำที่ใกล้เคียง
					$sql="SELECT * FROM incident_of_report";
					if(isset($_GET['Keyword'])){
						$keyword=$_GET['Keyword'];
						$sql.=" WHERE Incident_No LIKE '%".$keyword."%'";
						
					}else{
						$keyword="";
					}
					require("mysql/connect.php");
					$result=mysqli_query($conn,$sql);
					
				?>
				<!-----สร้างตาราง----->
					<form action="incident_list.php" method="get" target="_self" id="SearchForm">
					ค้นหา:<input name="Keyword" type="text" id="Keyword" value="<?php echo($keyword)?>">&nbsp;
							<input type="submit" name="button" id="button" value="ค้นหา">&nbsp;
							<input type="button" onclick="window.location.href='incident_list.php'" value="All">
							&nbsp;
							<input type="button" onclick="window.location.href='incident_form.php'" value="AddNew">
							<br>
					</form>
					<table width="0" border="0" cellspacing="1" cellpadding="5">
						<!---หัวตาราง---->
						<tr>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Manage</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Incident No</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Start_Date</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Priority</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Reporter</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Team Support</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Problem</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Last_Update</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Solving Problems</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Complete_Date</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Status</b></td>
							<td align="center" valign="top" bgcolor="#CCCCCC"><b>Time Total</b></td>
						 </tr>
							<!----loopข้อมูลในตาราง---->
						<?php
							while($record=mysqli_fetch_array($result)){
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
								$Time_total=$record['Time_total'];
						?>
						<!-----เนื้อหาดึงข้อมูลมาจากดาต้าเบส----->
						<tr>
							<td  align="left" valign="top"> 
							<input type="button" onclick="window.location.href='incident_formup.php?Incident_No=<?php echo $Incident_No; ?>'" value="Update">
							<input type="button" onclick="window.location.href='incident_formtime.php?Incident_No=<?php echo $Incident_No; ?>'" value="คำนวณเวลา">
							</td>
								<td align="left" valign="top"><?php echo $Incident_No; ?></td>
								<td align="left" valign="top"><?php echo $Start_Date; ?></td>
								<td align="left" valign="top"><?php echo $Priority; ?></td>
								<td align="left" valign="top"><?php echo $Reporter; ?></td>
								<td align="left" valign="top"><?php echo $Team_Support; ?></td>
								<td align="left" width="23%" valign="top"><?php echo $Problem; ?></td>
								<td align="left" width="4.8%" valign="top"><?php echo $Last_Update; ?></td>
								<td align="left" width="20%" valign="top"><?php echo $solving_problems; ?></td>
								<td align="left" valign="top"><?php echo $Complete_Date; ?></td>
								
										<!-----outputค่าของStatus ถ้าpendingช่องตารางเป็นสีแดง   ถ้าcompleteช่องตารางสีเขียว----->
										<?php
										if ($record["Status"] == "Pending"){
										?>
											<td bgcolor="red"><?= $record["Status"]; ?></td>
										<?php
											}
											if ($record["Status"] == "Complete"){
										?>
											<td bgcolor="Lightgreen"><?= $record["Status"]; ?></td>
										<?php
											}
										?>
								<td align="left" width="7.9%" valign="top"><?php echo $Time_total; ?></td>
						</tr>
						<?php 
																		}
						?>		
					</table>
				<?php 
					require("mysql/unconn.php");
				?>
			</body>
	</html>