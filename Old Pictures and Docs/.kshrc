# Aliases.. or making life easier (in a way)

set -o noclobber     # Protects files in SOME cases from accidental deletion
set -o ignoreeof     # Won't let you logout when you hit control-D; 
set -o emacs         # command editing will use emacs style commands

alias cp='/bin/cp -i'
alias mv='/bin/mv -i'
alias rm='/bin/rm -i'
alias ls='/bin/ls -F'
alias l='/bin/ls -aCF'
alias ll='/bin/ls -al'
#alias mail='/usr/bin/mailx'
alias mail='/usr/misc/bin/pine'

# aliases for folks moving over from VMS
alias lo=exit
alias log=exit
alias logout=exit

umask 077

vt100 () { TERM=vt100; export TERM; }
