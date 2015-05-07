<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Print Schedule</title>
    <script type="text/javascript">
    function saveValue(target){
	var stepVal = document.getElementById(target).value;
	alert("Value: " + stepVal);
    }
    </script>
    <style type="text/css">
      html{ 
      background-color: 
      #99CCFF; 
      font-family: Arial; 
      font-size: 13px; 
      position: relative; 
      }

      body{ 
      margin: 0; 
      padding: 0; 
      }

      a{ 
      color: #07f; 
      text-decoration: none; 
      }

      a:hover{ 
      text-decoration: underline; 
      }

      #login{ 
      color: #000; 
      background-color: #fff; 
      margin: 100px auto 0; 
      padding: 20px 20px 20px; 
      position: relative; 
      width: 600px; 
      -webkit-border-radius: 8px; 
      -moz-border-radius: 8px; 
      border-radius: 8px; 
      }

	h1{ 
      font-family: "Helvetica Neue", Arial, Helvetica, sans-serif; 
      font-size: 36px; 
	  text-align: center;
      line-height: 50px; 
      margin: 0; 
      padding: 0; 
      }
	  
      h2{ 
      font-family: "Helvetica Neue", Arial, Helvetica, sans-serif; 
      font-size: 24px; 
	  text-align: center;
      line-height: 30px; 
      margin: 0; 
      padding: 0; 
      }

      ul{ 
      margin: 8px 20px; 
      padding: 0; 
      }

      li{ 
      margin-top: 8px; 
      }
      
      input[type="text"],input[type="email"], textarea {
        background-color: #F6F6F6;
        border: 1px solid #999;
        color: #444;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
        line-height: 16px;
        padding: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        width: 262px;
      }
	  
	  select{
	  font-size: 18px;
	  font-family: Arial, Helvetica, sans-serif;
	  color: #444;
	  position: relative;
	  }
      
      .button {
        background-color: #768089;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-size: 11px;
        font-weight: bold;
        height: 25px;
        overflow: visible;
        padding: 0 12px;
        margin: 5px auto 0;
        text-decoration: none;
        vertical-align: top;
        white-space: nowrap;
        width: auto;
        -moz-appearance: none;
        -moz-border-radius: 4px;
        -webkit-appearance: none;
        -webkit-border-radius: 4px;
        line-height: 25px;
      }
      
      .button:hover {
        background-color: #87929D;
        color: #fff;
        text-decoration: none;
      }
      
      a.button.large {
        line-height: 32px;
      }
      
      .button.large {
        font-size: 16px;
        height: 32px;
        padding: 0 16px;
		position: center;
      }
      
      .button.go {
        background-color: #66AA44;
        color: #FFF;
      }
      
      .button.go:hover {
        background-color: #70B74E;
        color: #FFF;
      }
       
      .field{ 
      margin: 8px 0; 
      }

      .field label{ 
      display: block; 
      font-weight: bold; 
      font-size: 14px; 
      }
	  
      .actions{ 
      text-align: right; 
      }

      .bottom{ 
      border-top: 0px solid #ddd; 
      padding-top: 12px; 
      font-size: 11px; 
      color: #666;
      }

      .top{ 
      border-bottom: 1px solid #eee; 
      padding-bottom: 12px; 
      }

      .actions{ 
      overflow: hidden; 
      }

      .actions .secondary{ 
      float: left; 
      font-size: 14px; 
      line-height: 32px; 
      text-align: left; 
      }

      p{ 
      margin: 0; 
      padding: 0; 
      }

      .login-create{ 
      font-size: 16px; 
      font-weight: normal; 
      }
    
      @media screen and (max-width: 767px){
        html, body { background-color: #fff; }
        #login { border-radius: 0; margin: 60px 0 0; width: 94%; padding: 3%; border-top: 1px solid #ddd; }
        input[type="text"],input[type="password"], textarea { width: 96%; padding: 2% 2%; }
        .button-item { margin: 8px 8px 12px; }
      }
    </style>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
		<h2>Appointments Created</h2><br>
		<?php
			include('../CommonMethods.php');
			$debug = false;
			$Common = new Common($debug);
			$date = $_POST["Date"];
			$time1 = $_POST["8am"];
      $time2 = $_POST["830am"];
      $time3 = $_POST["9am"];
      $time4 = $_POST["930am"];
      $time5 = $_POST["10am"];
      $time6 = $_POST["1030am"];
      $time7 = $_POST["11am"];
      $time8 = $_POST["1130am"];
      $time9 = $_POST["12pm"];
      $time10 = $_POST["1230pm"];
      $time11 = $_POST["1pm"];
      $time12 = $_POST["130pm"];
      $time13 = $_POST["2pm"];
      $time14 = $_POST["230pm"];
      $time15 = $_POST["3pm"];
      $time16 = $_POST["330pm"];
      $time17 = $_POST["4pm"];
			$repeat1 = $_POST["Repeat1"];
			$repeat2 = $_POST["Repeat2"];
			$repeat3 = $_POST["Repeat3"];
			$repeat4 = $_POST["Repeat4"];
			$repeat5 = $_POST["Repeat5"];
			$weeks = $_POST["stepper"];
      $mech = $_POST["MECH"];
      $cmsc = $_POST["CMSC"];
      $cmpe = $_POST["CMPE"];
      $chen = $_POST["CHEN"];

      echo $date;
			
			for($i = 0; $i < $weeks; $i++){
				if($repeat1){
          if($time1){
  					$sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time1'";
  					$rs = $Common->executeQuery($sql, "Advising Appointments");
  					$row = mysql_fetch_row($rs);
  					if($row){
  						echo("<h3>Appointment already exists!</h3><br>");
  						echo("<h4>Time: $date 8:00AM-8:30AM</h4><br>");
            }
            else{
  						echo("<h4>Time: $date 8:00AM-8:30AM</h4>");
  					}
          }
          if($time2){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time2'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 8:30AM-9:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 8:30AM-9:00AM</h4>");
            }
          }
          if($time3){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time3'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:00AM-9:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:00AM-9:30AM</h4>");
            }
          }
          if($time4){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time4'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:30AM-10:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:30AM-10:00AM</h4>");
            }
          }
          if($time5){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time5'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:00AM-10:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:00AM-10:30AM</h4>");
            }
          }
          if($time6){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time6'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:30AM-11:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:30AM-11:00AM</h4>");
            }
          }
          if($time7){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time7'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:00AM-11:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:00AM-11:30AM</h4>");
            }
          }
          if($time8){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time8'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:30AM-12:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:30AM-12:00PM</h4>");
            }
          }
          if($time9){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time9'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:00PM-12:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:00PM-12:30PM</h4>");
            }
          }
          if($time10){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time10'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:30PM-1:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:30PM-1:00PM</h4>");
            }
          }
          if($time11){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time11'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:00PM-1:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:00PM-1:30PM</h4>");
            }
          }
          if($time12){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time12'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:30PM-2:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:30PM-2:00PM</h4>");
            }
          }
          if($time13){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time13'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:00PM-2:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:00PM-2:30PM</h4>");
            }
          }
          if($time14){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time14'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:30PM-3:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:30PM-3:00PM</h4>");
            }
          }
          if($time15){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time15'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:00PM-3:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:00PM-3:30PM</h4>");
            }
          }
          if($time16){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time16'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:30PM-4:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:30PM-4:00PM</h4>");
            }
          }
          if($time17){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time17'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 4:00PM-4:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 4:00PM-4:30PM</h4>");
            }
          }
				}
				if($repeat2){
          if($time1){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time1'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 8:00AM-8:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 8:00AM-8:30AM</h4>");
            }
          }
          if($time2){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time2'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 8:30AM-9:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 8:30AM-9:00AM</h4>");
            }
          }
          if($time3){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time3'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:00AM-9:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:00AM-9:30AM</h4>");
            }
          }
          if($time4){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time4'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:30AM-10:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:30AM-10:00AM</h4>");
            }
          }
          if($time5){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time5'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:00AM-10:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:00AM-10:30AM</h4>");
            }
          }
          if($time6){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time6'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:30AM-11:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:30AM-11:00AM</h4>");
            }
          }
          if($time7){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time7'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:00AM-11:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:00AM-11:30AM</h4>");
            }
          }
          if($time8){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time8'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:30AM-12:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:30AM-12:00PM</h4>");
            }
          }
          if($time9){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time9'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:00PM-12:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:00PM-12:30PM</h4>");
            }
          }
          if($time10){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time10'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:30PM-1:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:30PM-1:00PM</h4>");
            }
          }
          if($time11){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time11'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:00PM-1:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:00PM-1:30PM</h4>");
            }
          }
          if($time12){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time12'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:30PM-2:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:30PM-2:00PM</h4>");
            }
          }
          if($time13){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time13'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:00PM-2:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:00PM-2:30PM</h4>");
            }
          }
          if($time14){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time14'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:30PM-3:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:30PM-3:00PM</h4>");
            }
          }
          if($time15){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time15'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:00PM-3:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:00PM-3:30PM</h4>");
            }
          }
          if($time16){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time16'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:30PM-4:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:30PM-4:00PM</h4>");
            }
          }
          if($time17){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time17'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 4:00PM-4:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 4:00PM-4:30PM</h4>");
            }
          }
        }
        if($repeat3){
          if($time1){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time1'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 8:00AM-8:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 8:00AM-8:30AM</h4>");
            }
          }
          if($time2){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time2'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 8:30AM-9:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 8:30AM-9:00AM</h4>");
            }
          }
          if($time3){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time3'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:00AM-9:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:00AM-9:30AM</h4>");
            }
          }
          if($time4){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time4'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:30AM-10:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:30AM-10:00AM</h4>");
            }
          }
          if($time5){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time5'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:00AM-10:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:00AM-10:30AM</h4>");
            }
          }
          if($time6){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time6'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:30AM-11:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:30AM-11:00AM</h4>");
            }
          }
          if($time7){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time7'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:00AM-11:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:00AM-11:30AM</h4>");
            }
          }
          if($time8){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time8'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:30AM-12:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:30AM-12:00PM</h4>");
            }
          }
          if($time9){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time9'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:00PM-12:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:00PM-12:30PM</h4>");
            }
          }
          if($time10){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time10'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:30PM-1:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:30PM-1:00PM</h4>");
            }
          }
          if($time11){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time11'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:00PM-1:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:00PM-1:30PM</h4>");
            }
          }
          if($time12){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time12'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:30PM-2:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:30PM-2:00PM</h4>");
            }
          }
          if($time13){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time13'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:00PM-2:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:00PM-2:30PM</h4>");
            }
          }
          if($time14){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time14'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:30PM-3:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:30PM-3:00PM</h4>");
            }
          }
          if($time15){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time15'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:00PM-3:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:00PM-3:30PM</h4>");
            }
          }
          if($time16){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time16'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:30PM-4:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:30PM-4:00PM</h4>");
            }
          }
          if($time17){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time17'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 4:00PM-4:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 4:00PM-4:30PM</h4>");
            }
          }
        }
        if($repeat4){
          if($time1){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time1'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 8:00AM-8:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 8:00AM-8:30AM</h4>");
            }
          }
          if($time2){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time2'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 8:30AM-9:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 8:30AM-9:00AM</h4>");
            }
          }
          if($time3){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time3'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:00AM-9:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:00AM-9:30AM</h4>");
            }
          }
          if($time4){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time4'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:30AM-10:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:30AM-10:00AM</h4>");
            }
          }
          if($time5){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time5'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:00AM-10:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:00AM-10:30AM</h4>");
            }
          }
          if($time6){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time6'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:30AM-11:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:30AM-11:00AM</h4>");
            }
          }
          if($time7){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time7'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:00AM-11:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:00AM-11:30AM</h4>");
            }
          }
          if($time8){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time8'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:30AM-12:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:30AM-12:00PM</h4>");
            }
          }
          if($time9){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time9'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:00PM-12:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:00PM-12:30PM</h4>");
            }
          }
          if($time10){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time10'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:30PM-1:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:30PM-1:00PM</h4>");
            }
          }
          if($time11){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time11'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:00PM-1:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:00PM-1:30PM</h4>");
            }
          }
          if($time12){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time12'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:30PM-2:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:30PM-2:00PM</h4>");
            }
          }
          if($time13){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time13'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:00PM-2:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:00PM-2:30PM</h4>");
            }
          }
          if($time14){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time14'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:30PM-3:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:30PM-3:00PM</h4>");
            }
          }
          if($time15){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time15'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:00PM-3:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:00PM-3:30PM</h4>");
            }
          }
          if($time16){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time16'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:30PM-4:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:30PM-4:00PM</h4>");
            }
          }
          if($time17){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time17'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 4:00PM-4:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 4:00PM-4:30PM</h4>");
            }
          }
        }
        if($repeat5){
          if($time1){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time1'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 8:00AM-8:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 8:00AM-8:30AM</h4>");
            }
          }
          if($time2){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time2'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 8:30AM-9:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 8:30AM-9:00AM</h4>");
            }
          }
          if($time3){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time3'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:00AM-9:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:00AM-9:30AM</h4>");
            }
          }
          if($time4){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time4'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 9:30AM-10:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 9:30AM-10:00AM</h4>");
            }
          }
          if($time5){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time5'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:00AM-10:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:00AM-10:30AM</h4>");
            }
          }
          if($time6){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time6'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 10:30AM-11:00AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 10:30AM-11:00AM</h4>");
            }
          }
          if($time7){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time7'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:00AM-11:30AM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:00AM-11:30AM</h4>");
            }
          }
          if($time8){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time8'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 11:30AM-12:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 11:30AM-12:00PM</h4>");
            }
          }
          if($time9){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time9'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:00PM-12:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:00PM-12:30PM</h4>");
            }
          }
          if($time10){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time10'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 12:30PM-1:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 12:30PM-1:00PM</h4>");
            }
          }
          if($time11){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time11'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:00PM-1:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:00PM-1:30PM</h4>");
            }
          }
          if($time12){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time12'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 1:30PM-2:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 1:30PM-2:00PM</h4>");
            }
          }
          if($time13){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time13'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:00PM-2:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:00PM-2:30PM</h4>");
            }
          }
          if($time14){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time14'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 2:30PM-3:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 2:30PM-3:00PM</h4>");
            }
          }
          if($time15){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time15'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:00PM-3:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:00PM-3:30PM</h4>");
            }
          }
          if($time16){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time16'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 3:30PM-4:00PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 3:30PM-4:00PM</h4>");
            }
          }
          if($time17){
            $sql = "SELECT * FROM `Proj2Appointments` WHERE `Time` = '$date . ' ' . $time17'";
            $rs = $Common->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_row($rs);
            if($row){
              echo("<h3>Appointment already exists!</h3><br>");
              echo("<h4>Time: $date 4:00PM-4:30PM</h4><br>");
            }
            else{
              echo("<h4>Time: $date 4:00PM-4:30PM</h4>");
            }
          }
        }
			}
		?>
		<form method="link" action="AdminUI.php">
			<input type="submit" name="next" class="button large go" value="Cancel">
		</form>
	</div>
	</div>
	</div>
	</form>
  </body>
  
</html>
