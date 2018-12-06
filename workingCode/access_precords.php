<?php
	
	require_once "dataBase_connect.php";
	
	$sql = "SELECT patient_Fname, patient_Lname, patient_Health_Card_no patient_Insurance_Provider FROM PATIENTS";
	
	$result = mysqli_query($link, $sql);
	
	if (!$result){
		die('Error: ' . mysqli_error($link));
	}
	
	//should just display all the patient info
	else{
		echo "working so far";
		
		//iterates through results; spits out a row
		while($row = mysqli_fetch_assoc($result)){
			
			echo $row['patient_Fname']." ".$row['patient_Lname']."\n";
			
		}
	}

?>
