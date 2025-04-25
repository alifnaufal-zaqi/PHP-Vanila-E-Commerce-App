CREATE TABLE products(
    id_product CHAR(20),
    product_category INT NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    product_description TEXT NOT NULL,
    products_price INT NOT NULL,
    products_stock INT NOT NULL,
    product_image VARCHAR(100) NOT NULL,

    PRIMARY KEY(id_product),
    CONSTRAINT fk_category
        FOREIGN KEY(product_category)
            REFERENCES categorys(id_category)
);