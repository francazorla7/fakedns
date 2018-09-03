#! /usr/bin/python
# -*- coding: utf-8 -*-

import hashlib
import os
import json

def register_user(user, password, server):

	# Hash the password
	password_hashed = hashlib.sha512(password).hexdigest()

	# Make the request
	os.system("curl -d 'user={}&password={}' -X POST {}/register_user.php > {}".format(user, password_hashed, server, "results"))

	# Read response
	with open("results", "r") as f:
		js = json.loads(f.read())

def update_ip(user, password, server):

	# Get public ip
	os.system("dig +short myip.opendns.com @resolver1.opendns.com > ip")
	with open("ip", "r") as f:
		ip = f.read()[:-1]

	# Make the request
	os.system("curl -s -d 'user={}&password={}&ip={}' -X POST {}/update_ip.php > {}".format(user, password, ip, server, "results"))

	# Read response
	with open("results", "r") as f:
		js = json.loads(f.read())

	# Print response
	return js["response"]

if __name__ == '__main__':
	
	#register_user("example", "hello", "recessed-tons.000webhostapp.com")
	#update_ip("example", "hello", "recessed-tons.000webhostapp.com")
	pass