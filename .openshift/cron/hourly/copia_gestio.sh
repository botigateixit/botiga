#!/bin/bash

export TZ="/usr/share/zoneinfo/Europe/Madrid"

hora=$(date +%H)
dia=$(date +%u)

# Ho executarem cada dia a les 00 hores
if [ "$hora" -eq "00" ]; then
   rm -rf ${OPENSHIFT_PHP_LOG_DIR}gestio
   cp -r ${OPENSHIFT_REPO_DIR}gestio ${OPENSHIFT_LOG_DIR}
   date >> ${OPENSHIFT_PHP_LOG_DIR}copia_gestio.log
   echo "Copia del directori gestio"  >> ${OPENSHIFT_PHP_LOG_DIR}copia_gestio.log
else
   date >> ${OPENSHIFT_PHP_LOG_DIR}copia_gestio.log
fi
