<?php
session_start();
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
		<h1>Search Appointments</h1>
        <form action="AdminSearchResults.php" method="post" name="Confirm">
	    <div class="field">
	      <label for="Date">Date</label>
	      <input id="Date" type="date" name="Date" required autofocus>  (mm/dd/yyyy)
	    </div>

	    <div class="field">
	      <label for="time">Time</label><span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">
		<input type="checkbox" name="time" value="8:00"> 8:00am - 8:30am<br>
		<input type="checkbox" name="time" value="8:30"> 8:30am - 9:00am<br>
		<input type="checkbox" name="time" value="9:00"> 9:00am - 9:30am<br>
		<input type="checkbox" name="time" value="9:30"> 9:30am - 10:00am<br>
		<input type="checkbox" name="time" value="10:00"> 10:00am - 10:30am<br>
		<input type="checkbox" name="time" value="10:30"> 10:30am - 11:00am<br>
		<input type="checkbox" name="time" value="11:00"> 11:00am - 11:30am<br>
		<input type="checkbox" name="time" value="11:30"> 11:30am - 12:00pm<br>
		<input type="checkbox" name="time" value="12:00"> 12:00pm - 12:30pm<br>
		<input type="checkbox" name="time" value="12:30"> 12:30pm - 1:00pm<br>
		<input type="checkbox" name="time" value="13:00"> 1:00pm - 1:30pm<br>
		<input type="checkbox" name="time" value="13:30"> 1:30pm - 2:00pm<br>
		<input type="checkbox" name="time" value="14:00"> 2:00pm - 2:30pm<br>
		<input type="checkbox" name="time" value="14:30"> 2:30pm - 3:00pm<br>
		<input type="checkbox" name="time" value="15:00"> 3:00pm - 3:30pm<br>
		<input type="checkbox" name="time" value="15:30"> 3:30pm - 4:00pm<br></span>
	    </div>

	    <div class="field">
	      <label for="Advisor">Advisor</label>
	      <select id="Advisor" name="Advisor">
		<option></option>
		<option>Josh Abrams</option>
		<option>Anne Arey</option>
		<option>Emily Stephens</option>
		</select>
	    </div>

	<div class="nextButton">
			<input type="submit" name="go" class="button large go" value="Go">
	</div>
	</div>
	</form>
  </body>
  
</html>