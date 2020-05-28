#!/bin/sh
# $XConsortium: xinitrc.cpp,v 1.4 91/08/22 11:41:34 rws Exp $
#
# modified by Mohamad El Jazzar, UTCC 1/93
#	included the skel .xinitrc file

exec > $HOME/.xinitrc-errors 2>&1

xlib=/usr/x11/lib/X11

uRESOURCES=$HOME/.Xresources
sRESOURCES=$xlib/xinit/Xresources

uMODMAP=$HOME/.Xmodmap
sMODMAP=$xlib/xinit/Xmodmap

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

# start a clock
xclock -update 1 -geometry 150x150+0+0 &

# start a console window 
if [ "`uname`" != "AIX" ]; then
 $XBIN/xterm -sb -cr blue -geometry 80x8+160+0 -n Console -disp $DISPLAY $XCONSOLE &
fi

# open a local window
$XBIN/xterm -xrm *iconName:Local -fn 7x13 -fb 7x13B -geometry 80x24+160-400 &

# open xman
$XBIN/xman -geometry 500x770-0-0 &
 
#  The following lines MUST be run in the foreground (no & at the end). *
if [ "x$WindowManager" = "x" ]; then
  WindowManager=twm
fi

if [ -f $HOME/.twmrc ]; then
  $WindowManager -display $DISPLAY
else
  $WindowManager -f /cmn/lib/skel/.twmrc -display $DISPLAY
fi

if [ "$XCONSOLE" -a -r $XBIN/kbd_mode ]; then
   $XBIN/kbd_mode -a
fi

clear
