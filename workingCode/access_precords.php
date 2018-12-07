<?php
	
	require_once "dataBase_connect.php";
    $username = $_POST['username'];
    echo $username;
    
    $sql = "SELECT MedStaff_SIN from MEDICALSTAFF WHERE MedStaff_username = '".$username."'";
    
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql = "SELECT mhitem_Diagnosis, mhitem_Recommended_Treatment, mhitem_Notes FROM ACCESS AS A, MEDICALHISTORYITEM AS M WHERE A.Acc_Record_ID = M.mhitem_Record_ID AND A.Acc_MedStaff_SIN = ".$row['MedStaff_SIN'].";";
	
	$result = mysqli_query($link, $sql);
	
	if (!$result){
		die('Error: ' . mysqli_error($link));
	}
	
	//should just display all the patient info
	else{
		echo "working so far";
		
		//iterates through results; spits out a row
		while($row = mysqli_fetch_assoc($result)){
			
			echo $row['mhkitem_Diagnosis']." ".$row['mhitem_Reccomended_Treatment']." ".$row['mhitem_Notes']."\n";
			
		}
	}

?>
