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
		<?php
			$date = $_POST["date"];
			$type = $_POST["type"];
			
			$debug = false;
			include('../CommonMethods.php');
			$COMMON = new Common($debug);
      $User = $_SESSION["UserN"];

      $sql = "SELECT `id` from `Proj2Advisors` WHERE `Username` = '$User'";
      $rs = $COMMON->executeQuery($sql, "Advising Appointments");
      $row = mysql_fetch_row($rs);
      $id = $row[0];

      $sql = "SELECT `firstName`, `lastName` FROM `Proj2Advisors` WHERE `Username` = '$User'";
      $rs = $COMMON->executeQuery($sql, "Advising Appointments");
      $row = mysql_fetch_row($rs);
      $FirstName = $row[0];
      $LastName = $row[1];
		
			echo("<h2>Schedule for $date</h2>");
      $date = date('Y-m-d', strtotime($date));
			if($_POST["type"] == 'Both'){
				echo("<h3>Group Appointments:</h3>");
				$sql = "SELECT `Time`, `Major`, `EnrolledNum`, `Max` FROM `Proj2Appointments` 
				WHERE `Time` LIKE '$date%' AND `AdvisorID` = '0' ORDER BY `Time`";
        $rs = $COMMON->executeQuery($sql, "Advising Appointments");
        $row = mysql_fetch_array($rs, MYSQL_NUM); 
        if($row){
          echo("Time: $row[0] Majors Included: ");
          if($row[1]){
            echo("$row[1] <br> Number of students enrolled: $row[2] <br> Number of seats: $row[3]"); 
          }
          else{
            echo("Available to all majors <br> Number of students enrolled: $row[2] <br> Number of seats: $row[3]"); 
          }
          echo("<br><br>");
          while ($row = mysql_fetch_array($rs, MYSQL_NUM)) {
            echo("Time: $row[0] Majors Included: ");
            if($row[1]){
              echo("$row[1] <br> Number of students enrolled: $row[2] <br> Number of seats: $row[3]"); 
            }
            else{
              echo("Available to all majors <br> Number of students enrolled: $row[2] <br> Number of seats: $row[3]"); 
            }
            echo("<br><br>");
          }
        }
        else{
          echo("No results found");
          echo("<br><br>");
        }

				echo("<h3>Individual Appointments for $FirstName $LastName:</h3>");
        $sql = "SELECT `Time`, `Major`, `EnrolledID` FROM `Proj2Appointments` 
        WHERE `Time` LIKE '$date%' AND `AdvisorID` = '$id' ORDER BY `Time`";
        $rs = $COMMON->executeQuery($sql, "Advising Appointments");
        $row = mysql_fetch_array($rs, MYSQL_NUM);
        if($row){
          echo("Time: $row[0] Majors Included: "); 
          if($row[1]){
            echo("$row[1] <br> "); 
          }
          else{
            echo("Available to all majors <br> "); 
          }
          if($row[2]){
            $trdsql = "SELECT `FirstName`, `LastName` FROM `Proj2Students` WHERE `StudentID` = '$row[2]'";
            $trdrs = $COMMON->executeQuery($trdsql, "Advising Appointments");
            $trdrow = mysql_fetch_row($trdrs);
            echo("Enrolled: $trdrow[0] $trdrow[1]");
          }
          else{
            echo("Enrolled: Empty");
          }
          echo("<br><br>");
          while ($row = mysql_fetch_array($rs, MYSQL_NUM)){
            echo("Time: $row[0] Majors Included: "); 
            if($row[1]){
              echo("$row[1] <br> "); 
            }
            else{
              echo("Available to all majors <br> "); 
            }
            if($row[2]){
              $trdsql = "SELECT `FirstName`, `LastName` FROM `Proj2Students` WHERE `StudentID` = '$row[2]'";
              $trdrs = $COMMON->executeQuery($trdsql, "Advising Appointments");
              $trdrow = mysql_fetch_row($trdrs);
              echo("Enrolled: $trdrow[0] $trdrow[1]");
            }
            else{
              echo("Enrolled: Empty");
            }
            echo("<br><br>");
          }
        }
        else{
          echo("No results found");
          echo("<br><br>");
        }
			}

			elseif($_POST["type"] == 'Individual'){
        echo("<h3>Individual Appointments for $FirstName $LastName:</h3>");
        $sql = "SELECT `Time`, `Major`FROM `Proj2Appointments` 
        WHERE `Time` LIKE '$date%' AND `AdvisorID` = '$id' ORDER BY `Time`";
        $rs = $COMMON->executeQuery($sql, "Advising Appointments");
        $row = mysql_fetch_array($rs, MYSQL_NUM);
        if($row){
          echo("Time: $row[0] Majors Included: "); 
          if($row[1]){
            echo("$row[1] <br> "); 
          }
          else{
            echo("Available to all majors <br> "); 
          }
          if($row[2]){
            $trdsql = "SELECT `FirstName`, `LastName` FROM `Proj2Students` WHERE `StudentID` = '$row[2]'";
            $trdrs = $COMMON->executeQuery($trdsql, "Advising Appointments");
            $trdrow = mysql_fetch_row($trdrs);
            echo("Enrolled: $trdrow[0] $trdrow[1]");
          }
          else{
            echo("Enrolled: Empty");
          }
          echo("<br><br>");
          while ($row = mysql_fetch_array($rs, MYSQL_NUM)){
            echo("Time: $row[0] Majors Included: "); 
            if($row[1]){
              echo("$row[1] <br> "); 
            }
            else{
              echo("Available to all majors <br> "); 
            }
            if($row[2]){
              $trdsql = "SELECT `FirstName`, `LastName` FROM `Proj2Students` WHERE `StudentID` = '$row[2]'";
              $trdrs = $COMMON->executeQuery($trdsql, "Advising Appointments");
              $trdrow = mysql_fetch_row($trdrs);
              echo("Enrolled: $trdrow[0] $trdrow[1]");
            }
            else{
              echo("Enrolled: Empty");
            }
            echo("<br><br>");
          }
        }
        else{
          echo("No results found");
          echo("<br><br>");
        }
			}

			elseif($_POST["type"] == 'Group'){
				echo("<h3>Group Appointments:</h3>");
        $sql = "SELECT `Time`, `Major`, `EnrolledNum`, `Max` FROM `Proj2Appointments` 
        WHERE `Time` LIKE '$date%' AND `AdvisorID` = '0' ORDER BY `Time`";
        $rs = $COMMON->executeQuery($sql, "Advising Appointments");
        $row = mysql_fetch_array($rs, MYSQL_NUM);
        if($row){
          echo("Time: $row[0] Majors Included: ");
          if($row[1]){
            echo("$row[1] <br> Number of students enrolled: $row[2] <br> Number of seats: $row[3]"); 
          }
          else{
            echo("Available to all majors <br> Number of students enrolled: $row[2] <br> Number of seats: $row[3]"); 
          }
          echo("<br><br>");
          while ($row = mysql_fetch_array($rs, MYSQL_NUM)) {
            echo("Time: $row[0] Majors Included: ");
            if($row[1]){
              echo("$row[1] <br> Number of students enrolled: $row[2] <br> Number of seats: $row[3]"); 
            }
            else{
              echo("Available to all majors <br> Number of students enrolled: $row[2] <br> Number of seats: $row[3]"); 
            }
            echo("<br><br>");
          }
        }
        else{
          echo("No results found");
          echo("<br><br>");
        }
			}
		?>
		<form method="link" action="AdminUI.php">
			<input type="submit" name="next" class="button large go" value="Return to Home">
		</form>
	</div>
	</div>
	</div>
	</form>
  </body>
  
</html>
