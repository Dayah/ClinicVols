<?
function list_officers_from_file($filename) {
	$contents = file($filename, FILE_IGNORE_NEW_LINES);

	foreach ($contents as $line) {
		$fields = explode("|", $line);
		$title = $fields[0];
		$name = $fields[1];
		$email = $fields[2];
		$image = $fields[3];
		$blurb = json_encode($fields[4]);

		if ($image) {
			echo "<script>blurb_images[\"$name\"] = \"$image\";</script>\n";
		}
		echo "<p>";
		if ($title)
			echo "<b>$title</b>: ";
		if ($fields[4]) {
			echo "<a href='#' onclick='show_blurb(\"$name\", \"$title\");'>$name</a>";
			echo "<script>blurbs[\"$name\"] = $blurb;</script>";
		} else {
			echo "$name";
		}
		if ($email)
			echo ", <a href='mailto:$email'>$email</a>";
		echo "</p>\n";
	}
}
?>
<html>
<head>
<title>Officers</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>.officers { font-family: Helvetica, sans-serif; font-size: 90%; } .executive p { margin-bottom: 2.5ex; } .schoolchairs p { margin-bottom: 0.3ex; margin-top: 0; }</style>
<link rel="stylesheet" href="styles.css" type="text/css" media="screen">
<script language="JavaScript" src="menu_options.js"></script>
<script language="JavaScript" src="mm_menu.js"></script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<script language="JavaScript">mmLoadMenus();</script>
<script>
var blurbs = {};
var blurb_images = {};
var show_blurb = function(name, title) {
	document.getElementById("BlurbTitle").innerHTML = title;
	document.getElementById("BlurbText").innerHTML = blurbs[name];
	if (name in blurb_images) {
		document.getElementById("BlurbImage").style.display = "block";
		document.getElementById("BlurbImage").src = "images/officers/" + blurb_images[name];
	} else
		document.getElementById("BlurbImage").style.display = "none";
	document.getElementById("BlurbContainer").style.display = "block";
	document.getElementById("Mask").style.display = "block";
	return false;
};
var close_blurb = function() {
	document.getElementById("BlurbTitle").innerHTML = "";
	document.getElementById("BlurbText").innerHTML = "";
	document.getElementById("BlurbImage").src = "";
	document.getElementById("BlurbContainer").style.display = "none";
	document.getElementById("Mask").style.display = "none";
};
</script>

<table id="Table_01" border="0" cellspacing="0" cellpadding="0">
  	<tr>
  		<td><a href="index.html"><img src="images/logo.png" alt="Logo" name="Logo" border="0"></a></td>
  		<td width="40"></td>
  		<td><img src="images/about.png" alt="About" border="0" id="About" onMouseOver="MM_showMenu(window.mm_menu_about,0,95,null,'About')" onMouseOut="MM_startTimeout();"></td>
  		<td><img src="images/schools.png" alt="Schools" border="0" id="Schools" onMouseOver="MM_showMenu(window.mm_menu_schools,0,95,null,'Schools')" onMouseOut="MM_startTimeout();"></td>
  		<td><a href="membership.html"><img src="images/apply.png" alt="Apply" border="0"></a></td>
  		<td><a href="officers.html"><img src="images/contact.png" alt="Contact" border="0"></a></td>

  	</tr>
  	<tr>
  		<td colspan="100%" align="center"><img src="images/mission_statement.png" alt="Mission Statement" border="0"></td>
  	</tr>

  	<tr>
  		<td colspan="100%" bgcolor="ffffff" style="-moz-border-radius: 15px; border-radius: 15px; padding:0.25in">
<table class="officers">
<tr><th colspan=2><span class="style62">Officers</span></th></tr>
<tr><td valign=top class="executive">
<h1>Executive Board</h1>
<? list_officers_from_file("executive.txt"); ?>
</td><td valign=top class="schoolchairs">
<h1>School Chairs</h1>
<? list_officers_from_file("schoolchairs.txt"); ?>
</td></tr>
<tr><td valign=top>
<h1>5K Committee Members</h1>
<? list_officers_from_file("5kcommittee.txt"); ?>
</td><td valign=top>
<h1>Trainers</h1>
<? list_officers_from_file("trainers.txt"); ?>
</td></tr>
</table>
    	</td>
  	</tr>
</table>

<div id="Mask" style="display: none; position: fixed; top: 0; left: 0; bottom: 0; right: 0; background-color: gray; opacity: 0.95;" onclick="close_blurb();"></div>
<div id="BlurbContainer" style="display: none; padding: 1em; position: fixed; top: 30%; left: 20%; height: 40%; width: 60%; border: thick outset; background-color: white;">
 <h1 id="BlurbTitle" style="position: absolute; top: -2em;"></h1>
 <img id="BlurbImage" style="float: left; margin-right: 1em; height: 100%" src="">
 <p style="margin-top: 0; height: 100%; overflow: scroll;" id="BlurbText"></p>
</div>
</body>
</html>
