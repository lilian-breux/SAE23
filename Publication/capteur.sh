#!/bin/bash
#__________________________________________________#
#
#Publication of data
#
#__________________________________________________#
sleep 1
if [ $3 == temperature ]
then
	temp=$(( $RANDOM % 11 + 19 ))
	mosquitto_pub -h localhost -p 1883 -m "{\"bate\":\"$1\",\"room\":\"$2\",\"type\":\"$3\",\"value\":$temp,\"date\":\"$(date +"%Y-%m-%d")\",\"hours\":\"$(date +%T)\"}" -t iut/$1/$2/$3
elif [ $3 == luminosite ]
then
	co2=$(( $RANDOM % 200 + 600 ))
	mosquitto_pub -h localhost -p 1883 -m "{\"bate\":\"$1\",\"room\":\"$2\",\"type\":\"$3\",\"value\":$co2,\"date\":\"$(date +"%Y-%m-%d")\",\"hours\":\"$(date +%T)\"}" -t iut/$1/$2/$3
elif [ $3 == co2 ]
then
	lum=$(( $RANDOM % 30 + 55 ))
	mosquitto_pub -h localhost -p 1883 -m "{\"bate\":\"$1\",\"room\":\"$2\",\"type\":\"$3\",\"value\":$lum,\"date\":\"$(date +"%Y-%m-%d")\",\"hours\":\"$(date +%T)\"}" -t iut/$1/$2/$3
else
	:
fi
