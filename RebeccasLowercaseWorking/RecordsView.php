<?php
include_once "dataBase_connect.php";
$input = $_POST['sin'];
$result = mysqli_query($link, "SELECT * FROM record WHERE rec_Patient_SIN = '" . $input . "'");
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
<th>Record ID</th>
<th>Patient SIN</th>
<th>Record Date</th>
</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['rec_Record_ID'] . "</td>";
        echo "<td>" . $row['rec_Patient_SIN'] . "</td>";
        echo "<td>" . $row['rec_Date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
			</div>
			<form action="patient_homepage.php" , method="post">
				<input type="hidden" , name="sin" , value=$input />
				<button type="submit">Back</button>
			</form>
		</div>
		<div class="row" id="ij4c4y">
			<div class="cell" id="ibj7xz"></div>
		</div>
	</header>
</body>
<html>