<?php
  $server = "localhost";
  $username = "plambert_super";
  $password = "fZDTrD1e";
  $database = "plambert_inneroptics";
  $filenameTable = "k800_file";
  $logTable = "k800_log";
  
  mysql_connect ($server, $username, $password) or die ('I cannot connect to the database because: ' . mysql_error());
  @mysql_select_db ($database) or die( "Unable to select database");
  
  $dlDir = './themes/';
?>
