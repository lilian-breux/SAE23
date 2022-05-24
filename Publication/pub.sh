#!/bin/bash
#__________________________________________________#
#
#Publication of data
#
#__________________________________________________#

#Batiment R&T
bash capteur.sh RT E208 temperature
bash capteur.sh RT E208 co2
bash capteur.sh RT E208 luminosite
bash capteur.sh RT E207 temperature
bash capteur.sh RT E207 co2
bash capteur.sh RT E207 luminosite

#Batiment Informatique

bash capteur.sh INFO B208 temperature
bash capteur.sh INFO B208 co2
bash capteur.sh INFO B208 luminosite
bash capteur.sh INFO B207 temperature
bash capteur.sh INFO B207 co2
bash capteur.sh INFO B207 luminosite
