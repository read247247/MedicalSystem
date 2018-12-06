<?php
    include_once "dataBase_connect.php";
    $result = mysqli_query($link, "SELECT * FROM patients");
    
    $row = mysqli_fetch_array($result);
    mysqli_close($link);
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/patient_homepage.css">
</head>
<body>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./css/style.css" />
	<header class="header-banner">
		<div class="container-width">
			<div class="logo-container">
				<div class="logo">471 Medical Project</div>
			</div>
			<nav class="menu"></nav>
			<div class="clearfix"></div>
			<div class="lead-title" id="i7klvm">Welcome, <?php echo $row['patient_Fname'];  ?>!</div>
			<div id="irxhtb">Your Account Info:</div>
			<div id="it3pb3" class="row">
				<div id="idnvug" class="cell">
					<div class="row" id="ixi7zw">
						<div class="cell" id="ihr3hi">
							<div id="i40f1j"><b><u>Username</u></b></div>
                            <div id="ih4qsk">
                                <?php echo $row['patient_username']; ?>
                            </div>
                        </div>
						<div class="cell" id="i1gd7u">
							<div id="imjtui"><b><u>SIN</b></u></div>
							<div id="i2jaql">
                                <?php echo $row['patient_SIN']; ?>
							</div>
						</div>
						<div class="cell" id="ihhl3g">
                            <div id="i81z15"><b><u>Health Card#</b></u> </div>
							<div id="inoj8b">
                                <?php echo $row['patient_Health_Card_no'];  ?>
							</div>
						</div>
						<div class="cell">
							<div id="iy5scz">
                                <b><u>First name</b></u>
                            </div>
							<div>
                                <?php echo $row['patient_Fname'];  ?>
							</div>
						</div>
						<div class="cell" id="iiuqhh">
							<div id="iin38l"><b><u>Last Name</b></u></div>
							<div>
                                <?php echo $row['patient_Lname'];  ?>
							</div>
						</div>
						<div class="cell">
							<div id="in60sh"><b><u>City</b></u></div>
							<div>
                                <?php echo $row['patient_City'];  ?>
							</div>
						</div>
						<div class="cell">
							<div id="izrryl"><b><u>Street</b></u></div>
							<div>
                                <?php echo $row['patient_Street'];  ?>
							</div>
						</div>
						<div class="cell">
							<div id="iysvp3"><b><u>Province</b></u></div>
							<div>
                                <?php echo $row['patient_Province'];  ?>
							</div>
						</div>
						<div class="cell">
							<div id="ia8rpu"><b><u>Insurance Provider</b></u></div>
							<div>
                                <?php echo $row['patient_Insurance_Provider'];  ?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class = "row">
                <form action = "book_appointment.php", method = "post">
                    <input type = "hidden", name = "SubmitCheck", value = "" />
                    <button type = "submit">
                        Book Appointment
                </button>
                </form>
            </div>
		</div>
	</header>
</body>
<html>
