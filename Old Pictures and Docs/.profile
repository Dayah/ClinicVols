# ksh script run whenever a new Korn shell is started..

# export all variables defined from this point

set -a

if [ ! -z "$(typeset -f setup)" ]; then 
	setup default
else
	PATH=/opt/SUNWspro/bin:/usr/sbin:/usr/bin:/usr/local/bin:/usr/ccs/bin:/usr/x11/bin
	PATH=$PATH:/usr/openwin/bin:/usr/ucb:/usr/misc/bin:/cmn/bin:/cmn/setup/bin:/usr/mh/bin
	PATH=$PATH:/usr/gnu/bin:/usr/transcript/bin:/usr/tex/bin
	MANPATH=/cmn/man:/cmn/setup/man:/usr/misc/man:/usr/x11/man:/usr/mh/man:/usr/gnu/man
	MANPATH=$MANPATH:/usr/transcript/man:/usr/tex/man:/usr/man:/opt/SUNWspro/man:/usr/openwin/man
fi

MACHINE=$HOSTNAME
if [ -z "$MACHINE" ]; then MACHINE=`uname -n`; fi
PS1="$MACHINE:\$PWD \$ "

HISTSIZE=100
CDPATH=.:~            # cd relative to . if destination exists, else from home
ulimit -c 0           # core files are not created

# Uncomment the following lines and replace XXX with your favorite printer
#LPDEST=XXX
#PRINTER=XXX

EDITOR=/usr/misc/bin/pico
VISUAL=/usr/misc/bin/pico

ENV=$HOME/.kshrc

# We don't use /var/mail anymore, no need to check for arrival of new mail here
#MAIL=/var/mail/$LOGNAME

