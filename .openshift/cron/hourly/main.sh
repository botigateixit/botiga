#!/bin/bash

export TZ="/usr/share/zoneinfo/Europe/Madrid"

hora=$(date +%H)
dia=$(date +%u)

if [ "$hora" -eq "00" ]; then
	if [ "$dia" -eq "01" ]; then
	   cd ${OPENSHIFT_REPO_DIR}/txtdltrr
	   php main.php
	fi
fi
