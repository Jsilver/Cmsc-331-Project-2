<?php
session_start();

$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

$sql = "select * from Proj2Students";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

while($row = mysql_fetch_row($rs)){
	if($row[3] == $_SESSION["studID"]){
		
		$_SESSION["firstN"] = $row[1];
		$_SESSION["lastN"] = $row[2];
		$_SESSION["email"] = $row[4];
		$_SESSION["major"] = $row[5];
	}
}

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Edit Student Information</title>
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
      width: 550px; 
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
	  
	  input[type=text]:disabled{
		  background-color: #DDDDDD;
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
			<h2>Edit Student Information<span class="login-create"></span></h2>
			<form action="StudProcessEdit.php" method="post" name="Edit">
			<div class="field">
				<label for="firstN">First Name</label>
				<input id="firstN" size="30" maxlength="50" type="text" name="firstN" required value=<?php echo $_SESSION["firstN"]?>>
			</div>
			<div class="field">
			  <label for="lastN">Last Name</label>
			  <input id="lastN" size="30" maxlength="50" type="text" name="lastN" required value=<?php echo $_SESSION["lastN"]?>>
			</div>
			<div class="field">
				<label for="studID">Student ID</label>
				<input id="studID" size="30" maxlength="7" type="text" pattern="[A-Za-z]{2}[0-9]{5}" title="AB12345" name="studID" disabled value=<?php echo $_SESSION["studID"]?>>
			</div>
			<div class="field">
				<label for="email">E-mail</label>
				<input id="email" size="30" maxlength="255" type="email" name="email" required value=<?php echo $_SESSION["email"]?>>
			</div>
			<div class="field">
				  <label for="major">Major</label>
				  <select id="major" name = "major">
					<option <?php if($_SESSION["major"] == 'Computer Engineering'){echo("selected");}?>>Computer Engineering</option>
					<option <?php if($_SESSION["major"] == 'Computer Science'){echo("selected");}?>>Computer Science</option>
					<option <?php if($_SESSION["major"] == 'Mechanical Engineering'){echo("selected");}?>>Mechanical Engineering</option>
					<option <?php if($_SESSION["major"] == 'Chemical Engineering '){echo("selected");}?>>Chemical Engineering</option>
					<option <?php if($_SESSION["major"] == 'Africana Studies'){echo("selected");}?>>Africana Studies</option>
					<option <?php if($_SESSION["major"] == 'American Studies'){echo("selected");}?>>American Studies</option>
					<option <?php if($_SESSION["major"] == 'Ancient Studies'){echo("selected");}?>>Ancient Studies</option>
					<option <?php if($_SESSION["major"] == 'Anthropology'){echo("selected");}?>>Anthropology</option>
					<option <?php if($_SESSION["major"] == 'Asian Studies'){echo("selected");}?>>Asian Studies</option>
					<option <?php if($_SESSION["major"] == 'Biochemistry and Molecular Biology'){echo("selected");}?>>Biochemistry and Molecular Biology</option>
					<option <?php if($_SESSION["major"] == 'Bioinformatics and Computational Biology'){echo("selected");}?>>Bioinformatics and Computational Biology</option>
					<option <?php if($_SESSION["major"] == 'Biological Sciences'){echo("selected");}?>>Biological Sciences</option>
					<option <?php if($_SESSION["major"] == 'Business Technology Administration'){echo("selected");}?>>Business Technology Administration</option>
					<option <?php if($_SESSION["major"] == 'Chemistry'){echo("selected");}?>>Chemistry</option>
					<option <?php if($_SESSION["major"] == 'Dance'){echo("selected");}?>>Dance</option>
					<option <?php if($_SESSION["major"] == 'Economics'){echo("selected");}?>>Economics</option>
					<option <?php if($_SESSION["major"] == 'Financial Economics'){echo("selected");}?>>Financial Economics</option>
					<option <?php if($_SESSION["major"] == 'Emergency Health Services'){echo("selected");}?>>Emergency Health Services</option>
					<option <?php if($_SESSION["major"] == 'English'){echo("selected");}?>>English</option>
					<option <?php if($_SESSION["major"] == 'Environmental Science and Environmental Studies'){echo("selected");}?>>Environmental Science and Environmental Studies</option>
					<option <?php if($_SESSION["major"] == 'Gender and Womens Studies'){echo("selected");}?>>Gender and Womens Studies</option>
					<option <?php if($_SESSION["major"] == 'Geography'){echo("selected");}?>>Geography</option>
					<option <?php if($_SESSION["major"] == 'Global Studies'){echo("selected");}?>>Global Studies</option>
					<option <?php if($_SESSION["major"] == 'Health Administration and Policy'){echo("selected");}?>>Health Administration and Policy</option>
					<option <?php if($_SESSION["major"] == 'History'){echo("selected");}?>>History</option>
					<option <?php if($_SESSION["major"] == 'Information Systems'){echo("selected");}?>>Information Systems</option>
					<option <?php if($_SESSION["major"] == 'Interdisciplinary Studies'){echo("selected");}?>>Interdisciplinary Studies</option>
					<option <?php if($_SESSION["major"] == 'Management of Aging Services'){echo("selected");}?>>Management of Aging Services</option>
					<option <?php if($_SESSION["major"] == 'Mathematics'){echo("selected");}?>>Mathematics</option>
					<option <?php if($_SESSION["major"] == 'Statistics'){echo("selected");}?>>Statistics</option>
					<option <?php if($_SESSION["major"] == 'Media and Communication Studies'){echo("selected");}?>>Media and Communication Studies</option>
					<option <?php if($_SESSION["major"] == 'Modern Languages, Linguistics and Intercultural Communication'){echo("selected");}?>>Modern Languages, Linguistics and Intercultural Communication</option>
					<option <?php if($_SESSION["major"] == 'Music'){echo("selected");}?>>Music</option>
					<option <?php if($_SESSION["major"] == 'Philosophy'){echo("selected");}?>>Philosophy</option>
					<option <?php if($_SESSION["major"] == 'Physics'){echo("selected");}?>>Physics</option>
					<option <?php if($_SESSION["major"] == 'Political Sciences'){echo("selected");}?>>Political Science</option>
					<option <?php if($_SESSION["major"] == 'Psychology'){echo("selected");}?>>Psychology</option>
					<option <?php if($_SESSION["major"] == 'Social Work'){echo("selected");}?>>Social Work</option>
					<option <?php if($_SESSION["major"] == 'Sociology'){echo("selected");}?>>Sociology</option>
					<option <?php if($_SESSION["major"] == 'Theatre'){echo("selected");}?>>Theatre</option>
					<option <?php if($_SESSION["major"] == 'Visual Arts'){echo("selected");}?>>Visual Arts</option>
					<option <?php if($_SESSION["major"] == 'Undecided'){echo("selected");}?>>Undecided</option>
					<option <?php if($_SESSION["major"] == 'Other'){echo("selected");}?>>Other</option>
					</select>
			</div>
			<div class="nextButton">
				<input type="submit" name="save" class="button large go" value="Save">
			</div>
			</div>
		</form>
  </body>
  
</html>
