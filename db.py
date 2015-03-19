#!/usr/bin/env python
# -*- coding: utf-8 -*-



import sys
import MySQLdb
import time
print time.strftime('%d/%m/%y %H:%M',time.localtime())

aujourdui = time.strftime('%d/%m/%y %H:%M:%S',time.localtime())
print "tentative de connexion a la base"
try:
	conn = MySQLdb.connect(host = "localhost", user = "capteur", passwd = "europ", db= "capteur")
except MySQLdb.Error, e:
	print ("ERREUR de connexion à la base de données: %d : %s" % (e.args[0], e.args[1]))
	sys.exit (1)
print ("Connexion à la base de donneés réussite=)")

val = input("taper valeur a saisir dans le base :")
try:
	cursor = conn.cursor ()
	
	cursor.execute("""INSERT INTO Element (ladate, valeur) VALUES
		(%s, %s)
	""", (aujourdui,val))
	cursor.close()
	conn.commit()
except MySQLdb.Error, e:
	print("Erreur %d: %s" % (e.args[0], e.args[1]))
	sys.exit (1)
