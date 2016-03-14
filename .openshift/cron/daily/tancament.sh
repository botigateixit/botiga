#!/bin/bash

export TZ="/usr/share/zoneinfo/Europe/Madrid"

dia=$(date +%u)

if [ "$dia" -eq "04" ]; then
   cd ${OPENSHIFT_REPO_DIR}/txtdltrr
   php tancament.php
fi
