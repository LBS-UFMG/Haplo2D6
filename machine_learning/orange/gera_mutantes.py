# PARTE 1: lê o arquivo fasta

fasta_file = open("P10635.fasta").readlines()
fasta = ""
for i in fasta_file:
	if i[0] != ">":
		fasta += i.strip()


# PARTE 2: lê o arquivo com as entradas
entrada = open("entrada.csv")
linhas = entrada.readlines()
alelos = {}
muts = {}
cont = 0
for linha in linhas:
	cont += 1
	print(cont, '/', len(linhas))
	l = linha.split(";")

	if cont == 1:
		# este código confere se o resíduo está correto
		coluna = 0 # posicao da linha
		for i in l:
			residuo = i[0]
			# try:
			try:
				num = int(i[1:-1])
				#coluna = pos # altera a nomenclatura
				mut = i[-1]
				# print(residuo, fasta[num-1], num)
				muts[coluna] = (residuo, num, mut)
			except:
			 	if i.find("/") != -1:
			 		num = int(i[1:-3])
			 		mut = i[-3]
			 		muts[coluna] = (residuo, num, mut)
			 	elif i.find("del") != -1:
			 		num = int(i[1:].replace("del",""))
			 		mut = "del"
			 		muts[coluna] = (residuo, num, mut)

			coluna += 1
		# por enquanto, ignorar residuo 431 => fasta[430] 
		# -> acredito que a mutação correta seja A432G e não A431G
		
	elif cont > 1:
		alelo = l[0].strip()  # declara o alelo
		alelos[alelo] = fasta
		classe = l[1].strip()

		for coluna in range(len(l)):
			if coluna > 2: # ignora l[0] e l[1]
				tem_mut = l[coluna].strip()
				if tem_mut != "":
					# try:
					try:
						#print(muts)
						print("Coluna:",coluna, muts[coluna]) #Coluna: 50 ('R', 296, 'C')

						pos_mutacao = muts[coluna][1] 
						res_mutar = muts[coluna][2]

						# modificando o fasta
						tmp = alelos[alelo]
						comeco = tmp[:pos_mutacao-1]
						fim = tmp[pos_mutacao:]

						if tem_mut[0:3] != "del":
							alelos[alelo] = comeco + res_mutar + fim
						else:
							alelos[alelo] = comeco + fim
					except:
						print("Erro", alelo, linha, len(l))
						exit()

		# gravando o resultado
		alelo2 = alelo.replace("*","_").replace(">","_")
		w = open("saida/"+alelo2+".fasta", "w")
		w.write(">"+alelo2+"\n")
		w.write(alelos[alelo])
		w.close()

