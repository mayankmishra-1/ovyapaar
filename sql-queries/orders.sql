create table orders
(
    o_id int primary key AUTO_INCREMENT,
    o_date date not null,
    o_time time not null,
    cust_id int not null,
    s_id int not null,
    FOREIGN KEY (cust_id) REFERENCES customer(cust_id),
    FOREIGN KEY (s_id) REFERENCES seller(s_id)
);
ALTER TABLE Orders
    -> ADD FOREIGN KEY (s_id) REFERENCES seller(s_id);
    ALTER TABLE Orders
    -> ADD FOREIGN KEY (cust_id) REFERENCES customer(cust_id);