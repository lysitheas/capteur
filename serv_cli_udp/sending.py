#!/usr/bin/env python
# -*- coding:uft8 -*-

import sys
import MySQLdb
import socket
import time

print "This is ths send UDP paquet program"

UDP_IP = "127.0.0.1"
UDP_PORT = "5005"
MESSAGE = input("message : ")

print "UDP Target ip : ", UDP_IP
print "UDP Targer port : ",UDP_PORT
print "message :", MESSAGE

sock = socket.socket(socket.AF_INET, # ca c'est internet
			socket.SOCK_DGRAM) # mode datagram pour UDP
sock.sendto(MESSAGE, (UDP_IP, UDP_PORT))
