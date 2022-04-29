create table product
(
product_id int primary key,
p_name varchar(50) not null,
unit varchar(50) not null,
p_desc varchar(150) not null,
p_image blob not null,
category varchar(50) not null
);