<?php
session_start();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Student Advising Home</title>
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
		<h2>Hello 
		<?php
			echo $_SESSION["firstN"];
		?>
        </h2>
	    <div class="selections">
		<form action="StudProcessHome.php" method="post" name="Home">
	    <?php
			$debug = false;
			include('../CommonMethods.php');
			$COMMON = new Common($debug);
			
			$studExist = false;
			$canceled = false;

			$sql = "select * from Proj2Students";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

			while($row = mysql_fetch_row($rs)){
				if($row[3] == $_SESSION["studID"]){
					$studExist = true;
					if($row[7] == null){
						$canceled = true;
					}
				}
			}

			if ($studExist == false){
				echo "<button type='submit' name='selection' class='button large selection' value='Signup'>Signup for an appointment</button><br>";

				//echo "<button type='submit' name='selection' class='button large selection' value='View'>View my appointment</button><br>";
				//echo "<button type='submit' name='selection' class='button large selection' value='Reschedule'>Reschedule my appointment</button><br>";
				//echo "<button type='submit' name='selection' class='button large selection' value='Cancel'>Cancel my appointment</button><br>";
			}
			else{
				if($canceled == true){
					echo "Alert!<br>";
				}
				echo "<button type='submit' name='selection' class='button large selection' value='View'>View my appointment</button><br>";
				echo "<button type='submit' name='selection' class='button large selection' value='Reschedule'>Reschedule my appointment</button><br>";
				echo "<button type='submit' name='selection' class='button large selection' value='Cancel'>Cancel my appointment</button><br>";
			}
			echo "<button type='submit' name='selection' class='button large selection' value='Edit'>Edit student information</button><br>";
		?>
		</form>
        </div>
		<form action="Logout.php" method="post" name="Logout">
	    <div class="logoutButton">
			<input type="submit" name="logout" class="button large go" value="Logout">
	    </div>
		</div>
		</form>
  </body>
</html>