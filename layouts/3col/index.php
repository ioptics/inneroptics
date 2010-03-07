<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Inneroptics: CSS: Layouts</title>
    <style type="text/css">
    html {
      margin:0;
      padding:0;
      background:#f3f0e6;
    }

    body {
      font-family:"Trebuchet MS", Verdana, "Lucida Sans", "Lucida Sans Unicode", Arial, Sans-Serif;
    	font-size:x-small;
    	voice-family: "\"}\"",inherit;
    	font-size:small;
    	background:#FEFAF2;
    	margin:0;
    	padding:0;
    }

    .clear {
      clear:both;
    }

    .pad {
      padding:10px;
    }

    p {
      margin:0;
      padding:10px;
    }

    #header h1 {
      margin:0;
      padding:10px;
    }

    #menu {
      width:100%;
      margin:0;
      padding:0;
      background:#B8B2A5;
      border-bottom:1px solid #65625C;
    }

    #menu ul {
      float:left;
      display:block;
      margin:0;
      padding:0;
      list-style:none;
      width:100%;
    }

    #menu li {
      float:left;
    }

    #menu a {
      font-weight:bold;
      color:#fff4e7;
      text-decoration:none;
      padding:10px 5px;
      display:block;
      font-size:100%;
      float:left;
    }

    #menu a span {
      padding:8px;
    }

    #menu a:hover {
      text-decoration:none;
      color:#fff;
      background:#d46400;
    }

    #container {
    	width:100%;
    	padding:0;
    }

    #left-container {
      width:100%;
      float:left;
      margin-right:-200px;
      background:green;

    }

    #left-container .sub {
      width:100%;
      float:right;
      margin-left:-180px;
      background:pink;
    }

    #main {
      margin:0 200px 0 180px;
      padding:10px;
      background:white;
    }

    #left {
      width:180px;
      float:left;
      clear:all;
      background:yellow;
    }

    #right {
      width:200px;
      float:right;
      background:red;
    }

    #footer {
      background:purple;
    }

    </style>

  </head>

  <body>
    <div id="header">
      <div class="pad"><h1>Inneroptics CSS Layouts <a href="http://www.inneroptics.com">Back to Inneroptics.com</a></h1></div>

      <div id="menu">
        <ul>
          <li><a href="" title="title"><span>Link</span></a></li>
          <li><a href="" title="title"><span>Link</span></a></li>
          <li><a href="" title="title"><span>Link</span></a></li>
          <li><a href="" title="title"><span>Link</span></a></li>
          <li><a href="" title="title"><span>Link</span></a></li>
        </ul>

        <div class="clear"></div>
      </div>
    </div>

    <div id="container">
      <div id="left-container">
        <div class="sub">

          <div id="main">
            <div class="pad">
              <h3>Main (1st in source)</h3>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
            </div><!-- //#main.pad -->
          </div><!-- //#main -->

        </div><!-- //#left-container.sub -->

        <div id="left">
          <div class="pad">
            <h3>Left (2nd in source)</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
          </div><!-- //#left.pad -->
        </div><!-- //#left -->
      </div><!-- //#left-container -->

      <div id="right">
        <div class="pad">
          <h3>Right (3rd in source)</h3>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
        </div><!-- //#right.pad -->
      </div><!-- //#right -->
    </div><!-- //#container -->

    <div class="clear"></div>

    <div id="footer"><p>Footer Goes Here</p></div>
  </body>
</html>
<?php
define("_BBC_PAGE_NAME", "3col layout");
define("_BBCLONE_DIR", "../../bbclone/");
define("COUNTER", _BBCLONE_DIR."mark_page.php");
if (is_readable(COUNTER)) include_once(COUNTER);
?>
