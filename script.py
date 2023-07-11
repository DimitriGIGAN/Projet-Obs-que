import csv

# Lecture du fichier 
with open('test.csv', 'r') as csv_file:
    csv_reader = csv.reader(csv_file)
    next(csv_reader)  
    data = list(csv_reader)  #Permet de stocker les données dans une liste

# La structure
html_content = "<table>"
for ligne in data:
    html_content += "<tr>"
    for value in ligne:
        html_content += f"<td>{value}</td>"
    html_content += "</tr>"
html_content += "</table>"

# Affichage du contenu
with open('test.html', 'w') as html_file:
    html_file.write(html_content)