create table orderdetail
(
    o_id int,
    product_id int,
    quantity int not null,
    rate int not null,
    primary key(o_id,product_id),
    foreign key (o_id) references orders(o_id),
    foreign key (product_id) references product(product_id) 
);