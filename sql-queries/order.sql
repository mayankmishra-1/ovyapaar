create table orders
(
    o_id int primary key,
    o_date date not null,
    o_time time not null,
    cust_id int not null,
    s_id int not null
);