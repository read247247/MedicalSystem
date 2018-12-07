<?php
    require_once "dataBase_connect.php";
    
    $result = mysqli_query($link, "SELECT * FROM MEDICALSTAFF");
    $row = mysqli_fetch_array($result);
    
    $sql2 = "SELECT msq_Qualification FROM MEDSTAFFQUALIFICATIONS WHERE msq_MedStaff_SIN = '".$row['MedStaff_SIN']."' ";
	$result2 = mysqli_query($link, $sql2);
    
    $sql3 = "SELECT sa_Area_of_Expertice FROM SPECIALISTAREAS WHERE sa_MS_SIN = '".$row['MedStaff_SIN']."' ";
	$result3 = mysqli_query($link, $sql3);
	
	$sql4 = "SELECT surg_Type_of_Surgery FROM SURGEONAREAS WHERE surg_MedStaff_SIN = '".$row['MedStaff_SIN']."' ";
	$result4 = mysqli_query($link, $sql4);
	
	$sql5 = "SELECT wp_Inst_name, wp_Type FROM WORKPLACEMENTS WHERE wp_MedStaff_SIN = '".$row['MedStaff_SIN']."' ";
	$result5 = mysqli_query($link, $sql5);
    
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
			<div class="lead-title" id="i7klvm">Welcome, <?php echo $row['MedStaff_Fname'];  ?>!</div>
			<div id="irxhtb">Your Account Info:</div>
			<div id="it3pb3" class="row">
				<div id="idnvug" class="cell">
					<div class="row" id="ixi7zw">
						<div class="cell" id="ihr3hi">
							<div id="i40f1j"><b><u>Username</u></b></div>
                            <div id="ih4qsk">
                                <?php echo $row['MedStaff_username']; ?>
                            </div>
                        </div>
						<div class="cell" id="i1gd7u">
							<div id="imjtui"><b><u>SIN</b></u></div>
							<div id="i2jaql">
                                <?php echo $row['MedStaff_SIN']; ?>
							</div>
						</div>
						<div class="cell">
							<div id="iy5scz">
                                <b><u>First name</b></u>
                            </div>
							<div>
                                <?php echo $row['MedStaff_Fname'];  ?>
							</div>
						</div>
						<div class="cell" id="iiuqhh">
							<div id="iin38l"><b><u>Last Name</b></u></div>
							<div>
                                <?php echo $row['MedStaff_Lname'];  ?>
							</div>
						</div>
						<!--<div class="cell">
							<div id="ia8rpu"><b><u>Area of Specialty</b></u></div>
							<div>
                                <?php echo $row['MedStaff_isSpecialist'];  ?>
							</div>
						</div>		-->
						<div class="cell">
							<div id="ia8rpv"><b><u>Qualifications</b></u></div>
							<div>
								<?php
                                    if($row2 == null){
                                        echo "None\n";
                                    } else{
										//if the doctor has more than one qualification, then print them all
										while($row2 = mysqli_fetch_assoc($result2)){
											echo $row2['msq_Qualification']."\n";
										}
                                    }
                                ?>
							</div>
						</div>
						
						<div class="cell">
							<div id="ia8rpv"><b><u>Area of Expertise</b></u></div>
							<div>
								<?php
										//if the doctor has more than one qualification, then print them all
                                    if($row3 == null){
                                        echo "None\n";
                                    } else{
										while($row3 = mysqli_fetch_assoc($result3)){
											echo $row3['sa_Area_of_Expertice']."\n";
										}
                                    }
                                ?>
							</div>
						</div>
						<div class="cell" id="iiuqhh">
							<div id="iin87l"><b><u>Surgery experience</b></u></div>
							<div>
                                <?php
										$row4 = mysqli_fetch_assoc($result4);
										if($row4 == null){
											echo "None\n";
										}
										else{
											
											//while($row4){
												echo $row4['surg_Type_of_Surgery']."\n";
											//}
										}
										
                                ?>
							</div>
						</div>
						
						<div class="cell" id="igr3hi">
							<div id="i41f1j"><b><u>Work Location</u></b></div>
                            <div id="ih5qsk">
                                <?php 
									
									$row5 = mysqli_fetch_assoc($result5);
									
									if($row5 == null){
										echo "<i>Terminated</i>";
									}
									else{
                                        echo "<form action = \"inst_details_page.php\", method = \"post\" >";
                                        echo "<input type = \"hidden\" name = \"inst_name\", value =\" "; echo $row5['wp_Inst_name'];   echo "\" />";
                                        echo "<button type = \"submit\">";
										echo $row5['wp_Inst_name']; echo " - "; echo $row5['wp_Type'];
                                        echo "</button> </form>";
									}
								?>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <div class = "row">
                <form action = "access_precords.php", method = "post">
                    <input type = "hidden", name = "sin", value = <?php echo "\"".$row['MedStaff_SIN']."\""; ?> />
                    <button type = "submit">
                        Search Patient Records
                </button>
                </form>
<form action = "index.php", method = "post" >
<button type = "submit">
Logout
</button>
</form>
            </div>
		</div>
	</header>
</body>
<html>
