#!/bin/bash
echo "backup file oscam1" | mutt -a "/usr/local/etc/oscam.user" -a "/usr/local/etc/oscam.server" -a "/usr/local/etc/oscam.conf" -s "BACKUP SERVER DEDICATO oscam1" -- satopenserver2@gmail.com
echo "backup file oscam2" | mutt -a "/usr/local/etc/conf2/oscam.user" -a "/usr/local/etc/conf2/oscam.server" -a "/usr/local/etc/conf2/oscam.conf" -s "BACKUP SERVER DEDICATO oscam2" -- satopenserver2@gmail.com
echo "backup file oscam3" | mutt -a "/usr/local/etc/conf3/oscam.user" -a "/usr/local/etc/conf3/oscam.server" -a "/usr/local/etc/conf3/oscam.conf" -s "BACKUP SERVER DEDICATO oscam2" -- satopenserver2@gmail.com
echo "backup file oscam4" | mutt -a "/usr/local/etc/conf4/oscam.user" -a "/usr/local/etc/conf4/oscam.server" -a "/usr/local/etc/conf4/oscam.conf" -s "BACKUP SERVER DEDICATO oscam4" -- satopenserver2@gmail.com
