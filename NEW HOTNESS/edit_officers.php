<?
$delimiter = "|";

function display_people_form_from_file($filename) {
	global $delimiter;
	$contents = file($filename, FILE_IGNORE_NEW_LINES);
	$file_noext = pathinfo($filename);
	$file_noext = $file_noext["filename"];

	for ($key = 0; $key <= count($contents); $key++) {
	    $fields = explode($delimiter, $contents[$key]);
		$title = $fields[0];
		$name = $fields[1];
		$email = $fields[2];
		$image = $fields[3];
		$blurb = $fields[4];

		echo "<p>\n";
		echo "<input type=text name='$file_noext-title-$key' value='$title' size=20> <input type=text name='$file_noext-name-$key' value='$name' size=20> <input type=text name='$file_noext-email-$key' value='$email' size=30> <input type=text name='$file_noext-image-$key' value='$image' size=20><br>\n";
		echo "<textarea name='$file_noext-blurb-$key' rows=5 cols=60>$blurb</textarea><img src='images/officers/$image' align=top style='height: 5em;'>\n";
		echo "</p>\n";
	}
}

function write_form_submission_to_file($filename) {
	global $delimiter;
	$file_noext = pathinfo($filename);
	$file_noext = $file_noext["filename"];

	if (array_key_exists("submit", $_POST)) {
		$fp = fopen($filename, "w");
		$x = 0;
		while (array_key_exists("$file_noext-name-$x", $_POST)) {
			if (strlen($_POST["$file_noext-name-$x"]) > 0)
				fwrite($fp, $_POST["$file_noext-title-$x"] . $delimiter . $_POST["$file_noext-name-$x"] . $delimiter . $_POST["$file_noext-email-$x"] . $delimiter . $_POST["$file_noext-image-$x"] . $delimiter . $_POST["$file_noext-blurb-$x"] . "\n");
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
<form method="post" action="edit_officers.php">
<h1>Executive Board</h1>
<?
write_form_submission_to_file("executive.txt");
display_people_form_from_file("executive.txt");
?>
<h1>School Chairs</h1>
<?
write_form_submission_to_file("schoolchairs.txt");
display_people_form_from_file("schoolchairs.txt");
?>
<h1>5K Committee Members</h1>
<?
write_form_submission_to_file("5kcommittee.txt");
display_people_form_from_file("5kcommittee.txt");
?>
<h1>Trainers</h1>
<?
write_form_submission_to_file("trainers.txt");
display_people_form_from_file("trainers.txt");
?>
<input type="submit" name="submit" value="Save Officers">
</form>
</body>
</html>
