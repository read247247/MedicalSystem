<?php
include_once "dataBase_connect.php";
$input = $_POST['sin'];
// echo $input;
$result = mysqli_query($link, "SELECT * FROM appointment WHERE App_Patient_SIN = '" . $input . "'");

mysqli_close($link);
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/NewAppDisplay.css">
</head>
<body>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./css/appointmentview.css" />
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./css/appointmentview.css" />
	<header id="irc5ag" class="header-banner">
		<div class="container-width">
			<div class="logo-container">
				<div class="logo">471 Medical Project</div>
			</div>
			<nav class="menu"></nav>
			<div class="clearfix"></div>
			<div id="i7klvm" class="lead-title">All upcoming appointments</div>
			<div id="irxhtb">Your upcoming appointments</div>
			<div id="ixi7zw" class="row">
			<?php 
			echo "<table border='1'>
<tr>
<th>App_ConfirmationNum</th>
<th>App_Patient_SIN</th>
<th>App_MedStaff_SIN</th>
<th>App_Inst_Name</th>
<th>App_appointmentType</th>
<th>App_Date</th>
<th>App_Start_time</th>
<th>App_End_Time</th>
</tr>";
			
			while($row = mysqli_fetch_array($result))
			{
			    echo "<tr>";
			    echo "<td>" . $row['App_ConfirmationNum'] . "</td>";
			    echo "<td>" . $row['App_Patient_SIN'] . "</td>";
			    echo "<td>" . $row['App_MedStaff_SIN'] . "</td>";
			    echo "<td>" . $row['App_Inst_Name'] . "</td>";
			    echo "<td>" . $row['App_appointmentType'] . "</td>";
			    echo "<td>" . $row['App_Date'] . "</td>";
			    echo "<td>" . $row['App_Start_time'] . "</td>";
			    echo "<td>" . $row['App_End_Time'] . "</td>";
			    echo "</tr>";
			}
			echo "</table>";
			?>

			</div>
		</div>
	</header>
</body>
<html>