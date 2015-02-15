NOW=$(date +"%Y%m%d")
BACKUP="/path/to/backup/dir"
MYSQL=`which mysql`
MYSQLDUMP=`which mysqldump`
GZIP="$(which gzip)"
MHOST="localhost"
MUSER="root"
MPASS="root"

# Get databases
DBS="$($MYSQL -u $MUSER -h $MHOST -p$MPASS -Bse 'show databases')"
for DB in $DBS
do
  echo "Backup up $DB"
  FILE=$BACKUP/$DB.$NOW.gz
  $MYSQLDUMP -u $MUSER -h $MHOST -p$MPASS $DB | $GZIP -9 > $FILE
done
