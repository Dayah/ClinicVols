function mmLoadMenus() {
	window.mm_menu_schools = new Menu("root",122,21,"Helvetica, Arial, sans-serif",15,"#FFFFFF","#000000","#000000","#FFFFFF","middle","left",3,0,1000,-5,7,true,false,true,0,true,true);
	mm_menu_schools.addMenuItem("Beaumont","location='schools/beaumont.html'");
	mm_menu_schools.addMenuItem("Bonny&nbsp;Kate","location='schools/bonnykate.html'");
	mm_menu_schools.addMenuItem("Dogwood","location='schools/dogwood.html'");
	mm_menu_schools.addMenuItem("East&nbsp;Knox","location='schools/eastknox.html'");
	mm_menu_schools.addMenuItem("Green&nbsp;Magnet","location='schools/green.html'");
	mm_menu_schools.addMenuItem("Inskip","location='schools/inskip.html'");
	mm_menu_schools.addMenuItem("Lonsdale","location='schools/lonsdale.html'");
	mm_menu_schools.addMenuItem("Mount&nbsp;Olive","location='schools/mountolive.html'");
	mm_menu_schools.addMenuItem("Pond&nbsp;Gap","location='schools/pondgap.html'");
	mm_menu_schools.addMenuItem("South&nbsp;Knox","location='schools/southknox.html'");
	mm_menu_schools.addMenuItem("Spring&nbsp;Hill","location='schools/springhill.html'");
	mm_menu_schools.hideOnMouseOut=true;
	mm_menu_schools.bgColor='#555555';
	mm_menu_schools.menuBorder=1;
	mm_menu_schools.menuLiteBgColor='#FFFFFF';
	mm_menu_schools.menuBorderBgColor='#777777';

	window.mm_menu_about = new Menu("root",170,21,"Helvetica, Arial, sans-serif",15,"#FFFFFF","#000000","#000000","#FFFFFF","middle","left",3,0,1000,-5,7,true,false,true,0,true,true);
	mm_menu_about.addMenuItem("Volunteers","location='volunteers.html'");
	mm_menu_about.addMenuItem("Community&nbsp;Outreach","location='commout.html'");
	mm_menu_about.addMenuItem("Officers","location='officers.html'");
	mm_menu_about.addMenuItem("Schedule","location='schedule.html'");
	mm_menu_about.hideOnMouseOut=true;
	mm_menu_about.bgColor='#555555';
	mm_menu_about.menuBorder=1;
	mm_menu_about.menuLiteBgColor='#FFFFFF';
	mm_menu_about.menuBorderBgColor='#777777';

	mm_menu_schools.writeMenus();
	mm_menu_about.writeMenus();
}