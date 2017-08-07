#!/bin/bash

CCCAM_CONFIG_FILE_PATH="/var/etc"
CCCAM_EXECUTABLE_PATH="/usr/local/bin"
NAME_OFF_CCCAM_EXECUTABLE="CCcam1"

CCCAM2_CONFIG_FILE_PATH="/var/etc"
CCCAM2_EXECUTABLE_PATH="/usr/local/bin"
NAME_OFF_CCCAM2_EXECUTABLE="CCcam2"

OSCAM1_EXECUTABLE_PATH="/usr/local/bin"
NAME_OFF_OSCAM1_EXECUTABLE="oscam1"

OSCAM2_EXECUTABLE_PATH="/usr/local/bin"
NAME_OFF_OSCAM2_EXECUTABLE="oscam2"

OSCAM3_EXECUTABLE_PATH="/usr/local/bin"
NAME_OFF_OSCAM3_EXECUTABLE="oscam3"

OSCAM4_EXECUTABLE_PATH="/usr/local/bin"
NAME_OFF_OSCAM4_EXECUTABLE="oscam4"

OSCAM5_EXECUTABLE_PATH="/usr/local/bin"
NAME_OFF_OSCAM5_EXECUTABLE="oscam5"


MULTICS_PATH="/usr/local/bin"
NAME_OFF_MULTICS_EXECUTABLE="multics"


#sleep 1

#ps -eo comm,pid,etime > tmpcat2
#PID=$(grep $NAME_OFF_CCCAM_EXECUTABLE tmpcat2 | awk -F" " '{ print $2}')
#TIME=$(grep $NAME_OFF_CCCAM_EXECUTABLE tmpcat2 | awk -F" " '{ print $3}')
#if [ "$PID" = "" ]; then
#cd $CCCAM_EXECUTABLE_PATH
#./$NAME_OFF_CCCAM_EXECUTABLE -d > /var/log/cccam_ok.log -C $CCCAM_CONFIG_FILE_PATH/CCcam.cfg &
#fi

#sleep 1


#ps -eo comm,pid,etime > tmpcat3
#PID3=$(grep $NAME_OFF_CCCAM2_EXECUTABLE tmpcat3 | awk -F" " '{ print $2}')
#TIME3=$(grep $NAME_OFF_CCCAM2_EXECUTABLE tmpcat3 | awk -F" " '{ print $3}')
#if [ "$PID3" = "" ]; then
#cd $CCCAM2_EXECUTABLE_PATH
#./$NAME_OFF_CCCAM2_EXECUTABLE -C /var/etc/CCcam2.cfg &
#fi


########OSCAM 1 Da CONTABO

sleep 1

ps -eo comm,pid,etime > tmpcat7
PID4=$(grep $NAME_OFF_OSCAM1_EXECUTABLE tmpcat7 | awk -F" " '{ print $2}')
TIME4=$(grep $NAME_OFF_OSCAM1_EXECUTABLE tmpcat7 | awk -F" " '{ print $3}')
if [ "$PID4" = "" ]; then
cd $OSCAM1_EXECUTABLE_PATH
./$NAME_OFF_OSCAM1_EXECUTABLE -p 8000 -b
fi

sleep 1

ps -eo comm,pid,etime > tmpcat8
PID5=$(grep $NAME_OFF_OSCAM2_EXECUTABLE tmpcat8 | awk -F" " '{ print $2}')
TIME5=$(grep $NAME_OFF_OSCAM2_EXECUTABLE tmpcat8 | awk -F" " '{ print $3}')
if [ "$PID5" = "" ]; then
cd $OSCAM2_EXECUTABLE_PATH
./$NAME_OFF_OSCAM2_EXECUTABLE -p 8192 -c /usr/local/etc/conf2 -b
fi

sleep 1

ps -eo comm,pid,etime > tmpcat9
PID6=$(grep $NAME_OFF_OSCAM3_EXECUTABLE tmpcat9 | awk -F" " '{ print $2}')
TIME6=$(grep $NAME_OFF_OSCAM3_EXECUTABLE tmpcat9 | awk -F" " '{ print $3}')
if [ "$PID6" = "" ]; then
cd $OSCAM3_EXECUTABLE_PATH
./$NAME_OFF_OSCAM3_EXECUTABLE -p 8192 -c /usr/local/etc/conf3 -b
fi

sleep 1

ps -eo comm,pid,etime > tmpcat10
PID7=$(grep $NAME_OFF_OSCAM4_EXECUTABLE tmpcat10 | awk -F" " '{ print $2}')
TIME7=$(grep $NAME_OFF_OSCAM4_EXECUTABLE tmpcat10 | awk -F" " '{ print $3}')
if [ "$PID7" = "" ]; then
cd $OSCAM4_EXECUTABLE_PATH
./$NAME_OFF_OSCAM4_EXECUTABLE -p 8000 -c /usr/local/etc/conf4 -b
fi


########OSCAM 5 vecchia da HostAg
#sleep 1

#ps -eo comm,pid,etime > tmpcat11
##PID8=$(grep $NAME_OFF_OSCAM5_EXECUTABLE tmpcat11 | awk -F" " '{ print $2}')
#TIME8=$(grep $NAME_OFF_OSCAM5_EXECUTABLE tmpcat11 | awk -F" " '{ print $3}')
#if [ "$PID8" = "" ]; then
#cd $OSCAM5_EXECUTABLE_PATH
#./$NAME_OFF_OSCAM5_EXECUTABLE -p 8000 -c /usr/local/etc/conf5 -b
#fi


sleep 1

ps -eo comm,pid,etime > tmpcat11
PID8=$(grep $NAME_OFF_MULTICS_EXECUTABLE tmpcat11 | awk -F" " '{ print $2}')
TIME8=$(grep $NAME_OFF_MULTICS_EXECUTABLE tmpcat11 | awk -F" " '{ print $3}')
if [ "$PID8" = "" ]; then
cd $MULTICS_PATH
./$NAME_OFF_MULTICS_EXECUTABLE -b
fi

sleep 1
exit 0
