<?php
include_once "dataBase_connect.php";
$input = $_POST['sin'];
// echo $input;
$result = mysqli_query($link, "SELECT * FROM appointment WHERE App_Patient_SIN = '" . $input . "'");

$row = mysqli_fetch_array($result);
mysqli_close($link);
?>

<meta charset="utf-8"/>
<link rel="stylesheet" href="./css/appointment.css"/>
<meta charset="utf-8"/>
<link rel="stylesheet" href="./css/appointment.css"/>
<header id="irc5ag" class="header-banner">
  <div class="container-width">
    <div class="logo-container">
      <div class="logo">471 Medical Project
      </div>
    </div>
    <nav class="menu">
    </nav>
    <div class="clearfix">
    </div>
    <div id="i7klvm" class="lead-title">All upcoming appointments
    </div>
    <div id="irxhtb">Your upcoming appointments
    </div>
    <div id="ixi7zw" class="row">
      <div id="ihr3hi" class="cell">
        <div id="i40f1j">Confirmation Number
        </div>
        <div id="ih4qsk">
        </div>
        <span id="iwjorcl">Insert here your custom code</span>
      </div>
      <div>
      </div>
      <div id="i1gd7u" class="cell">
        <div id="imjtui">Your Name
        </div>
        <div id="i2jaql">
          <span id="i7vkafk">Insert here your custom code</span>
        </div>
      </div>
      <div id="ihhl3g" class="cell">
        <div id="i81z15">Your Doctor's Name
        </div>
        <div id="inoj8b">
          <span>Insert here your custom code</span>
        </div>
      </div>
      <div class="cell">
        <div id="idh0tj">Institution's Name
        </div>
        <div>
          <span>Insert here your custom code</span>
        </div>
      </div>
      <div class="cell">
        <div id="iy5scz">Reason for Appointment
        </div>
        <div>
          <span>Insert here your custom code</span>
        </div>
      </div>
      <div id="iiuqhh" class="cell">
        <div id="iin38l">Date
        </div>
        <div>
          <span>Insert here your custom code</span>
        </div>
      </div>
      <div class="cell">
        <div id="ijpvsl">Start Time
        </div>
        <div>
          <span>Insert here your custom code</span>
        </div>
      </div>
      <div class="cell">
        <div id="in60sh">End Time
        </div>
        <div>
          <span>Insert here your custom code</span>
        </div>
      </div>
    </div>
  </div>
</header>