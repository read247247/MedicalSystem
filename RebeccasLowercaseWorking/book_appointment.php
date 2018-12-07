<?php
include_once "dataBase_connect.php";
	$result = mysqli_query($link, "SELECT MedStaff_Fname, MedStaff_Lname FROM medicalstaff");
	$staff_names = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $result = mysqli_query($link, "SELECT mi_Inst_Name FROM medicalinstitution");
    $institution_names = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_close($link);
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/REALapp.css">
</head>
<body>
<?php echo json_encode($staff_names); ?>
	<header class="header-banner">
		<div class="container-width">
			<div class="logo-container">
				<div class="logo">471 Medical Project</div>
			</div>
			<nav class="menu"></nav>
			<div class="clearfix"></div>
			<div id="i7klvm" class="lead-title">Book an Appointment</div>
			<div id="irxhtb">Enter Appointment Information</div>
			<div id="it3pb3" class="row">
				<div id="idnvug" class="cell">
					<form class="form" action = "create_appointment.php", method = "POST">
						<div class="form-group">
							<label class="label">Medical Institution's Name</label>
						</div>
						<select name = "inst_name">
                            <option value="-1">- Select your institution's name -</option>
                            <?php
                                for($i = 0; $i < count($institution_names); $i++){
                                    echo "<option value = \"";
                                    echo $i;
                                    echo "\" >"; echo $institution_names[$i]['mi_Inst_Name'];
                                    echo "</option>";
                                    //<option value="1">Option 1</option>
                                }
                            ?>
                        </select>
						<div class="form-group">
							<label class="label">Your SIN</label><input
name="App_Patient_SIN" value = <?php echo "\"";echo $_POST['sin'];echo "\"";?> readonly = "readonly" required
								type="number" class="input" />

						</div>
						<div class="form-group">
							<label class="label">Your Doctor's Name</label>
                            <select name = "doc">
                                <option value="-1">- Select your doctor's name -</option>
									<?php
								
									for($i = 0; $i < count($staff_names); $i++){
										echo "<option value = \"";
										echo $i;
										echo "\" >"; echo "Dr. "; echo $staff_names[$i]['MedStaff_Fname']; echo " "; echo $staff_names[$i]['MedStaff_Lname'];
										echo "</option>";
										

										//<option value="1">Option 1</option>
									}
									
									?>
                            </select>
						</div>
						<div class="form-group">
							<label class="label">Reason for the appointment?</label>
							<textarea placeholder="Type the reason for your appointment"
								name="App_AppointmentType" class="textarea"></textarea>
						</div>
						<div class="form-group">
							<label class="label">Date of the appointment</label><input
								type="text"
								placeholder="Type here the date you want for your appointment (Format: YYYY-MM-DD)"
								name="App_Date" class="input" />
						</div>
						<div class="form-group">
							<label class="label">Start time of the appointment</label><input
								type="text"
								placeholder="Type here the start time you want for your appointment (Format: HH:MM, 24 hour clock)"
								name="App_Start_Time" class="input" />
						</div>
						<div class="form-group">
							<label class="label">End time of the appointment</label><input
								type="text"
								placeholder="Type here the end time you want for your appointment (Format: HH:MM, 24 hour clock)"
								name="App_End_Time" class="input" />
						</div>
						<div class="form-group"></div>
						<div class="form-group">
							<button type="submit" class="button">Send</button>
						</div>
					</form>
<form action = "patient_homepage.php", method = "post" >
<button type = "submit">
Back
</button>
</form>
				</div>
			</div>
		</div>
	</header>
</body>
</html>
