<?
$filename = "schools.txt";
$delimiter = "|";
$map = array(
	0 => "school",
	1 => "street",
	2 => "city_st_zip",
	3 => "phone",
	4 => "hours",
	5 => "site",
	6 => "image"
);
$contents = file($filename, FILE_IGNORE_NEW_LINES);

foreach ($contents as $line) {
	$fields = explode($delimiter, $line);
	if (strcmp($_GET["school"], $fields[0]) == 0) {
		foreach ($map as $x=>$field)
			${$field} = $fields[$x];
	}
}

function find_officers($schoolname) {
	global $delimiter;
	$filename = "schoolchairs.txt";
	$contents = file($filename, FILE_IGNORE_NEW_LINES);

	echo "<table>\n";
	for ($key = 0; $key <= count($contents); $key++) {
	    $fields = explode($delimiter, $contents[$key]);
		if (strpos($schoolname, $fields[0]) === 0) {
			print_officer($fields);
		}
	}
	echo "</table>\n";
}

function print_officer($fields) {
	$name = $fields[1];
	$email = $fields[2];
	$image = $fields[3];
	$blurb = json_encode($fields[4]);

	echo "<tr>\n";
	if ($image) {
		echo "<script>blurb_images[\"$name\"] = \"$image\";</script>\n";
	}
	echo "<td valign='top'><p align='right' class='style94'>";
	if ($fields[4]) {
		echo "<a href='#' onclick='show_blurb(\"$name\");'>$name</a>";
		echo "<script>blurbs[\"$name\"] = $blurb;</script>";
	} else {
		echo "$name";
	}
	echo "</p></td>\n";
	echo "<td valign='top'><p class='style94'>";
	if ($email)
		echo "<a href='mailto:$email'>$email</a>";
	echo "</p></td>\n";
	echo "</tr>\n";
}
?>
<html>
<head>
<title>Clinc VOLS - Schools - <?= $school ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="styles.css" type="text/css" media="screen">
<script language="JavaScript" src="menu_options.js"></script>
<script language="JavaScript" src="mm_menu.js"></script>
<script>
var blurbs = {};
var blurb_images = {};
var show_blurb = function(name) {
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
	document.getElementById("BlurbText").innerHTML = "";
	document.getElementById("BlurbImage").src = "";
	document.getElementById("BlurbContainer").style.display = "none";
	document.getElementById("Mask").style.display = "none";
};
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<script language="JavaScript1.2">mmLoadMenus();</script>

<table id="Table_01" border="0" cellspacing="0" cellpadding="0">
  	<tr>
  		<td><a href="index.html"><img src="images/logo.png" alt="Logo" name="Logo" width="315" height="102" border="0" id="image2"></a></td>
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
  		<td colspan="100%" align="center" bgcolor="#ffffff" style="-moz-border-radius: 15px; border-radius: 15px;">

  		<br>
    		<center><span class="style62"><?= $school ?></span></center>
    		<br>

  			<div align="center">
        <table width="627" border="0" cellspacing="5">
          <tr>
            <th valign="top"><span class="style88">Address</span></th>
            <th valign="top"><span class="style88">School Hours</span></th>
            <td rowspan="2" align="center" height="200"><img src="schools/<?= $image ?>" height="200"></td>
        	</tr>
        	<tr>
        		<td valign="top" align="center">
                <p class="style94"><?= $street ?>
				<p class="style94"><?= $city_st_zip ?>
				<p class="style94"><?= $phone ?></p>
              	<p class="style94">&nbsp;</p>
              	<p class="style57"><a href="http://maps.google.com/?q=<?= $street . ", " . $city_st_zip ?>" class="style95">Google Directions</a></p>
              	</td>

            <td valign="top" align="center">
                <p><span class="style57"><?= $hours ?></span></p>
              	<p class="style57"><a href="<?= $url ?>">School Website</a></p>
            </th>

          </tr>
          <tr>
            <th valign="top" colspan="2">
            	<p align="center" class="style88">Clinic Officers</p>
            </th>
            <td>&nbsp;</td>
          </tr>
		  <table width=500><tr><td>
		  	<?= find_officers($school) ?>
		</td><td valign="top">
                <p align="center" class="style57"><span class="style85"><a href="school_schedule.php?school=<?= $school ?>"><?= $school ?> Schedule</a></span></p>
              	<p align="center"><span class="style57"><a href="request_time_slot.php?school=<?= $school ?>">Request Time Slot</a></span></p></td>
          </tr>
        </table>
      </div>
    	</td>
  	</tr>



</table>

<div id="Mask" style="display: none; position: fixed; top: 0; left: 0; bottom: 0; right: 0; background-color: gray; opacity: 0.95;" onclick="close_blurb();"></div>
<div id="BlurbContainer" style="display: none; padding: 1em; position: fixed; top: 30%; left: 20%; height: 40%; width: 60%; border: thick outset; background-color: white;">
 <img id="BlurbImage" style="float: left; margin-right: 1em; height: 100%" src="">
 <p style="margin-top: 0; height: 100%; overflow: scroll;" id="BlurbText"></p>
</body>
</html>
