	<?php require("mysql/config.php");?>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>incident_of_eko_application_report</title>
		</head>
			<body>
				<?php
				//ช่องค้นหา
					$sql="SELECT * FROM incident_of_report";
					if(isset($_GET['Keyword'])){
						$keyword=$_GET['Keyword'];
						$sql.=" WHERE Incident_No LIKE '%".$keyword."%'";
						//print($_GET['Keyword']);
						//print($sql);
					}else{
						$keyword="";
					}
					require("mysql/connect.php");
					$result=mysqli_query($conn,$sql);
					//print_r($result);
				?>
					<form action="incident_list.php" method="get" target="_self" id="SearchForm">
					ค้นหา:<input name="Keyword" type="text" id="Keyword" value="<?php echo($keyword)?>">&nbsp&nbsp
						<input type="submit" name="button" id="button" value="ค้นหา">&nbsp&nbsp
						<input type="button" value="All" onclick="test()">&nbsp&nbsp
						<input type="button" value="AddNew" onclick="test1()">
					</form>
					<table width="0" border="0" cellspacing="0" cellpadding="5">
						<!--หัวตาราง--->
						<tr>
							<td align="center" valign="top" bgcolor="#CCCCCC">manage</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Incident_No</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Start_Date</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Priority</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Reporter</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Team_Support</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Problem</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Last_Update</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">solving_problems</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Complete_Date</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Status</td>
							<td align="center" valign="top" bgcolor="#CCCCCC">Time_total</td>
						 </tr>
					  
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
						?>
						<!--เนื้อหา--->
						<tr>
							<td height="37" align="left" valign="top"> 
								<a href="incident_formup.php?Incident_No=<?php echo $Incident_No; ?>">Edit</a>
								<a href="incident_detail.php?Incident_No=<?php echo $Incident_No; ?>">viwe</a>

							</td>
								<td align="left" valign="top"><?php echo $Incident_No; ?></td>
								<td align="left" valign="top"><?php echo $Start_Date; ?></td>
								<td align="left" valign="top"><?php echo $Priority; ?></td>
								<td align="left" valign="top"><?php echo $Reporter; ?></td>
								<td align="left" valign="top"><?php echo $Team_Support; ?></td>
								<td align="left" valign="top"><?php echo $Problem; ?></td>
								<td align="left" valign="top"><?php echo $Last_Update; ?></td>
								<td align="left" valign="top"><?php echo $solving_problems; ?></td>
								<td align="left" valign="top"><?php echo $Complete_Date; ?></td>
								<td align="left" valign="top"><?php echo $Status; ?></td>																			
								<td align="left" valign="top"><?php $date1 = strtotime("$Start_Date"); 
																	$date2 = strtotime("$Complete_Date"); 
																	$diff = abs($date2 - $date1); 
																	$years = floor($diff / (365*60*60*24)); 
																	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
																	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
																	$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60)); 
																	$minutes = floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24-$hours*60*60)/60); 
																		printf("%d days,%d hours,%d minutes",$days,$hours,$minutes);?></td>
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