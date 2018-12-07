<?php
include_once "dataBase_connect.php";
$input = $_POST['sin'];
// echo $input;
$result = mysqli_query($link, "SELECT * FROM appointment WHERE App_Patient_SIN = '" . $input . "'");

$patient_result = mysqli_query($link, "SELECT patient_Lname, patient_Fname FROM patients, appointment 
                                        WHERE App_Patient_SIN = '" . $input . "'
                                        AND App_Patient_SIN = patient_SIN");
//$patient_names = mysqli_fetch_all($patient_result, MYSQLI_ASSOC);


$staff_result = mysqli_query($link, "SELECT MedStaff_Fname, MedStaff_Lname FROM medicalstaff, appointment 
                                        WHERE App_Patient_SIN = '" . $input . "'
                                        AND App_MedStaff_SIN = MedStaff_SIN");
//$staff_names = mysqli_fetch_all($staff_result, MYSQLI_ASSOC);

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
<th>Confirmation #</th>
<th>Patient Name</th>
<th>Doctor's Name</th>
<th>Location Name</th>
<th>Reason for Appointment</th>
<th>Date of Appointment</th>
<th>Start Time</th>
<th>End Time</th>
</tr>";
			
			while($row = mysqli_fetch_array($result))
			{
			    $patient_row = mysqli_fetch_array($patient_result);
			    $staff_row = mysqli_fetch_array($staff_result);
			    
			    echo "<tr>";
			    echo "<td>" . $row['App_ConfirmationNum'] . "</td>";
			    //echo "<td>" . $row['App_Patient_SIN'] . "</td>";
			    //echo "<td>" . $row['App_MedStaff_SIN'] . "</td>";
			    echo "<td>" ; echo $patient_row['patient_Fname']; echo " "; echo $patient_row['patient_Lname']; echo "</td>";
			    echo "<td>" ; echo "Dr. "; echo $staff_row['MedStaff_Fname']; echo " "; echo $staff_row['MedStaff_Lname']; echo "</td>";
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
			<form action = "patient_homepage.php", method = "post" >
			<input type = "hidden", name = "sin", value =  $input />
<button type = "submit">
Back
</button>
</form>
		</div>
	</header>
</body>
<html>