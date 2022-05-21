create table payment
(
    p_id int primary key AUTO_INCREMENT,
    o_id int not null,
    FOREIGN KEY (o_id) REFERENCES orders(o_id),
    mode_of_payment varchar(50) not null,
    reference_no int not null,
    amount int not null
);