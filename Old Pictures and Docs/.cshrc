# csh script run whenever a new C-shell is started..

# First, check if certain files are available

set COMMON="/cmn/setup"		# Location of some useful files

if ( -d $COMMON ) then

  setenv ARCH "`$COMMON/GetArch`" # Get the architecture type for this host

  # The following section uses the defined alias, setup, to set the path
  # and other environment variables necessary for easy access to commands
  # and documentation.
  #
  # the following "setup" alias may be used to list set up the environment
  # for several software packages, for more information, see "man setup"

  alias setup "set Env = \!* ; source $COMMON/csh.setup ; unset Env"
  alias linktest "set Env = \!* ; source $COMMON/csh.linktest ; unset Env"
  setup default			# set default path and MANPATH
else
  set path=(/usr/local/bin /usr/misc/bin /usr/x11/bin /usr/bin /bin /usr/ucb)
  set path=($path /usr/mh/bin /usr/transcript/bin /usr/tex/bin /usr/gnu/bin )
endif

set   userpath="$HOME/bin/$ARCH $HOME/bin ./"
set   path = ($path $userpath)


umask 077	# although present in .login, this command is needed for
 		# certain cases in .cshrc

# Exit if not an interactive shell, define the following otherwise..

if ( ! $?prompt) then
  exit
else
  set   prompt=`hostname | awk -F. '{print $1}'`"/""$USER% "
  set   notify		# report status changes immediately
  set   history = 20	# how many commands to remember?
  set   filec		# file name completion with ESC
  set   cdpath=~/
  set   noclobber	# Protects files in SOME cases from accidental deletion.
  set   ignoreeof	# Won't let you logout when you hit control-D; 
  limit coredumpsize 0	# core files are not created
  stty  echoe		# Echo ERASE character as a backspace-space-backspace string.

  # Uncomment the following and replace XXX with your favorite printer

  # setenv PRINTER XXX

  setenv EDITOR /usr/misc/bin/pico
  setenv VISUAL /usr/misc/bin/pico

  # Aliases.. or making life easier (in a way)

  alias mv /bin/mv -i
  alias cp /bin/cp -i
  alias ls /bin/ls -F
#  alias mail /usr/bin/mailx
  alias mail /usr/misc/bin/pine
  alias vt100 "set term = vt100"

endif		# End of interactive shell commands..

