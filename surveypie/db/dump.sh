#!/bin/sh
HOST="192.168.1.200"
USER="dev"
DB="diaochapai.feedback"

echo "${USER}@${HOST}/${DB}"
pg_dump -U $USER -h $HOST -O -x -s -f structure.sql $DB
