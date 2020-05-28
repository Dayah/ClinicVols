<?
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

function display_people_form_from_file($filename) {
	global $delimiter, $map;
	$contents = file($filename, FILE_IGNORE_NEW_LINES);
	$file_noext = pathinfo($filename);
	$file_noext = $file_noext["filename"];

	for ($key = 0; $key <= count($contents); $key++) {
	    $fields = explode($delimiter, $contents[$key]);
		echo "<p>\n";
		foreach ($map as $x=>$field) {
			${$field} = $fields[$x];
			echo "<input type=text name='$file_noext-$field-$key' value='${$field}' size=20>";
		}
		echo "<img src='schools/$image' style='height: 5em;'>";
		echo "</p>\n";
	}
}

function write_form_submission_to_file($filename) {
	global $delimiter, $map;
	$file_noext = pathinfo($filename);
	$file_noext = $file_noext["filename"];

	if (array_key_exists("submit", $_POST)) {
		$fp = fopen($filename, "w");
		$x = 0;
		while (array_key_exists("$file_noext-school-$x", $_POST)) {
			if (strlen($_POST["$file_noext-school-$x"]) > 0) {
				$combined = array();
				foreach ($map as $field)
					$combined[] = $_POST["$file_noext-$field-$x"];
				$final_line = implode($delimiter, $combined);
				fwrite($fp, $final_line . "\n");
			}
			$x++;
		}
		fclose($fp);
	}
}
?>
<html>
<head>
<style>p { margin-left: 2em; }</style>
</head>
<body>
<form method="post" action="edit_schools.php">
<h1>Schools</h1>
<?
write_form_submission_to_file("schools.txt");
display_people_form_from_file("schools.txt");
?>
<input type="submit" name="submit" value="Save Schools">
</form>
</body>
</html>
