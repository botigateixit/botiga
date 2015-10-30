#!/bin/bash

export TZ="/usr/share/zoneinfo/Europe/Madrid"

hora=$(date +%H)
dia=$(date +%u)

if [ "$hora" -eq "01" ]; then
   php ${OPENSHIFT_REPO_DIR}/txtdltrr/Correu.php
   date >> ${OPENSHIFT_PHP_LOG_DIR}/test.log
   echo "Enviament de correu"  >> ${OPENSHIFT_PHP_LOG_DIR}/test.log
	if [ "$dia" -eq "01" ]; then
	   echo "Avui es dilluns"  >> ${OPENSHIFT_PHP_LOG_DIR}/test.log
	fi
else
   date >> ${OPENSHIFT_PHP_LOG_DIR}/test.log
fi
