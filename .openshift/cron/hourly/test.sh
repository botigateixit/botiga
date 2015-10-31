#!/bin/bash

export TZ="/usr/share/zoneinfo/Europe/Madrid"

hora=$(date +%H)
dia=$(date +%u)

if [ "$hora" -eq "00" ]; then
   cd ${OPENSHIFT_REPO_DIR}/txtdltrr
   php Correu.php
   date >> ${OPENSHIFT_PHP_LOG_DIR}/test.log
   echo "Enviament de correu"  >> ${OPENSHIFT_PHP_LOG_DIR}/test.log
	if [ "$dia" -eq "01" ]; then
	   echo "Avui es dilluns"  >> ${OPENSHIFT_PHP_LOG_DIR}/test.log
	fi
else
   date >> ${OPENSHIFT_PHP_LOG_DIR}/test.log
fi
