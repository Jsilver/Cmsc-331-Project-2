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
       html, body { background-color: #fff; }
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
	   <h1>Please select from the following: </h1>
	   <?php	      
	      $Username = $_POST['name'];
	      $Password = $_POST['password'];
	      $ID = $_POST['id'];
	      $Major = $_POST['major'];
	      
	      echo("<h2>Student Username: $Username </h2>");
	      
	      echo("<form action=\"Appointments.php\" method=\"post\" name=\"upass\">");
	      echo("<b>Date: </b>");
	      echo("<select name=\"date\">");
	      echo("<option value=\"Monday\">Monday</option>");
	      echo("<option value=\"Tuesday\">Tuesday</option>");
	      echo("<option value=\"Wednesday\">Wednesday</option>");
	      echo("<option value=\"Thursday\">Thursday</option>");
	      echo("<option value=\"Friday\">Friday</option>");
	      echo("</select>");

	      echo("<h3>Group Advising</h3>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Group 1 Advising\">Group 1 Advising<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Group 2 Advising\">Group 2 Advising<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Group 3 Advising\">Group 3 Advising<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Group 4 Advising\">Group 4 Advising<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Group 5 Advising\">Group 5 Advising<br><br>");
	      
	      echo("<h3>Individual Advising</h3>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Josh Abrams\">Josh Abrams<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Anne Arey\">Anne Arey<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Emily Stephens\">Emily Stephens<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Snoop Dogg\">Snoop Dogg<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Richard Fizzle\">Richard Fizzle<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Johnathon Drizzle\">Johnathon Drizzle<br>");
	      echo("<input type=\"radio\" name=\"counselor\" value=\"Henry Chizzle\">Henry Chizzle<br><br>");
	      echo("<input type=\"hidden\" name=\"user\" value=\"$Username\">");
	      echo("<input type=\"hidden\" name=\"id\" value=\"$ID\">");
	      echo("<input type=\"hidden\" name=\"major\" value=\"$Major\">");
	      echo("<input type=\"submit\" class=\"button go large\" name=\"send\" value=\"Submit\"><br>");
	      echo("</form>");
	      ?>
   </body>
</html>
