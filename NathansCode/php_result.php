
<?php

require_once "dataBase_connect.php";

if(isset($_POST['username'])){
	
	$username = stripslashes($_POST['username']);
	$password = $_POST['password'];
	
	
	//searches patient table
	$sql = "SELECT patient_Fname, patient_Lname FROM PATIENTS WHERE patient_username = '".$username."' AND patient_password = '".$password."'";
	
	$result = mysqli_query($link, $sql);
	
	if (!mysqli_query($link,$sql)){
	  die('Error: ' . mysqli_error($link));
	}
	
	if(mysqli_num_rows($result) == 1){
		
		$pName = mysqli_fetch_assoc($result);
		echo "Welcome ".$pName['patient_Fname']." ".$pName['patient_Lname']."!";
		exit();
	}
	
	//searches medstaff table
	else{
		
		
		$sql = "SELECT * FROM MEDICALSTAFF WHERE MedStaff_username = '".$username."' AND MedStaff_password = '".$password."'";
		
		$result = mysqli_query($link, $sql);
	
		if (!mysqli_query($link,$sql)){
		  die('Error: ' . mysqli_error($link));
		}
		
		if(mysqli_num_rows($result) == 1){
			
			$pName = mysqli_fetch_assoc($result);
			echo "Welcome ".$pName['MedStaff_Fname']." ".$pName['MedStaff_Lname']."!";
			exit();
		}
		else{
			echo "login unsuccessful";
			exit();
		}
		
	}
	
}

    // Initialize the session
/*    
	session_start();
    
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        //header("location: welcome.php");
        
        exit;
    }
    
*/    
/*
    // Include config file
    require_once "dataBase_connect.php";
    
    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";
    
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Validate credentials
        if(empty($username_err) && empty($password_err)){
			
            // Prepare a select statement
            $sql = "SELECT patient_username, patient_password FROM patients WHERE patient_username = '".$username."' and patient_password = '".$password."'";
            
            echo "made sql statement\n";
            
            if($stmt = mysqli_prepare($link, $sql)){
				
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = $username;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $db_password);
                        if(mysqli_stmt_fetch($stmt)){
                            
                                // Password is correct, so start a new session
//                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                
                                // Redirect user to welcome page
                                header("location: test.html");
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $username_err = "No account found with that username.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            if($stmt == false){
				header("");
				die("Couldn't connect ".mysqli_connect_error());
			}
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        mysqli_close($link);
    }
    */
    ?>
