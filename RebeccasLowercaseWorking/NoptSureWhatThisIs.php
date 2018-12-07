<?php
	define('DB_SERVER', '127.0.0.1');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'DoctorDB');
	// Create connection
	$con=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con, "SELECT * FROM access");
	echo "<table border='1'>
	<tr>
	<th>Acc_MedStaff_SIN</th>
	<th>Acc_Record_ID</th>
	</tr>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['Acc_MedStaff_SIN'] . "</td>";
		echo "<td>" . $row['Acc_Record_ID'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($con);
?>