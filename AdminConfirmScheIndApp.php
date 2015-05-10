<?php
session_start();
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Schedule Individual Appointment</title>
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
      margin-left: 10px;
      font-size: 16px; 
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
	  font-size: 14px;	  
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
			$date = $_POST["Date"];
			$times = $_POST["time"];
			$majors = $_POST["major"];
			$repeatDays = $_POST["repeat"];
			$repeatWeek = $_POST["stepper"];
			
			//one week with given start date (Ex. Thur - Wed) ['Thursday']=>[########]
			$d0 = $date;
			$d1 = '+1 day ' . $date;
			$d2 = '+2 day ' . $date;
			$d3 = '+3 day ' . $date;
			$d4 = '+4 day ' . $date;
			$d5 = '+5 day ' . $date;
			$d6 = '+6 day ' . $date;
			$oneweek = array(date('l', strtotime($d0)) => strtotime($d0),
							date('l', strtotime($d1)) => strtotime($d1),
							date('l', strtotime($d2)) => strtotime($d2),
							date('l', strtotime($d3)) => strtotime($d3),
							date('l', strtotime($d4)) => strtotime($d4),
							date('l', strtotime($d5)) => strtotime($d5),
							date('l', strtotime($d6)) => strtotime($d6)); 
			
			//initialize the first wk
			$dates = array();
			array_push($dates, date('Y-m-d',strtotime($date)));
			if(!empty($repeatDays)){
				foreach($repeatDays as $day){
					if($day != date("l", strtotime($date))){
						array_push($dates, date('Y-m-d',$oneweek[$day]));
					}
				}
			}
			//repeat weeks based on initial wk
			$countDates = count($dates);
			for($i=0; $i < $repeatWeek; $i++){
				for($j=0; $j < $countDates; $j++){
					$newDateStr = "+1 week " . $dates[$j + ($i * $countDates)];
					$newDate = date('Y-m-d',strtotime($newDateStr));
					array_push($dates, $newDate);
				}
			}
			
			//pair dates and times to make datetime things YYYY-MM-DD hh:mm:ss
			$datetimes = array();
			foreach($dates as $aDate){
				foreach($times as $time){
					$newDatetime = $aDate . " " . $time;
					array_push($datetimes, $newDatetime);
				}
			}
			
			//major stuff
			$majorDB = "";
			$majorPrint = "All";
			if(!empty($majors)){
				$majorPrint = "";
				foreach($majors as $m){
					$majorDB .= $m . " ";
					$majorPrint .= $m . ", ";
				}
				$majorPrint = substr($majorPrint, 0, -2);
			}
			
			//get advisor id
			$User = $_SESSION["UserN"];
			$Pass = $_SESSION["PassW"];
			$sql = "select `id` from `Proj2Advisors` where `Username` = '$User' and `Password` = '$Pass'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			$row = mysql_fetch_row($rs);
			$id = $row[0];
			
			//make sure app doesn't exist
			//insert new app to DB
			//print app
			foreach($datetimes as $dt){
				$sql = "SELECT * from `Proj2Appointments` where `Time` = '$dt' and `AdvisorID` = '$id'";
				$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
				$row = mysql_fetch_row($rs);
				echo date('l, F d, Y g:i A', strtotime($dt)), " <br> Majors: ", $majorPrint;
				if($row){
					echo "<br><span style='color:red'>!!</span>";
				}
				else{
					$sql = "insert into Proj2Appointments (`Time`, `AdvisorID`, `Major`, `Max`) values ('$dt', '$id', '$majorDB',1)";
					$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
				}
				echo "<br><br>";
			}
		?>
		<br>
		<form method="link" action="AdminUI.php">
			<input type="submit" name="next" class="button large go" value="Return to Home">
		</form>
	</div>
	<div class="bottom">
		<p><span style="color:red">!!</span> indicates that this appointment already exists. A repeat appointment was not made.</p>
	</div>
	</div>
	</div>
	</form>
  </body>
  
</html>
