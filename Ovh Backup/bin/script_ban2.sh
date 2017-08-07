#!/bin/bash
while read line           
do
iptables -A INPUT -s $line -j DROP       
done < /usr/local/etc/ip_bannati  

