CREATE TABLE transactions (
    id_transaction CHAR(30) PRIMARY KEY,
    id_user CHAR(30) NOT NULL,
    transaction_date timestamp DEFAULT CURRENT_TIMESTAMP,
    total_amount INT NOT NULL,
    CONSTRAINT fk_transaction_user FOREIGN KEY (id_user) REFERENCES users(id_user)
);
