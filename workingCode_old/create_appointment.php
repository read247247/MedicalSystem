<?php
    require_once "dataBase_connect.php";
    
    if(($_POST['doc'] != -1) && ($_POST['inst_name'] != -1) && ($_POST['App_Date'] != null) && ($_POST['App_Start_Time'] != null)){
		
		if($_POST['App_End_Time'] == null){
			$end = NULL;
		}
		else{
			$end = $_POST['App_End_Time'];
		}
		
		//looks for institution
		$result = mysqli_query($link, "SELECT mi_Inst_Name FROM MEDICALINSTITUTION");
		$i = -1;
		while($row = mysqli_fetch_assoc($result)){
			
			if($i == $_POST['inst_name']){
				break 1;
			}
			
			$inst = $row['mi_Inst_Name'];
			$i++;
		}
		
		//looks for doc
		$result = mysqli_query($link, "SELECT MedStaff_SIN FROM MEDICALSTAFF");
		$i = -1;
		while($row = mysqli_fetch_assoc($result)){
			
			if($i == $_POST['doc']){
				break 1;
			}
			
			$doc = $row['MedStaff_SIN'];
			$i++;
		}
		
		//inserts into database
		$finally = mysqli_query($link, "INSERT INTO APPOINTMENT (App_ConfirmationNum, App_Patient_SIN, App_MedStaff_SIN, App_Inst_Name, App_appointmentType, App_Date, App_Start_time, App_End_Time)
								VALUES (NULL, '".$_POST['App_Patient_SIN']."', '".$doc."', '".$inst."', '".$_POST['App_AppointmentType']."', '".$_POST['App_Date']."', '".$_POST['App_Start_Time']."', '".$end."')");
		
		if($finally != null){
			echo "successfully added appointment!";
			//should redirect to a success page.
			//header();			
			exit();
		}
		else{
			echo "failed to add appointment :c";
			exit();
		}
		
	}
	else{
		echo "One of the following fields is blank: Medical Institution, Doctor's Name, Date of Appointment, Time of Appointment.";
		exit();
	}
    
    mysqli_close($link);
?>
