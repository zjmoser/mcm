DROP TABLE tbl_user;
DROP TABLE market_daily;

CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL UNIQUE,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL
);

CREATE TABLE market_daily (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date_recorded DATE NOT NULL,
    ticker VARCHAR(128) NOT NULL,
    close_price FLOAT NOT NULL,
    UNIQUE(date_recorded, ticker)
) ENGINE=InnoDB;

INSERT INTO tbl_user (username, password, email) VALUES ('zane', 'password', 'zjmoser@gmail.com');
