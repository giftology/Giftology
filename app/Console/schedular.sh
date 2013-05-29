#!/bin/bash


newsletter_id=$(echo "select id from weekly_newsletter where scheduled_time = (DATE('Y-m-d H:i:s')) order by id ASC;" | mysql -h giftology.cck6cwihhy4y.ap-southeast-1.rds.amazonaws.com -u root -pgiftology251 -B --disable-column-names giftology)

do
    curl http://www.giftology.com/weeklynewsletter/newsletter/$newsletter_id
done