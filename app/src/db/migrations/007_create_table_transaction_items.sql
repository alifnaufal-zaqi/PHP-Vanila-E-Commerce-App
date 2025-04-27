CREATE TABLE transaction_items (
    id_item SERIAL PRIMARY KEY,
    id_transaction CHAR(30) NOT NULL,
    id_product CHAR(30) NOT NULL,
    quantity INT NOT NULL,
    price_per_item INT NOT NULL,
    CONSTRAINT fk_item_transaction FOREIGN KEY (id_transaction) REFERENCES transactions(id_transaction),
    CONSTRAINT fk_item_product FOREIGN KEY (id_product) REFERENCES products(id_product)
);
