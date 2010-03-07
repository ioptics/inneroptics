<?php
  include 'config.php';
  
  $time = time();
  $startTime = mktime(0, 0, 0, date('m', $time),date('d', $time),date('Y', $time));
  //$startTime = strtotime("-1 day");
  $timeis = date("F j, Y, g:i a", $startTime);
  $query = "SELECT * FROM $filenameTable WHERE filetype='1' ";
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
    
    $log = array();
    
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
  <meta name="keywords" content="Download,Sony,Ericsson,Sony Ericsson,K790,K800,K810,W850,W830,mobile,cellphone,theme,themes,free" />
  <meta name="description" content="Download Sony Ericsson K790, K800, K810, W850, W830 mobile or cellphone themes for free" />
  <title>Free Sony Ericsson Themes - K790/K800/K810/W850/W830</title>
  <link rel="stylesheet" href="css/k800style.css" media="screen" />
  </head>
  <body>
    <div id="column">
      <div id="header">
      <h1><a href="http://www.inneroptics.com" title="Visit the Inneroptics website">Inneroptics</a></h1>
      <!-- Search Google -->
      <center>
      <form method="get" action="http://www.google.co.uk/custom" target="google_window">
      <table bgcolor="#ffffff">
      <tr><td nowrap="nowrap" valign="top" align="left" height="32">
      
      <br/>
      <label for="sbi">Find themes:</label>
      <input type="text" name="q" size="30" maxlength="255" value="" id="sbi"></input>
      <label for="sbb" style="display: none">Submit search form</label>
      <input type="submit" name="sa" value="Google Search" id="sbb"></input>
      <input type="hidden" name="client" value="pub-5266170966942207"></input>
      <input type="hidden" name="forid" value="1"></input>
      <input type="hidden" name="channel" value="0835563940"></input>
      <input type="hidden" name="ie" value="ISO-8859-1"></input>
      <input type="hidden" name="oe" value="ISO-8859-1"></input>
      <input type="hidden" name="flav" value="0000"></input>
      <input type="hidden" name="sig" value="b-l3qCLx0EAsW8B7"></input>
      <input type="hidden" name="cof" value="GALT:#0C2C62;GL:1;DIV:#ffffff;VLC:0C2C62;AH:center;BGC:F1FAFC;LBGC:336699;ALC:0C2C62;LC:0C2C62;T:000000;GFNT:0C2C62;GIMP:0C2C62;FORID:1"></input>
      <input type="hidden" name="hl" value="en"></input>
      </td></tr></table>
      </form>
      </center>
      <!-- Search Google -->
      </div>
      <div class="top-ads" style="padding:10px;text-align:center;background:#fff;">
      	<script type="text/javascript"><!--
				google_ad_client = "pub-5266170966942207";
				google_alternate_color = "000000";
				google_ad_width = 728;
				google_ad_height = 15;
				google_ad_format = "728x15_0ads_al";
				google_ad_channel ="7836709352";
				google_color_border = "FFFFFF";
				google_color_bg = "FFFFFF";
				google_color_link = "0C2C62";
				google_color_text = "000000";
				google_color_url = "008000";
				//--></script>
				<script type="text/javascript"
				  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			</div>
      <div class="box" id="intro">
        <h2>Free Mobile Themes - K790/K800/K810/W850/W830</h2>
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
        <p>Welcome to our free Sony Ericsson K790, K800, K810, W850, W830 mobile or cellphone theme page, all the themes 
        you will find on this page are compatible with these phones and completely free. If you want themes 
        for the K750, K600, W800, W700, we have begun porting our themes to these phones, you can find the link 
        on this page.</p>
        <p>Regular visitors will notice 
        that we used to only state 'K800', but we have found that these themes are also compatible with 
        the W850, W830 and of course the K790 and new K810. Unfortunately we cannot test them on these other phones since 
        we don't own any, if you have problems <a href="http://www.inneroptics.com/contact-us" title="Contact Inneroptics">contact</a> us 
        and tell us about it.</p>
        
        <p><a href="http://www.inneroptics.com" title="Visit the Inneroptics website">We</a> own K800's and couldn't find many themes that we 
        thought were good, so we decided to make some ourselves. They are totally free, if 
        they become popular we'll make more, so please <a href="http://www.inneroptics.com/contact-us" title="Contact Inneroptics">tell us</a> 
        what you think or what you would like. You never know what you might get!</p>
        <div class="clear"></div>
      </div>
      <div class="box">
        <h2><a href="download.php?abstraction.zip" title="Download Abstraction for the Sony Ericsson K790, K800, K810, W850, W830 for free">Abstraction</a></h2>
        <p><img src="images/abstraction/desktopThumb.jpg" alt="Abstraction Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail"  title="Abstraction Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail" class="leftImage" />Abstraction is our original theme, 
        the first of many themes. Abstract and colourful but not too bright, Abstraction is a warm and 
        attractive theme.</p>
        <p>Update: Now at version 1.04, borders changed to orange and text colour fixed.</p>
        <div class="imageBox">
          <img src="images/abstraction/desktop.jpg" alt="Abstraction Sony Ericsson K790, K800, K810, W850, W830 desktop" title="Abstraction Sony Ericsson K790, K800, K810, W850, W830 desktop" />
          <img src="images/abstraction/menu.jpg" alt="Abstraction Sony Ericsson K790, K800, K810, W850, W830 menu" title="Abstraction Sony Ericsson K790, K800, K810, W850, W830 menu" />
          <img src="images/abstraction/list.jpg" alt="Abstraction Sony Ericsson K790, K800, K810, W850, W830 list" title="Abstraction Sony Ericsson K790, K800, K810, W850, W830 list"/>
        </div>
        <p>Click <a href="download.php?abstraction.zip" title="Download Abstraction for the Sony Ericsson K790, K800, K810, W850, W830 for free">here</a> to download</p>
      </div>
      <div class="box">
        <h2><a href="download.php?puncture.zip" title="Download Puncture for the Sony Ericsson K790, K800, K810, W850, W830 for free">Puncture</a></h2>
        <p><img src="images/puncture/desktopThumb.jpg" alt="Puncture Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail"  title="Puncture Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail" class="leftImage" />The first thing people asked for 
        after they saw Abstraction, was a more subtle theme. Puncture uses blacks and greys that complement 
        the body of the phone for a slightly more corporate feel compared to other themes.</p>
        <p>Update: Now at version 1.05, made a change to the background.</p>
        <div class="imageBox">
          <img src="images/puncture/desktop.jpg" alt="Puncture Sony Ericsson K790, K800, K810, W850, W830 desktop" title="Puncture Sony Ericsson K790, K800, K810, W850, W830 desktop" />
          <img src="images/puncture/menu.jpg" alt="Puncture Sony Ericsson K790, K800, K810, W850, W830 menu" title="Puncture Sony Ericsson K790, K800, K810, W850, W830 menu" />
          <img src="images/puncture/list.jpg" alt="Puncture Sony Ericsson K790, K800, K810, W850, W830 list" title="Puncture Sony Ericsson K790, K800, K810, W850, W830 list" />
        </div>
        <p>Click <a href="download.php?puncture.zip" title="Download Puncture for the Sony Ericsson K790, K800, K810, W850, W830 for free">here</a> to download</p>
        <div class="ads">
          <script type="text/javascript"><!--
          google_ad_client = "pub-5266170966942207";
          google_alternate_color = "f1fafc";
          google_ad_width = 728;
          google_ad_height = 90;
          google_ad_format = "728x90_as";
          google_ad_type = "text";
          google_ad_channel ="7034453324";
          google_color_border = "F1FAFC";
          google_color_bg = "F1FAFC";
          google_color_link = "0C2C62";
          google_color_text = "000000";
          google_color_url = "0C2C62";
          //--></script>
          <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
          </script>
        </div>
      </div>
      <div class="box">
        <h2><a href="download.php?aqua.zip" title="Download Aqua for the Sony Ericsson K790, K800, K810, W850, W830 for free">Aqua</a></h2>
        <p><img src="images/aqua/desktopThumb.jpg" alt="Aqua Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail" title="Aqua Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail" class="leftImage" />Abstraction had been the most popular theme 
        until now, so we decided to take it up a notch and produce Aqua, a theme that is powerful, fun and stylish. 
        If you want that clean oceanic feel, this is the theme for you.</p>
        <p>Update: Now at version 1.02, more text colour fixed.</p>
        <div class="imageBox">
          <img src="images/aqua/desktop.jpg" alt="Aqua Sony Ericsson K790, K800, K810, W850, W830 desktop" title="Aqua Sony Ericsson K790, K800, K810, W850, W830 desktop" />
          <img src="images/aqua/menu.jpg" alt="Aqua Sony Ericsson K790, K800, K810, W850, W830 menu" title="Aqua Sony Ericsson K790, K800, K810, W850, W830 menu" />
          <img src="images/aqua/list.jpg" alt="Aqua Sony Ericsson K790, K800, K810, W850, W830 list" title="Aqua Sony Ericsson K790, K800, K810, W850, W830 list" />
        </div>
        <p>Click <a href="download.php?aqua.zip" title="Download Aqua for the Sony Ericsson K790, K800, K810, W850, W830 for free">here</a> to download</p>
      </div>
      <div class="box">
        <h2><a href="download.php?zest.zip" title="Download Zest for the Sony Ericsson K790, K800, K810, W850, W830 for free">Zest</a></h2>
        <p><img src="images/zest/desktopThumb.jpg" alt="Zest Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail" title="Zest Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail" class="leftImage" />A fresh new theme, following on from where Aqua 
        left off. Zest is a mixture of our Aqua and Abstraction themes wrapped in a zingy green wrapper.</p>
        <p>Update: Now at version 1.01, text colour fixed.</p>
        <div class="imageBox">
          <img src="images/zest/desktop.jpg" alt="Zest Sony Ericsson K790, K800, K810, W850, W830 desktop" title="Zest Sony Ericsson K790, K800, K810, W850, W830 desktop" />
          <img src="images/zest/menu.jpg" alt="Zest Sony Ericsson K790, K800, K810, W850, W830 menu" title="Zest Sony Ericsson K790, K800, K810, W850, W830 menu" />
          <img src="images/zest/list.jpg" alt="Zest Sony Ericsson K790, K800, K810, W850, W830 list" title="Zest Sony Ericsson K790, K800, K810, W850, W830 list" />
        </div>
        <p>Click <a href="download.php?zest.zip" title="Download Zest for the Sony Ericsson K790, K800, K810, W850, W830 for free">here</a> to download</p>
      </div>
      <div class="box">
        <h2><a href="download.php?tesla.zip" title="Download Tesla for the Sony Ericsson K790, K800, K810, W850, W830 for free">Tesla - Animated</a></h2>
        <p><img src="images/tesla/desktopThumb.gif" alt="Tesla Sony Ericsson K790, K800, K810, W850, W830 animated desktop thumbnail" title="Tesla Sony Ericsson K790, K800, K810, W850, W830 animated desktop thumbnail" class="leftImage" />You asked for it and here it is, our first 
        Sony Ericsson animated theme, based on your second favourite executive toy, the plasma ball (you just can't beat a good lava 
        lamp). A black and glass theme seemed like the best fit for the animation, this represents a move forward for us 
        to a new level of complexity and image detail compared to our ealrier themes, check back soon for our next theme.</p>
        <div class="imageBox">
          <img src="images/tesla/desktop.jpg" alt="Tesla Sony Ericsson K790, K800, K810, W850, W830 animated desktop" title="Tesla Sony Ericsson K790, K800, K810, W850, W830 animated desktop" />
          <img src="images/tesla/menu.jpg" alt="Tesla Sony Ericsson K790, K800, K810, W850, W830 menu" title="Tesla Sony Ericsson K790, K800, K810, W850, W830 menu" />
          <img src="images/tesla/list.jpg" alt="Tesla Sony Ericsson K790, K800, K810, W850, W830 list" title="Tesla Sony Ericsson K790, K800, K810, W850, W830 list" />
        </div>
        <p>Click <a href="download.php?tesla.zip" title="Download Tesla for the Sony Ericsson K790, K800, K810, W850, W830 for free">here</a> to download</p>
      </div>
      <div class="box">
        <h2><a href="download.php?orb.zip" title="Download Orb for the Sony Ericsson K790, K800, K810, W850, W830 for free">Orb</a></h2>
        <p><img src="images/orb/desktopThumb.jpg" alt="Orb Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail" title="Orb Sony Ericsson K790, K800, K810, W850, W830 desktop thumbnail" class="leftImage" />This is our favourite theme at the moment, 
        using everything we have learnt from previous themes, this one uses blues and oranges with a clean but 
        detailed design.</p>
        <p>Update: Now at version 1.01, text colour fixed.</p>
        <div class="imageBox">
          <img src="images/orb/desktop.jpg" alt="Orb Sony Ericsson K790, K800, K810, W850, W830 desktop" title="Orb Sony Ericsson K790, K800, K810, W850, W830 desktop" />
          <img src="images/orb/menu.jpg" alt="Orb Sony Ericsson K790, K800, K810, W850, W830 menu" title="Orb Sony Ericsson K790, K800, K810, W850, W830 menu" />
          <img src="images/orb/list.jpg" alt="Orb Sony Ericsson K790, K800, K810, W850, W830 list" title="Orb Sony Ericsson K790, K800, K810, W850, W830 list" />
        </div>
        <p>Click <a href="download.php?orb.zip" title="Download Orb for the Sony Ericsson K790, K800, K810, W850, W830 for free">here</a> to download</p>
      </div>
      <div class="box">
        <h2><a href="download.php?pool.zip" title="Download Pool for the Sony Ericsson K790, K800, K810, W850, W830 for free">Pool - Animated</a></h2>
        <p><img src="images/pool/desktopThumb.gif" alt="Pool Sony Ericsson K790, K800, K810, W850, W830 animated desktop thumbnail" title="Pool Sony Ericsson K790, K800, K810, W850, W830 animated desktop thumbnail" class="leftImage" />This theme is based on Aqua, with a few 
        changes, most important of which is the animated background. So download, then sit back, relax and 
        pretend you are on that holiday by the pool, or something.</p>
        <div class="imageBox">
          <img src="images/pool/desktop.jpg" alt="Pool Sony Ericsson K790, K800, K810, W850, W830 animated desktop" title="Pool Sony Ericsson K790, K800, K810, W850, W830 animated desktop" />
          <img src="images/pool/menu.jpg" alt="Pool Sony Ericsson K790, K800, K810, W850, W830 menu" title="Pool Sony Ericsson K790, K800, K810, W850, W830 menu" />
          <img src="images/pool/list.jpg" alt="Pool Sony Ericsson K790, K800, K810, W850, W830 list" title="Pool Sony Ericsson K790, K800, K810, W850, W830 list" />
        </div>
        <p>Click <a href="download.php?pool.zip" title="Download Pool for the Sony Ericsson K790, K800, K810, W850, W830 for free">here</a> to download</p>
      </div>
      <div class="box">
        <h2><a href="download.php?tokyo.zip" title="Download Tokyo for the Sony Ericsson K790, K800, K810, W850, W830 for free">Tokyo - Animated</a></h2>
        <p><img src="images/tokyo/desktopThumb.gif" alt="Tokyo Sony Ericsson K790, K800, K810, W850, W830 animated desktop thumbnail" title="Tokyo Sony Ericsson K790, K800, K810, W850, W830 animated desktop thumbnail" class="leftImage" />An animated theme that was inspired by 
        the kind of neon signs you may see in Japan combined with an 80's colour scheme. The colours are bold, 
        but give it a try for a while and see what you think.</p>
        <div class="imageBox">
          <img src="images/tokyo/desktop.jpg" alt="Tokyo Sony Ericsson K790, K800, K810, W850, W830 animated desktop" title="Tokyo Sony Ericsson K790, K800, K810, W850, W830 animated desktop" />
          <img src="images/tokyo/menu.jpg" alt="Tokyo Sony Ericsson K790, K800, K810, W850, W830 menu" title="Tokyo Sony Ericsson K790, K800, K810, W850, W830 menu" />
          <img src="images/tokyo/list.jpg" alt="Tokyo Sony Ericsson K790, K800, K810, W850, W830 list" title="Tokyo Sony Ericsson K790, K800, K810, W850, W830 list" />
        </div>
        <p>Click <a href="download.php?tokyo.zip" title="Download Tokyo for the Sony Ericsson K790, K800, K810, W850, W830 for free">here</a> to download</p>
      </div>
      <div class="bottomBox">
        <div class="message">
          <p>We have had a massively positive response so far, over a hundred thousand page hits and tens of thousands of downloads, 
          keep <a href="http://www.inneroptics.com/contact-us" title="Contact Inneroptics">contacting</a> us and telling us what 
          you think.</p>
          <p><small>Themes developed in Sony Ericsson Themes Creator 
          Version 3.10, Copyright (C) Sony Ericsson Mobile Communications AB</small></p>
        </div>
        <div class="linkBox">
          <h3>Other Links</h3>
          <ul id="otherLinks">
           <li><a href="http://www.inneroptics.com/k750-mobile-theme" title="Download Sony Ericsson K750, K600, W800, W700 themes">K750/K600/W800/W700 themes</a></li>  
           <li><a href="http://eseth.net/">eseth.net</a></li>
           <li><a href="http://www.sefanatics.com">SE fanatics</a></li>
           <li><a href="http://www.inneroptics.com/">Inneroptics</a></li>
         </ul>
        </div>
        <div class="clear"></div>
      </div>
      <div class="ads">
        <script type="text/javascript"><!--
        google_ad_client = "pub-5266170966942207";
        google_alternate_color = "ffffff";
        google_ad_width = 728;
        google_ad_height = 90;
        google_ad_format = "728x90_as";
        google_ad_type = "text";
        google_ad_channel ="6319737296";
        google_color_border = "FFFFFF";
        google_color_bg = "FFFFFF";
        google_color_link = "0C2C62";
        google_color_text = "000000";
        google_color_url = "0C2C62";
        //--></script>
        <script type="text/javascript"
          src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
      </div>
    </div>
    <div id="footer">Copyright <a href="http://www.inneroptics.com" title="Visit Inneroptics">Inneroptics</a> &copy;2006</div>    
  </body>
</html>
<?php
#define("_BBC_PAGE_NAME", "K800-mobile-theme");
#define("_BBCLONE_DIR", "../bbclone/");
#define("COUNTER", _BBCLONE_DIR."mark_page.php");
#if (is_readable(COUNTER)) include_once(COUNTER);
?>
