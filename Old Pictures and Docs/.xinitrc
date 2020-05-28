#!/bin/sh
# $XConsortium: xinitrc.cpp,v 1.4 91/08/22 11:41:34 rws Exp $
#
# modified by Mohamad El Jazzar, UTCC 1/93
#	included the skel .xinitrc file

exec > $HOME/.xinitrc-errors 2>&1
#exec > /scrtch/xinitrc-$$ 2>&1

uRESOURCES=$HOME/.Xresources
sRESOURCES=/usr/lib/X11/xinit/Xresources

uMODMAP=$HOME/.Xmodmap
sMODMAP=/usr/lib/X11/xinit/Xmodmap

# merge in defaults and keymaps

if [ -f $sRESOURCES ]; then
    xrdb -merge $sRESOURCES
fi

if [ -f $uRESOURCES ]; then
    xrdb -merge $uRESOURCES
fi

if [ -f $sMODMAP ]; then
    xmodmap $sMODMAP
fi

if [ -f $uMODMAP ]; then
    xmodmap $uMODMAP
fi

# start some programs

Env=Xenv		# used by the setup script below
. /cmn/setup/sh.setup	# this script defines some important variables
			#   (XBIN, MISC, and default WindowManager
			#   as well as the DISPLAY variable

#************************************************************************
#									*
#       The following command will start a console window IF the local  *
#       host is a workstation (running a system other than AIX).        *
#									*
#************************************************************************

if [ "`uname`" != "AIX" ]; then
 $XBIN/xterm -sb -cr blue -geometry 80x8+0+0 -n Console -disp $DISPLAY $XCONSOLE &
fi

#************************************************************************
#									*
#	The following command opens a local (to this machine) window.	*
#									*
#************************************************************************

$XBIN/xterm -sb -name LOCAL -n `hostname | awk -F. '{print $1}'` -fn 7x13 -fb 7x13B -geometry 80x24+160-400 &

#************************************************************************
#									*
#	The following command will open a small window the shows	*
#	graphically the current use of this machine.            	*
#									*
#************************************************************************
 
# $XBIN/xload -bd red -name XCLIENT -bg navyblue -fg white -hl red -geometry 70x70-570+0 &
 
#************************************************************************
#									*
#	The following command will open a small window that runs	*
#	Xman, a program to display manual pages, on this machine.      	*
#									*
#************************************************************************
 
$XBIN/xman -bd red -name XCLIENT -geometry 110x50-345+0 -pagesize +29+162 &
 
#************************************************************************
#									*
#	The following command will create a Texas Instruments TI-30	*
#	calculator emulator.                                            *
#									*
#************************************************************************

# $XBIN/xcalc -bd red -name XCLIENT -geometry -0+150 -n "TI-30 Calculator" -iconic &

#************************************************************************
#									*
#	The following command will create a Hewlett-Packard HP-10C	*
#	calculator emulator.                                            *
#									*
#************************************************************************

# $XBIN/xcalc -bd red -name XCLIENT -rpn -geometry -0+150 -n "HP-10C Calculator" -iconic &

#************************************************************************
#									*
#	The following command will create a clock showing the 		*
#	current time of day.  To use it remove the comment ( # ) 	*
#	from the start of the line.					*
#									*
#************************************************************************

# $XBIN/xclock -name XCLIENT -hd NavyBlue -hl LightSkyBlue2 -bg NavyBlue -fg white -update 1 -geometry 100x100-170+0 &

#************************************************************************
#									*
#	All of the following commands, except for twm and those         *
#	following it, are run on utkux1 but appear on this screen.      *  
#	In order for them to work you must:  				*
#									*	
#	   remove the comment ( # ) from the start of the line.		*
#									*
#	To learn more about these commands use man pages on utkux1.	*
#									*
#************************************************************************

#************************************************************************
#									*
#	The following command will run a news program.			*
#									*
#************************************************************************
	
# $XBIN/xrn -bd red -name XCLIENT -geometry -0+0 -display $DISPLAY -iconic &

#************************************************************************
#									*
#	The following command will run a mail handler program.		*
#									*
#************************************************************************

# $XBIN/xmh -bd red -name XCLIENT -geom 600x700+200+120 -display $DISPLAY -iconic &

#************************************************************************
#									*
#	The following command will run a program that will create a 	*
#	small window used to notify you when you get a mail message.	*
#									*
#************************************************************************

# $XBIN/xbiff -bg white -fg NavyBlue -geom -288+0 -display $DISPLAY &

#************************************************************************
#									*
#	The following command opens a window to utkux1.		 	*
#									*
#************************************************************************

# rsh utkux1 '(xterm -T UTKUX1 -sb -cr skyblue4 -n UTKUX1 -fn 9x15 -fb 9x15B -geometry 80x24+0-0 -display '$DISPLAY' -iconic < /dev/null > /dev/null &)' &

#************************************************************************
#                                                                       *
#       The following command prints the message of the day.            *
#                                                                       *
#************************************************************************

$MISC/xmotd &

#************************************************************************
#									*
#	        	      I M P O R T A N T				*
#									*
#************************************************************************
#									*
#  The following lines MUST be run in the foreground (no & at the end). *
#									*
#************************************************************************

$WindowManager -display $DISPLAY

if [ "x$WindowManager" = "x" ]; then
  WindowManager=twm
fi

if [ "$XCONSOLE" -a -r $XBIN/kbd_mode ]; then
   $XBIN/kbd_mode -a
fi

clear
