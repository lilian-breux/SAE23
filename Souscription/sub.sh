#!/bin/bash
#__________________________________________________#
#
#Transmition of data
#
#__________________________________________________#
nbr_of_values=12 #number of values wanted t

echo "$(mosquitto_sub -h localhost -p 1883 -t iut/# -C $nbr_of_values)" > temp.json

nbrlignes=$(wc -l temp.json | cut -f1 -d' ') #numbers of lines of a file
for (( i=1; i<=$nbrlignes; i++ ))
do
	value=$(sed -n "${i}p" "temp.json" | jq '.value')
	bate=$(sed -n "${i}p" "temp.json" | jq '.bate' | tr -d \")
	room=$(sed -n "${i}p" "temp.json" | jq '.room' | tr -d \")
	date=$(sed -n "${i}p" "temp.json" | jq '.date' | tr -d \")
	hours=$(sed -n "${i}p" "temp.json" | jq '.hours' | tr -d \")
	type=$(sed -n "${i}p" "temp.json" | jq '.type' | tr -d \")
	#echo "En $bate dans la salle $room à $hours le $date, il y a $value de $type"
	
	query="INSERT INTO \`Mesure\` (\`bate\`, \`room\`, \`type\`, \`date\`, \`hours\`, \`value\`, \`id\`) VALUES ('$bate', '$room', '$type', '$date', '$date $hours', '$value', NULL);"
	mysql --host=fdb31.eohost.com --port=3306 --user=3953973_lmll -pMatLucLuiLil4 mysql -e "$query";
done
