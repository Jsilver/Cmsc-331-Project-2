<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Schedule Group Appointment</title>
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
		<h1>Schedule Group Appointments</h1>
        <form action="ConfirmGroupApp.html" method="post" name="Confirm">
	    <div class="field">
	      <label for="Date">Date</label>
	      <input id="Date" type="date" name="Date" required autofocus>
	    </div>

	    <div class="field">
	      <label for="Time">Time</label>
	      <select id="Time" name="Time">
		<option>9:00AM-9:30AM</option>
		<option>9:30AM-10:00AM</option>
		<option>10:00AM-10:30AM</option>
		<option>10:30AM-11:00AM</option>
		<option>11:00AM-11:30AM</option>
		<option>11:30AM-12:00PM</option>
		<option>12:00PM-12:30PM</option>
		<option>12:30PM-1:00PM</option>
		<option>1:00PM-1:30PM</option>
		<option>1:30PM-2:00PM</option>
		<option>2:00PM-2:30PM</option>
		<option>2:30PM-3:00PM</option>
		<option>3:00PM-3:30PM</option>
		<option>3:30PM-4:00PM</option>
		</select>
	    </div>

        <div class="field">
            <label for="Repeat">Repeat Weekly</label>
            <input type="checkbox" name="Repeat" value="Monday">Monday
            <input type="checkbox" name="Repeat" value="Tuesday">Tuesday
            <input type="checkbox" name="Repeat" value="Wednesday">Wednesday
            <input type="checkbox" name="Repeat" value="Thursday">Thursday
            <input type="checkbox" name="Repeat" value="Friday">Friday
        </div>

        <div class="field">
        	<h3>Repeat for
        	<input type="number" id="stepper" name="stepper" min="0" max="4" value="0" />
		weeks</h3>
        </div>

	<div class="field">
        	<h3>Student limit: 
        	<input type="number" id="stepper1" name="stepper1" min="1" max="10" value="10" /></h3>
        </div>

	<div class="nextButton">
		<input type="submit" name="next" class="button large go" value="Next">
	</div>
	</div>
	</form>
  </body>
  
</html>
