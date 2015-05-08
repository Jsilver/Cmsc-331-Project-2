<?php
session_start();
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Cancel Appointment</title>
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
      color: #000066; 
      text-decoration: none;
	  line-height: 40px;
      }

      a:hover{ 
      text-decoration: underline;
	  line-height: 40px;
      }

      #login{ 
      color: #000; 
      background-color: #fff; 
      margin: 100px auto 0; 
      padding: 20px 20px 20px; 
      position: relative; 
      width: 500px; 
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
      
      input[type="text"],input[type="email"], input[type="radio"], textarea {
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
		margin: 10px 80px;
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

      .button.selection {
        background-color: #FFFFFF;
        color: #003399;
      }
      
      .button.selection:hover {
        background-color: #99CCFF;
        color: #003399;
      }
       
      .field{ 
      margin: 8px 0; 
      }

      .field label{ 
      display: block;  
      font-size: 20px;
	  text-align: center;
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
		text-align: center;
      }
	  
	  .button-item{ 
      line-height: 32px; 
      margin: 8px 0px 12px; 
      }
       
      .button-item .button{ 
      margin-right: 4px; 
      width: 70px; 
      padding: 0 8px; 
      text-align: center; 
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
		<h1>Cancel Appointment</h1>
	    <div class="field">
	    <?php
			$firstn = $_SESSION["firstN"];
			$lastn = $_SESSION["lastN"];
			$studid = $_SESSION["studID"];
			$major = $_SESSION["major"];
			$email = $_SESSION["email"];
			
			$sql = "select * from Proj2Appointments where `EnrolledID` like '%$studid%'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			$row = mysql_fetch_row($rs);
			$oldAdvisorID = $row[2];
			$oldDatephp = strtotime($row[1]);				
				
			if($oldAdvisorID != 0){
				$sql2 = "select * from Proj2Advisors where `id` = '$oldAdvisorID'";
				$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
				$row2 = mysql_fetch_row($rs2);					
				$oldAdvisorName = $row2[1] . " " . $row2[2];
			}
			else{$oldAdvisorName = "Group";}
			
			echo "<h2>Current Appointment</h2>";
			echo "<label for='info'>";
			echo "Advisor: ", $oldAdvisorName, "<br>";
			echo "Appointment: ", date('l, F d, Y g:i A', $oldDatephp), "</label><br>";
		?>		
        </div>
	    <div class="finishButton">
			<form action = "StudProcessCancel.php" method = "post" name = "Cancel">
			<input type="submit" name="cancel" class="button large go" value="Cancel">
			<input type="submit" name="cancel" class="button large" value="Keep">
			</form>
	    </div>
		</div>
		<div class="bottom">
			<p>Click "Cancel" to cancel appointment. Click "Keep" to keep appointment.</p>
		</div>
		</form>
  </body>
</html>