uname='root'
pname='condevsbp2014'

newname=`date '+%Y%m%d'`
dbname='dbcustomer'

mysqldump -u $uname -pcondevsbp2014 $dbname > /opt/backup_database/$dbname/$newname.sql 2>&1