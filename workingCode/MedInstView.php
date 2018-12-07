<?php
include_once "dataBase_connect.php";
$input = $_POST['medinstname'];
echo $input;
    $result = mysqli_query($link, "SELECT * FROM MEDICALINSTITUTION WHERE mi_Inst_Name = 'Hospital 1'");
//echo json_encode($result);
mysqli_close($link);
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/MedInstView.css">
</head>
<body>
	<header id="irc5ag" class="header-banner">
		<div class="container-width">
			<div class="logo-container">
				<div class="logo">471 Medical Project</div>
			</div>
			<nav class="menu"></nav>
			<div class="clearfix"></div>
			<div id="i7klvm" class="lead-title">Medical Institution Info</div>
			<div id="ixi7zw" class="row">
				<?php 
			echo "<table border='1'>
<tr>
<th>mi_MedInst_ID</th>
<th>mi_Inst_Name</th>
<th>mi_Inst_Location</th>
<th>mi_Inst_Type</th>
<th>mi_Opening_Time</th>
<th>mi_Closing_Time</th>
</tr>";
                    $row = mysqli_fetch_array($result);
			//while()
			//{
			    echo "<tr>";
			    echo "<td>" . $row['mi_MedInst_ID'] . "</td>";
			    echo "<td>" . $row['mi_Inst_Name'] . "</td>";
			    echo "<td>" . $row['mi_Inst_Location'] . "</td>";
			    echo "<td>" . $row['mi_Inst_Type'] . "</td>";
			    echo "<td>" . $row['mi_Opening_Time'] . "</td>";
			    echo "<td>" . $row['mi_Closing_Time'] . "</td>";
			    echo "</tr>";
			//}
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
