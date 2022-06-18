#!/bin/bash
#__________________________________________________#
#
#Publication of data
#
#__________________________________________________#
sleep 1 #Wait a second to avoid data sending problems 
if [ $3 == temperature ]
then
	temp=$(( $RANDOM % 11 + 19 )) #Random number between 19 and 30
	mosquitto_pub -h localhost -p 1883 -m "{\"bate\":\"$1\",\"room\":\"$2\",\"type\":\"$3\",\"value\":$temp,\"date\":\"$(date +"%Y-%m-%d")\",\"hours\":\"$(date +%T)\"}" -t iut/$1/$2/$3 #Send data in a json format
elif [ $3 == luminosite ]
then
	co2=$(( $RANDOM % 200 + 600 )) #Random number between 600 and 800
	mosquitto_pub -h localhost -p 1883 -m "{\"bate\":\"$1\",\"room\":\"$2\",\"type\":\"$3\",\"value\":$co2,\"date\":\"$(date +"%Y-%m-%d")\",\"hours\":\"$(date +%T)\"}" -t iut/$1/$2/$3 #Send data in a json format
elif [ $3 == co2 ]
then
	lum=$(( $RANDOM % 30 + 55 )) #Random number between 55 and 85
	mosquitto_pub -h localhost -p 1883 -m "{\"bate\":\"$1\",\"room\":\"$2\",\"type\":\"$3\",\"value\":$lum,\"date\":\"$(date +"%Y-%m-%d")\",\"hours\":\"$(date +%T)\"}" -t iut/$1/$2/$3 #Send data in a json format
else
	:
fi
