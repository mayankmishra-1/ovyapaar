CREATE TABLE cart
(
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    cust_id INT,
    product_id INT,
    quantity INT,
    CONSTRAINT fk_cart_cust_id FOREIGN KEY (cust_id) REFERENCES customer (cust_id), 
    CONSTRAINT fk_cart_product_id FOREIGN KEY (product_id) REFERENCES product (product_id)
);