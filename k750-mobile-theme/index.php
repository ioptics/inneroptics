<?php
  include 'config.php';
  
  $time = time();
  $startTime = mktime(0, 0, 0, date('m', $time),date('d', $time),date('Y', $time));
  //$startTime = strtotime("-1 day");
  $timeis = date("F j, Y, g:i a", $startTime);
  $query = "SELECT * FROM $filenameTable WHERE filetype = '2' ";
  $result = mysql_query($query);
  $x=0;
  while($file = mysql_fetch_array($result)) {
  
    $query = "SELECT UNIX_TIMESTAMP(time) as epoch_time FROM $logTable WHERE lid = ".$file['fid']."";
    $times = mysql_query($query);
    
    $dlsToday=0;
    while($row = mysql_fetch_array($times)) {
      $unix_timestamp = $row['epoch_time'];
      if ($unix_timestamp > $startTime) {
        $dlsToday++;
      }
    }
    $totalDlsToday = $totalDlsToday + $dlsToday;
    
    $query = "SELECT COUNT(*) FROM $logTable WHERE lid = ".$file['fid']."";
    $downloads = mysql_query($query);
    
    $query = "SELECT filename FROM $filenameTable WHERE fid = ".$file['fid']."";
    $name = mysql_query($query);
    
    while($row = mysql_fetch_array($downloads)) {
      $log[$x][1] = mysql_result($name, 0);
      $log[$x][2] = $row['COUNT(*)'];
      $log[$x][3] = $dlsToday;
      $totalDls = $totalDls + $log[$x][2];
      $x++;
    }
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title>K750/K600/W800/W700 Themes</title>
  <link rel="stylesheet" href="css/k750style.css" media="screen" />
  </head>
  <body>
    <div id="column">
      <div id="header">
        <h1><a href="http://www.inneroptics.com">Inneroptics</a></h1>
      </div>
      <div class="top-ads" style="padding:10px;text-align:center;background:#fff;">
        <script type="text/javascript"><!--
        google_ad_client = "pub-5266170966942207";
        google_alternate_color = "624D0C";
        google_ad_width = 728;
        google_ad_height = 15;
        google_ad_format = "728x15_0ads_al";
        google_ad_channel ="5981293786";
        google_color_border = "FFFFFF";
        google_color_bg = "FFFFFF";
        google_color_link = "624D0C";
        google_color_text = "000000";
        google_color_url = "624D0C";
        //--></script>
        <script type="text/javascript"
          src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
			</div>
      <div class="box" id="intro">
        <h2>K750/K600/W800/W700 Mobile Themes</h2>
        <table class="resultBox">
        <th>Theme</th>
        <th>Downloads</th>
        <th>Today</th>
        <?php
          $x=0;
          foreach($log as $counter) {
            $left = substr($log[$x][1], 0, strpos($log[$x][1], '.'));
            $left = ucfirst($left);
            print '<tr><td>' .$left. '</td>';
            print '<td>' .$log[$x][2]. '</td>';
            print '<td>' .$log[$x][3]. '</td></tr>';
            $x++;
          }
          print '<tr><td></td>';
          print '<td class="total">' .$totalDls. '</td>';
          print '<td class="total">' .$totalDlsToday. '</td></tr>';
        ?>
        </table>
        <p>Welcome to our Sony Ericsson K750/K600/W800/W700 mobile or cellphone theme page. You may have visited 
        our other theme pages for the K800 linked on this page. We decided that it would be worth while 
        porting our themes over to these phones to see what kind of response we get, we hope you like them. 
        Unfortunately we cannot test our themes on any phone but the K750, if you have problems 
        <a href="http://www.inneroptics.com/contact-us">contact</a> us and tell us about it.</p>
        
        <p><a href="http://www.inneroptics.com">We</a> own K800's and K750's, we couldn't find many themes that we 
        thought were good, so we decided to make some ourselves. They are totally free, if 
        they become popular we'll make more, so please <a href="http://www.inneroptics.com/contact-us">tell us</a> 
        what you think or what you would like. You never know what you might get!</p>
        <div class="clear"></div>
      </div>
      <div class="box">
        <h2><a href="download.php?k750abstraction.zip">Abstraction</a></h2>
        <p><img src="images/abstraction/desktopThumb.jpg" class="leftImage" />Abstraction is our original theme, 
        the one that spawned them all. Abstract and colourful but not too bright, Abstraction is a warm and 
        attractive theme.</p>
        <div class="imageBox">
          <img src="images/abstraction/desktop.jpg" />
          <img src="images/abstraction/menu.jpg" />
          <img src="images/abstraction/list.jpg" />
        </div>
        <p>Click <a href="download.php?k750abstraction.zip">here</a> to download</p>
      </div>
      <div class="box">
        <h2><a href="download.php?k750aqua.zip">Aqua</a></h2>
        <p><img src="images/aqua/desktopThumb.jpg" class="leftImage" />Aqua is one of our most popular themes, 
        bright, punchy and who can resist blue?</p>
        <div class="imageBox">
          <img src="images/aqua/desktop.jpg" />
          <img src="images/aqua/menu.jpg" />
          <img src="images/aqua/list.jpg" />
        </div>
        <p>Click <a href="download.php?k750aqua.zip">here</a> to download</p>
      </div>
      <div class="bottomBox">
        <div class="message">
          <p>We have had a massively positive response so far, thousands of page hits and hundreds of downloads, 
          keep <a href="http://www.inneroptics.com/contact-us">contacting</a> us and telling us what 
          you think.</p>
          <p><small>Themes developed in Sony Ericsson Themes Creator 
          Version 2.53, Copyright (C) Sony Ericsson Mobile Communications AB</small></p>
        </div>
        <div class="linkBox">
          <h3>Other Links</h3>
          <ul id="otherLinks">  
           <li><a href="http://www.inneroptics.com/k800-mobile-theme">K800/K790/W850 Themes</a></li>
           <li><a href="http://eseth.net/">eseth.net</a></li>
           <li><a href="http://www.inneroptics.com/">Inneroptics</a></li>
         </ul>
        </div>
        <div class="clear"></div>
      </div>
        <script type="text/javascript"><!--
        google_ad_client = "pub-5266170966942207";
        google_alternate_color = "FCFAF1";
        google_ad_width = 728;
        google_ad_height = 90;
        google_ad_format = "728x90_as";
        google_ad_type = "text";
        google_ad_channel ="0014088540";
        google_color_border = "FFFFFF";
        google_color_bg = "FFFFFF";
        google_color_link = "624D0C";
        google_color_text = "000000";
        google_color_url = "624D0C";
        //--></script>
        <script type="text/javascript"
          src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
      </div>
    </div>
    <div id="footer">Copyright <a href="http://www.inneroptics.com">Inneroptics</a> &copy;2006</div>    
  </body>
</html>
<?php

#define("_BBC_PAGE_NAME", "K750-mobile-theme");
#define("_BBCLONE_DIR", "../bbclone/");
#define("COUNTER", _BBCLONE_DIR."mark_page.php");
#if (is_readable(COUNTER)) include_once(COUNTER);

?>
