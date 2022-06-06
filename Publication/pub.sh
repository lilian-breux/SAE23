#!/bin/bash
#__________________________________________________#
#
#Publication of data
#
#__________________________________________________#

sleep 1
#Batiment R&T
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh RT E208 temperature
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh RT E208 co2
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh RT E208 luminosite
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh RT E207 temperature
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh RT E207 co2
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh RT E207 luminosite

#Batiment Informatique

bash /home/lilian/Bureau/SAE23/Publication/capteur.sh INFO B208 temperature
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh INFO B208 co2
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh INFO B208 luminosite
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh INFO B207 temperature
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh INFO B207 co2
bash /home/lilian/Bureau/SAE23/Publication/capteur.sh INFO B207 luminosite
