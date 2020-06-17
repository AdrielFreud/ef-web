'''
funcoes

- monitoramento de processos
- controle de usuario
- controle de cadastro

# metodo de comunicação

- autenticação via token
- dados via url
- banco de dados

# Parametros url

api.php?command=LIST&token=ACESSO - ms(1) refresh

api.php?token=ACESSO&user=USUARIO&command=INPUT

'''

import requests
import base64
import time
import hashlib
import os
import socket
import psutil as ps
from Crypto.Cipher import AES
from Crypto import Random

getToken = lambda user: hashlib.md5(user.encode()).hexdigest()
enc = lambda data: base64.b64encode(data.encode())

key = base64.b64decode('ZsteBu1qSA9ZNXjajwAvbg==')

def refresh(command):
	pass	

def main():
	rawUser = socket.gethostname()
	user = enc(rawUser).decode()
	token = enc(getToken(rawUser)).decode()

	output = ""
	for proc in ps.process_iter():
		info = proc.as_dict(attrs=['pid', 'name'])
		output += "Processo: {} (PID: {})\n".format(info['pid'], info['name'])

	output = enc(output).decode("utf-8")

	data = {
		'token': token,
		'user': user,
		'dados': output
	}

	#print(data)
	sndata = requests.post("http://localhost/live/api.php", data=data).text
	print(sndata)

ison = True

'''
while ison:
	time.sleep(1)
	main()
'''

main()