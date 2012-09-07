#!/bin/bash

users=$(echo "SELECT id FROM users" | /Applications/MAMP/Library/bin/mysql -uroot -proot -B --disable-column-names giftology)

for user in $users
do
    curl http://localhost/reminders/send_reminder_email_for_user/$user
done
