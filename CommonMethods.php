<?php

class CommonMethods{
  var $conn;
  var $debug;

  function CommonMethods($debug){
    $this->debug = $debug;
    $result = $this->connect("jsuon1");
    return $result;
  }

  function connect($database){
    $conn = mysql_connect("studentdb.gl.umbc.edu", "jsuon1", "jsuon1")
      or die("Could not connect to MySQL" . mysql_eror());

    $result = mysql_select_db($database, $conn)
      or die("Could not select $database database");
    $this->conn = $conn;
  }

  function executeQuery($query, $filename){
    if($this->debug == true)
      echo("$query <br/>\n");

    $result = mysql_query($query, $this->conn)
      or die("Could not execute query " . $query . " in " . $filename);

    return $result;
  }

}

?>