#!/bin/bash
#__________________________________________________#
#
#Transmition of data
#
#__________________________________________________#

#185.176.40.25

query="INSERT INTO \`Mesure\` (\`id\`, \`bate\`, \`room\`, \`type\`, \`date\`, \`hours\`, \`value\`) VALUES (NULL, 'RT', 'R208', 'co2', '2022-05-26', '2022-05-26 08:32:00', '730');"
mysql -h fdb31.eohost.com --port=3306 -u 3953973_lmll -pMatLucLuiLil4 mysql -e "$query";

