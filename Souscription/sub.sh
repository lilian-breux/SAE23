#!/bin/bash
#__________________________________________________#
#
#Transmition of data
#
#__________________________________________________#
nbr_of_values=12 #number of values wanted

echo "$(mosquitto_sub -h localhost -p 1883 -t iut/\# -C $nbr_of_values)" > /home/lilian/Bureau/SAE23/Souscription/temp.json 

nbrlignes=$(wc -l /home/lilian/Bureau/SAE23/Souscription/temp.json | cut -f1 -d' ') #numbers of lines of a file
for (( i=1; i<=$nbrlignes; i++ ))
do
	value=$(sed -n "${i}p" "/home/lilian/Bureau/SAE23/Souscription/temp.json" | jq '.value')
	bate=$(sed -n "${i}p" "/home/lilian/Bureau/SAE23/Souscription/temp.json" | jq '.bate' | tr -d \")
	room=$(sed -n "${i}p" "/home/lilian/Bureau/SAE23/Souscription/temp.json" | jq '.room' | tr -d \")
	date=$(sed -n "${i}p" "/home/lilian/Bureau/SAE23/Souscription/temp.json" | jq '.date' | tr -d \")
	hours=$(sed -n "${i}p" "/home/lilian/Bureau/SAE23/Souscription/temp.json" | jq '.hours' | tr -d \")
	type=$(sed -n "${i}p" "/home/lilian/Bureau/SAE23/Souscription/temp.json" | jq '.type' | tr -d \")

	#--- Addition of sensors if they don't exist ---#
	query="SELECT * FROM \`Capteur\` WHERE room='$room' AND type='$type';"
	result=$(/opt/lampp/bin/mysql -h localhost -u lmll -pMatLucLuiLil4 -D SAE23 -e "$query")
	if [ -z "$result" ]
	then
		query="INSERT INTO \`Capteur\` (\`bate\`, \`type\`, \`room\`, \`idcapt\`) VALUES ('$bate', '$type', '$room', NULL)"
		/opt/lampp/bin/mysql -h localhost -u lmll -pMatLucLuiLil4 -D SAE23 -e "$query"
	fi

	#--- Addition of new values ---#
	query="INSERT INTO \`Mesure\`(\`date\`, \`hours\`, \`idmesu\`) VALUES ('$date','$hours', NULL)"
	/opt/lampp/bin/mysql -h localhost -u lmll -pMatLucLuiLil4 -D SAE23 -e "$query"

	query="SELECT \`idcapt\` FROM \`Capteur\` WHERE bate='$bate' AND type='$type' AND room='$room'"
	idcap=$(/opt/lampp/bin/mysql -h localhost -u lmll -pMatLucLuiLil4 -D SAE23 -e "$query") #Return "idcapt <number>"
	idcap=$(echo ${idcap} | sed 's/.\{6\}//') #delete the first 6 caracters to transform the variable to a number

	query="SELECT \`idmesu\` FROM \`Mesure\` WHERE date='$date' AND hours='$hours'"
	idmesu=$(/opt/lampp/bin/mysql -h localhost -u lmll -pMatLucLuiLil4 -D SAE23 -e "$query")
	idmesu=$(echo ${idmesu} | sed 's/.\{6\}//')

	query="INSERT INTO \`Valeur\` (\`idcap\`, \`idmesu\`, \`value\`) VALUES ($idcap, $idmesu, $value);"
	/opt/lampp/bin/mysql -h localhost -u lmll -pMatLucLuiLil4 -D SAE23 -e "$query"
done
