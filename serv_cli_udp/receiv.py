#!/usr/bin/env python
# -*- coding: utf-8 -*-

import sys
import MySQLdb
import socket
import time

UDP_IP = "127.0.0.1"
UDP_PORT = 5005


sock = socket.socket(socket.AF_INET, # ca c'est pour internet
			socket.SOCK_DGRAM) # et ca pour UDP
sock.bind((UDP_IP, UDP_PORT))


while True:  # boucle infinie pour recupérer les data
	data, addr = sock.recvfrom(1024) # on dit que le buffer faire 1024 bytes
	print "received data : ",data
