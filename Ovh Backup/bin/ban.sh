#!/bin/bash
ulimit -n 99999
while read line           
do    
 /sbin/iptables -I INPUT -s $line -j DROP
       
done </usr/local/etc/ip_bannati | sort | uniq
