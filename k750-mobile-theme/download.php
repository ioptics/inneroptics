<?php
  include 'config.php';
  
  function checkDownloadRate($fid = 0) {
  	global $logTable;
	  $hostname = $_SERVER['REMOTE_ADDR'];
	  $time = time() - 3600;

	  $query = "SELECT id FROM $logTable WHERE hostname = '$hostname' AND lid = $fid AND (UNIX_TIMESTAMP(time) > '$time')";
  	$result = mysql_query($query) or die(mysql_error());
  	
	  if (mysql_num_rows($result) > 1) {
	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title>K750 Themes Download</title>
  <link rel="stylesheet" href="css/k750style.css" media="screen" />
  </head>
  <body>
  	<p>Sorry! But you can only download each theme twice in a single hour. Please come back later and try again. <a href="http://www.inneroptics.com/k750-mobile-theme">Back to Theme page</a></p>
  </body>
</html>
	
	<?php
			die();
		}
	}
  
  
  if (isset($_SERVER['QUERY_STRING'])) {
      $file = $_SERVER['QUERY_STRING'];
  }
  $file  = urldecode($file);
  if (is_file($dlDir . $file)) {
    
    $query = "SELECT COUNT(*) FROM $filenameTable WHERE filename = '$file'";
    $exists = mysql_query($query);
    $exists = mysql_result($exists, 0);
    
    if ($exists == 0) {
      $query = "INSERT INTO $filenameTable (filename,filetype) VALUES ('$file','2')";
      mysql_query($query) or die(mysql_error());

      $query = "SELECT fid FROM $filenameTable WHERE filename = '$file'";
      $fid = mysql_query($query) or die(mysql_error());
      $fid = mysql_result($fid, 0);
      
      checkDownloadRate($fid);
      
      $query = "INSERT INTO $logTable (lid, hostname) VALUES ('$fid', '". $_SERVER['REMOTE_ADDR'] ."')";
      mysql_query($query)or die(mysql_error());
    }
    else if ($exists == 1) {
      $query = "SELECT fid FROM $filenameTable WHERE filename = '$file'";
      $fid = mysql_query($query) or die(mysql_error());
      $fid = mysql_result($fid, 0);
      
      checkDownloadRate($fid);
      
      $query = "INSERT INTO $logTable (lid, hostname) VALUES ('$fid', '". $_SERVER['REMOTE_ADDR'] ."')";
      mysql_query($query)or die(mysql_error());
    }
    
    header("Refresh:0;url=". $dlDir . $file);
  }
  else {
    print 'Sorry could not find your file';
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title>K750 Themes Download</title>
  <link rel="stylesheet" href="css/k750style.css" media="screen" />
  </head>
  <body>
    <p>Thank you for downloading, click <a href="http://www.inneroptics.com/k750-mobile-theme">here</a> to return.</p>
  </body>
</html>
