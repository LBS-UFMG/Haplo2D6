id_projeto=$1
phase='../app/ThirdParty/phase.2.1.1.linux/PHASE'  # linux
#phase='../app/ThirdParty/PHASE2.1.1/PHASE'  # macos

# etapa 1: executa o PHASE 
$phase -MS -f1 -S$RANDOM "./data/$id_projeto/input.inp" ./data/$id_projeto/output 400000 1000 50000

# etapa 2: realiza pre-processamento dos dados (halelos)
sed --expression='/BEGIN LIST_SUMMARY/,/END LIST_SUMMARY/{ /LIST_SUMMARY/d; p }' --quiet ./data/$id_projeto/output | column -t | tr -s ' ' | tr ' ' , > ./data/$id_projeto/halelos.csv

# etapa 3: outro pre-processamento dos dados (pacientes)
sed --expression='/BEGIN BESTPAIRS_SUMMARY/,/END BESTPAIRS_SUMMARY/{ /BESTPAIRS_SUMMARY/d; p }' --quiet ./data/$id_projeto/output | tr ':(),' ' ' | sort | column -t | tr -s ' ' | tr ' ' , > ./data/$id_projeto/pacientes.csv

# etapa 4: processa tabela
python3 ../app/ThirdParty/processa_tabela.py $id_projeto

echo "Project $id_projeto has run successfully." > ./data/$id_projeto/finished.txt

# deleta projetos velhos (+24h)
# find $PWD -type d -mtime +1 -type d -exec rm -rf {} \;