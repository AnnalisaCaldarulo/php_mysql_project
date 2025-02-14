DROP TABLE IF EXISTS users;
CREATE TABLE users(
    id integer primary key autoincrement not null,
    fullname varchar not null,
    email varchar not null,
    password varchar not null,
);