function mmLoadMenus() {
	window.mm_menu_schools = new Menu("root",122,21,"Helvetica, Arial, sans-serif",15,"#FFFFFF","#000000","#000000","#FFFFFF","middle","left",3,0,1000,-5,7,true,false,true,0,true,true);
<?
$filename = "schools.txt";
$delimiter = "|";
$contents = file($filename, FILE_IGNORE_NEW_LINES);

foreach ($contents as $line) {
	$fields = explode($delimiter, $line);
	echo "	mm_menu_schools.addMenuItem(\"", $fields[0], "\", \"location='/~clinics/schools.php?school=$fields[0]'\");\n";
}
?>
	mm_menu_schools.hideOnMouseOut=true;
	mm_menu_schools.bgColor='#555555';
	mm_menu_schools.menuBorder=1;
	mm_menu_schools.menuLiteBgColor='#FFFFFF';
	mm_menu_schools.menuBorderBgColor='#777777';

	window.mm_menu_about = new Menu("root",170,21,"Helvetica, Arial, sans-serif",15,"#FFFFFF","#000000","#000000","#FFFFFF","middle","left",3,0,1000,-5,7,true,false,true,0,true,true);
	mm_menu_about.addMenuItem("Volunteers","location='volunteers.html'");
	mm_menu_about.addMenuItem("Community&nbsp;Outreach","location='commout.html'");
	mm_menu_about.addMenuItem("Officers","location='officers.php'");
	mm_menu_about.addMenuItem("Schedule","location='schedule.html'");
	mm_menu_about.hideOnMouseOut=true;
	mm_menu_about.bgColor='#555555';
	mm_menu_about.menuBorder=1;
	mm_menu_about.menuLiteBgColor='#FFFFFF';
	mm_menu_about.menuBorderBgColor='#777777';

	mm_menu_schools.writeMenus();
	mm_menu_about.writeMenus();
}
