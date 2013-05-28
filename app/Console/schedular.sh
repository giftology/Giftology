#!/bin/bash

users=$(echo "select id from users where id % 5 = (DAYOFWEEK(CURDATE())-2) order by id ASC;" | mysql -h giftology.cck6cwihhy4y.ap-southeast-1.rds.amazonaws.com -u root -pgiftology251 -B --disable-column-names giftology)

for user in $userid
do
    curl http://www.giftology.com/reminders/send_reminder_email_for_user/$userid
done