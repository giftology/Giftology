CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    role VARCHAR(20),
    facebook_id BIGINT(20) unsigned NOT NULL,
    utm_source VARCHAR(50),
    utm_medium VARCHAR(50),
    utm_campaign VARCHAR(50),
    utm_term VARCHAR(50),
    utm_content VARCHAR(50),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE offers (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    terms TEXT,
    image varchar(20) NOT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL    
);

CREATE TABLE gifts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender_id INT unsigned NOT NULL,
    receiver_id INT unsigned NOT NULL,
    offer_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL    
);
