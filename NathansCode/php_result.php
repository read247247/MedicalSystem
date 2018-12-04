<?php
    if( isset($_POST['submit']) ){
        $username = $_POST['username'];
    }
    $hostame = 'localhost';
    $user = 'root';
    $password = '*MySQLRootPWD*';
    $sql = 'SELECT * FROM users WHERE username = ' + $username + ';';
    $link = mysql_connect($hostname, $user, $password);

    mysql_select_db('DoctorDB') or die();
    
    $result = mysql_query($sql, $link);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
} else {
    header("Location:/test.html");
}

//while ($row = mysql_fetch_assoc($result)) {
  //  echo $row['foo'];
//}

mysql_free_result($result);

?>
