#!/bin/bash

users=$(echo "SELECT DISTINCT user_id FROM  reminders  WHERE DAYOFWEEK( CURDATE( ) ) - DAYOFWEEK(  friend_birthday ) = -2 and user_id > 0 AND MONTH(  friend_birthday ) = MONTH( CURDATE( ) ) and WEEK(friend_birthday >= week(CURDATE());" | mysql -h giftology.cck6cwihhy4y.ap-southeast-1.rds.amazonaws.com -u root -pgiftology251 -B --disable-column-names giftology)

for user in $users
do
    curl http://www.giftology.com/reminders/send_reminder_email_for_user/$user
done
