<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <style type="text/css">
      html{ 
      background-color: #f5ca5c; 
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
      margin: 120px auto 0; 
      padding: 20px 20px 20px; 
      position: relative; 
      width: 1200px; 
      -webkit-border-radius: 8px; 
      -moz-border-radius: 8px; 
      border-radius: 8px; 
      }
      
      h1{ 
      font-family: "Helvetica Neue", Arial, Helvetica, sans-serif; 
      font-size: 28px; 
      line-height: 32px; 
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
      margin: 0;
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
      }
      
      .button.go {
      background-color: #66AA44;
      color: #FFF;
      }
      
      .button.go:hover {
      background-color: #70B74E;
      color: #FFF;
      }
      
      .button.stop {
      background-color: #CC4444;
      color: #FFF;
      }
      
      .button.stop:hover {
      background-color: #d55;
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

      @media screen and (max-width: 767px){
      html, bodyq { background-color: #fff; }
      #login { border-radius: 0; margin: 60px 0 0; width: 94%; padding: 3%; border-top: 1px solid #ddd; }
      input[type="text"],input[type="password"], textarea { width: 96%; padding: 2% 2%; }
      .button-item { margin: 8px 8px 12px; }
      }
      
    </style>
  </head>
  <body>
    <div id="login" >
      <div id="form">
        <div class="top">
	  <?php
	     $Advisor = $_POST['counselor'];
             $user = $_POST['user'];
	     $id = $_POST['id'];
	     $major = $_POST['major'];
      	     $date = $_POST['date'];

             echo("<h1>Available Appointments for $Advisor on $date:</h1>");
	     echo("<br>");
	     include('CommonMethods.php');
	     $debug = false;
	     $Common = new CommonMethods($debug);
	     
	     $sql = "SELECT `9:00-9:30`, `9:30-10:00`, `10:00-10:30`, `10:30-11:00`, `11:00-11:30`, 
                     `11:30-12:00`, `12:00-12:30`, `12:30-1:00`, `1:00-1:30`, `1:30-2:00`, `2:00-2:30`,   
                     `2:30-3:00`, `3:00-3:30`, `3:30-4:00` 
                     FROM `$date Advising Appointments` 
                     WHERE `Name` = '$Advisor'";
	     
	     $rs = $Common->executeQuery($sql, "Advising Appointments");
	  
	  $count = 0;
	  
	  $appts = array("9:00-9:30", "9:30-10:00", "10:00-10:30", "10:30-11:00", "11:00-11:30", "11:30-12:00",
	  "12:00-12:30", "12:30-1:00", "1:00-1:30", "1:30-2:00", "2:00-2:30", "2:30-3:00", 
	  "3:00-3:30", "3:30-4:00");
	  
	  while($row = mysql_fetch_row($rs)){
		echo("<form action=\"DatabaseMgmt\" method=\"post\" name=\"upass\">");
		foreach($row as $element){
		  if(strpos($Advisor, 'Advising') > 0){
		    if(str_word_count($element) == 10)
		      echo("<b>Not Available<b><br>");
		    else{
		      echo("<input type=\"radio\" name=\"appt\" value=\"$appts[$count]\">");
		      echo("<b>$appts[$count]: " . str_word_count($element) . " student(s) currently in group</b><br>");
		    }
		  }
		  else{
		    if($element != '0')
		      echo("<b>Not Available<b><br>");
		    else
		      echo("<input type=\"radio\" name=\"appt\" value=\"$appts[$count]\"><b>$appts[$count]</b><br>");
		  }
		  $count = $count + 1;
		}
		echo("<input type=\"hidden\" name=\"date\" value=\"$date\">");
		echo("<input type=\"hidden\" name=\"user\" value=\"$user\">");
		echo("<input type=\"hidden\" name=\"id\" value=\"$id\">");
		echo("<input type=\"hidden\" name=\"major\" value=\"$major\">");
		echo("<input type=\"hidden\" name=\"Advisor\" value=\"$Advisor\">");
	  }
	  echo("<br><input type=\"submit\" class=\"button go large\" name=\"send\" value=\"Submit\"><br>");
	  echo("</form>");
	  
	  ?>
  </body>
</html>
