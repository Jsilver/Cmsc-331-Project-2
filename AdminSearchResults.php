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
    <title>Search Appointments</title>
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
	  font-size: 10px;
      }

      .field label{ 
      display: block; 
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
			<p>Showing results for: </p>
			<?php
				$date = $_POST["date"];
				$times = $_POST["time"];
				$advisor = $_POST["advisor"];
				$studID = $_POST["studID"];
				$studLN = $_POST["studLN"];
				
				if($date == ''){ echo "Date: All"; }
				else{ 
					echo "Date: ",$date;
					$date = date('Y-m-d', strtotime($date));
				}
				echo "<br>";
				if(empty($times)){ echo "Time: All"; }
				else{
					$i = 0;
					echo "Time: ";
					foreach($times as $t){
						echo ++$i, ". ", date('g:i A', strtotime($t)), " ";
					}
				}
				echo "<br>";
				if($advisor == ''){ echo "Advisor: All appointments"; }
				elseif($advisor == 'I'){ echo "Advisor: All individual appointments"; }
				elseif($advisor == '0'){ echo "Advisor: All group appointments"; }
				else{
					$sql = "select * from Proj2Advisors where `id` = '$advisor'";
					$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					while($row = mysql_fetch_row($rs)){
						echo "Advisor: ", $row[1], " ", $row[2];
					}
				}
				echo"<br>";
				if($studID == '' && $studLN == ''){	echo "Student: All"; }
				else{
					echo "Student: ", $studID, " ", $studLN;
				}
				?>
				<br><br><label>
				<?php
				if(empty($times)){
					if($advisor == 'I'){
						$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `AdvisorID` != 0 and `EnrolledNum` = 0 order by `Time` ASC";
						$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					}
					else{
						$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `AdvisorID` like '%$advisor%' and `EnrolledNum` = 0 order by `Time` ASC";
						$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					}
					$row = mysql_fetch_row($rs);
					$rsA = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					if($row){
						while($row = mysql_fetch_row($rsA)){
							if($row[2] == 0){
								$advName = "Group";
							}
							else{
								$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
								$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
								$row2 = mysql_fetch_row($rs2);
								$advName = $row2[1] ." ". $row2[2];
							}
							echo "Time: ", date('l, F d, Y g:i A', strtotime($row[1])), "<br>";
							echo "Advisor: ", $advName, "<br>";
							echo "Major: ", $row[3], "<br><br>";
						}
					}
					else{ echo "No results found."; }
				}
				else{
					if($advisor == 'I'){
						foreach($times as $t){
							$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `Time` like '%$t%' and `AdvisorID` != 0 and (`EnrolledID` like '%$studID%' or `EnrolledID` like '%$studLN%') order by `Time` ASC";
							$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							$row = mysql_fetch_row($rs);
							$rsA = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							if($row){
								while($row = mysql_fetch_row($rsA)){
									if($row[2] == 0){
										$advName = "Group";
									}
									else{
										$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
										$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
										$row2 = mysql_fetch_row($rs2);
										$advName = $row2[1] ." ". $row2[2];
									}
									echo "Time: ", date('l, F d, Y g:i A', strtotime($row[1])), "<br>";
									echo "Advisor: ", $advName, "<br>";
									echo "Major: ", $row[3], "<br>";
									echo "Enrolled Students: ", $row[4], "<br>";
									echo "Number of enrolled student(s): ", $row[5], "<br>";
									echo "Maximum number of students allowed: ", $row[6], "<br><br>";
								}
							}
							else{ echo "No results found."; }
						}
					}
					else{
						foreach($times as $t){
							$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `Time` like '%$t%' and `AdvisorID` like '%$advisor%' and (`EnrolledID` like '%$studID%' or `EnrolledID` like '%$studLN%') order by `Time` ASC";
							$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							$row = mysql_fetch_row($rs);
							if($row){
								while($row = mysql_fetch_row($rs)){
									if($row[2] == 0){
										$advName = "Group";
									}
									else{
										$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
										$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
										$row2 = mysql_fetch_row($rs2);
										$advName = $row2[1] ." ". $row2[2];
									}
									echo "Time: ", date('l, F d, Y g:i A', strtotime($row[1])), "<br>";
									echo "Advisor: ", $advName, "<br>";
									echo "Major: ", $row[3], "<br>";
									echo "Enrolled Students: ", $row[4], "<br>";
									echo "Number of enrolled student(s): ", $row[5], "<br>";
									echo "Maximum number of students allowed: ", $row[6], "<br><br>";
								}
							}
							else{ echo "No results found."; }
						}
					}
				}
				?>
				</label>
		<form method="link" action="AdminUI.php" name="home">
			<input type="submit" name="next" class="button large go" value="Return to Home">
		</form>
	</div>
	</div>
	</div>
	</form>
  </body>
  
</html>
