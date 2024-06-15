import pandas as pd
import sys
# id_projeto

id_projeto = sys.argv[1]
# ./data/$id_projeto/
path = './data/'+id_projeto

pacientes = pd.read_csv(path+"/pacientes.csv", header=None)
pacientes.columns = ["patient_id", "h1", "h2"]

halelos = pd.read_csv(path+"/halelos.csv", header=None)
halelos.columns = ["n", "haplotype", "freq"]
halelos_dict = dict(zip(halelos.n, halelos.haplotype))

modelo = pd.read_csv("./input/model.csv", header=None)
modelo.columns = ["haplotype", "enzymatic_activity", "allele", "score"]
modelo["score"] = pd.to_numeric(modelo["score"])

h1 = modelo.copy().add_prefix("1_")
h2 = modelo.copy().add_prefix("2_")

def phenotype(n):
    if (n>2): 
        return "gUM"

    switch = {
        0: "gPM",
        0.25: "gIM",
        0.5: "gIM",
        1: "gNM-S",
        1.25: "gNM-S",
        1.5: "gNM-F",
        2: "gNM-F"
    }
    return switch.get(n, "-")

x = (
    pacientes
     .replace({"h1":halelos_dict, "h2":halelos_dict})
     .merge(h1, how="left", left_on="h1", right_on="1_haplotype")
     .merge(h2, how="left", left_on="h2", right_on="2_haplotype")
     .drop(["h1", "h2"], axis=1)
)
x["total_score"] = x["1_score"] + x["2_score"]

x["phenotype"] = x.apply(lambda row: phenotype(row["total_score"]), axis=1)
x.fillna("-")

x.to_csv(path+'/final.csv')