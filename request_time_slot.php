<?php
$school  = "";
$id      = "invalid";
$name    = "";
$valid   = "0";						// page is invalid by default. we will check for validity later

// this page should always be accessed with a link that include ?school=xxxxxx at the end of the url

if (isset($_GET['school'])) {
	$school = $_GET["school"];
}

// $schools is an array of things.
// it contains 11 things (schools).
// each school has 3 attributes
//		1. Name
//		2. Tag needed to retrieve schedule from editgrid.com
//		3. Tag needed to retrieve time slot request from spreadsheets.google.com    (not used on this page)

// array indexes always start at 0, not 1

$schools[0] = array("Beaumont", "Beaumont_Schedule", "dHEtS0pKb1FxNVluMUx3ajhJczl5cnc6MA"); 
$schools[1] = array("Bonny Kate", "Bonny Kate_Schedule", "dHJqOVhzZW9LWWtvVXdaMnJNdzA1cnc6MA"); 
$schools[2] = array("Dogwood", "Dogwood_Schedule", "dEpwZW1PWDQ0cWFobmFtR2NHWUFsV3c6MA"); 
$schools[3] = array("East Knox", "East Knox_Schedule", "dENZbVBOcmVxXzJYdFl0WUk1TUxib1E6MA"); 
$schools[4] = array("Green", "Green_Schedule", "dGZnaDF1bk1kSEstYi1VWVFqZ1dabEE6MA");
$schools[5] = array("Inskip", "Inskip_Schedule", "dFZIc0gtYTl0MTV3LV80MV85djN4SVE6MA"); 
$schools[6] = array("Lonsdale", "Lonsdale_Schedule", "dFZhaTNaY1Nnay1wdS1jLUQwQjVlbVE6MA"); 
$schools[7] = array("Mount Olive", "Mount Olive_Schedule", "dHBla2VxSGxGdjY3VXl0NjVNdk5Oc2c6MA"); 
$schools[8] = array("Pond Gap", "Pond Gap_Schedule", "dHBTUW56Rml2Y0U0MWwxOUFYaUExUFE6MA"); 
$schools[9] = array("South Knox", "South Knox_Schedule", "dFNMT1pBQTM1LTFOZkZLWGVtZ2R6dVE6MA"); 
$schools[10] = array("Spring Hill", "Spring_Hill_Schedule", "dHFkQlZmSFhXNml0N2FRNUF2c3phdFE6MQ");

// check to see which school name was passed to this page
// if school name does not match of the schools in the array, the page is "invalid"

foreach ($schools as $school_ID) {

	if ($school == $school_ID[0]) {
		$id = $school_ID[2];
		$name = $school_ID[0];
		$valid = "1";					// school name was valid
		
		// $id now contains the page id for this school. Will be used in the iframe below
		
		break;
	}
}

?>

<html>
<head>
<title>ClincVOLS.org Request Time Slot</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="styles.css" type="text/css" media="screen">
<script language="JavaScript" src="menu_options.js"></script>
<script language="JavaScript" src="mm_menu.js"></script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<script language="JavaScript">mmLoadMenus();</script>

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
  		<td colspan="100%" bgcolor="ffffff" align="center" style="-moz-border-radius: 15px; border-radius: 15px;">
  			<br>
    		<center><span class="style62">
    		
    		<?php 
    		// if a junk or nonsense school name is passed to this page, print an error message
    		
    		if ($valid == "0") {
    			echo "Error. Invalid School.";
    		}
    		else {
    			echo "Request Time Slot <br>\n";
    			echo $name . " Elementary";
    		}
    		?>
    		
    		</span></center>
    		<br>
  			<?php
  			// the echo command below means: print the contents of the variable named $id
  			?>
  		
  			<iframe src="https://spreadsheets2.google.com/embeddedform?formkey=<?php echo $id;?>" width="600" height="600" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>


    		</div>
    	</td>
  	</tr>
 	

</table>

</body>
</html>