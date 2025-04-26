CREATE TYPE user_gender AS ENUM ('male', 'female');

CREATE TABLE user_profiles (
    id_profile SERIAL,
    id_user CHAR(30) NOT NULL,
    phone CHAR(15),
    address TEXT,
    profile_picture VARCHAR(100),
    gender user_gender,

    PRIMARY KEY(id_profile),
    CONSTRAINT fk_user
        FOREIGN KEY(id_user)
            REFERENCES users(id_user)
);