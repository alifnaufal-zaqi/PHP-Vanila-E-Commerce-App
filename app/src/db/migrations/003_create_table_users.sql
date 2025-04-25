CREATE TABLE users (
    id_user CHAR(30) PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(60) NOT NULL,
    role VARCHAR(10) NOT NULL
);