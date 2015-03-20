#!/usr/bin/env python
# -*- coding: utf-8 -*-

import sys
import MySQLdb
import socket
import time

#BASE DE DONNES
##################

aujourdui = time.strftime('%d/%m/%y %H:%M:%S',time.localtime())
print aujourdui
print "tentative de connexion a la base..."

try:
        conn = MySQLdb.connect(host = "localhost", user = "capteur", passwd = "europ", db= "capteur")
except MySQLdb.Error, e:
        print ("ERREUR de connexion à la base de données: %d : %s" % (e.args[0], e.args[1]))
        sys.exit (1)
print ("Connexion à la base de donneés réussite=)")
########################

UDP_IP = "127.0.0.1"
UDP_PORT = 5005


sock = socket.socket(socket.AF_INET, # ca c'est pour internet
			socket.SOCK_DGRAM) # et ca pour UDP
sock.bind((UDP_IP, UDP_PORT))


while True:  # boucle infinie pour recupérer les data
	data, addr = sock.recvfrom(1024) # on dit que le buffer faire 1024 bytes
	aujourdui = time.strftime('%d/%m/%y %H:%M:%S',time.localtime())
	print "received data : ",data
	try:
		cursor = conn.cursor ()	
		cursor.execute("""INSERT INTO Element (ladate, valeur) VALUES
                	(%s, %s)
        	""", (aujourdui,data))
		cursor.close()
		conn.commit()
	except MySQLdb.Error, e:
		print ("erreur record BDD: %d : %s" % (e.args[0], e.args[1]))
		sys.exit (1)
