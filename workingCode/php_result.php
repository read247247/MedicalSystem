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
            header("location: patient_homepage.php");
        } else{   //searches medstaff table

            $sql = "SELECT * FROM MEDICALSTAFF WHERE MedStaff_username = '".$username."' AND MedStaff_password = '".$password."'";
            $result = mysqli_query($link, $sql);

            if (!mysqli_query($link,$sql)){
                die('Error: ' . mysqli_error($link));
            }

            if(mysqli_num_rows($result) == 1){
                header("location: medstaff_homepage.php");
            }
            else{
              $err_message = 'Incorrect username or password';
              header("Location: index.php?error=$err_message");
            }
        }
    }
?>
