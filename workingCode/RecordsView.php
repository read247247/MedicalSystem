<?php
include_once "dataBase_connect.php";
$input = $_POST['sin'];
$result = mysqli_query($link, "SELECT mhitem_Diagnosis, mhitem_Recommended_Treatment, mhitem_Notes FROM ACCESS AS A, MEDICALHISTORYITEM AS M WHERE A.Acc_Record_ID = M.mhitem_Record_ID AND A.Acc_MedStaff_SIN = '".$input."'");
mysqli_close($link);
?>

<!-- $MedHist_result = mysqli_query($link, "SELECT * FROM record, medicalhistoryitem WHERE rec_Patient_SIN = '" . $input . "'");
$Attach_result = mysqli_query($link, "SELECT * FROM record, attachment WHERE rec_Patient_SIN = '" . $input . "'");
$MedSympt_result =mysqli_query($link, "SELECT * FROM record, medicalhistoryitem, medhistsymptoms WHERE rec_Patient_SIN = '" . $input . "'");
 -->
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/RecordsView.css">
</head>
<body>
	<header id="irc5ag" class="header-banner">
		<div class="container-width">
			<div class="logo-container">
				<div class="logo">471 Medical Project</div>
			</div>
			<nav class="menu"></nav>
			<div class="clearfix"></div>
			<div id="i7klvm" class="lead-title">Medical Records</div>
			<div id="ixi7zw" class="row">
				<?php 
			echo "<table border='1'>
<tr>
<th>mhitem_Diagnosis</th>
<th>mhitem_Recommended_Treatment</th>
<th>mhitem_Notes</th>
</tr>";
			
			while($row = mysqli_fetch_array($result))
			{
			    echo "<tr>";
			    echo "<td>" . $row['mhitem_Diagnosis'] . "</td>";
			    echo "<td>" . $row['mhitem_Recommended_Treatment'] . "</td>";
			    echo "<td>" . $row['mhitem_Notes'] . "</td>";
			    echo "</tr>";
			}
			echo "</table>";
			?>
			</div>
		</div>
		<div class="row" id="ij4c4y">
			<div class="cell" id="ibj7xz"></div>
		</div>
	</header>
</body>
<html>
