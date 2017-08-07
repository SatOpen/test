#!/bin/bash
while read line           
do    
	  echo "$ line \ n"             
    /sbin/iptables -A INPUT -s $line -j DROP
       
done < /usr/local/etc/ip_bannati  

