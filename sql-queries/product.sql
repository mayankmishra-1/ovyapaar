create table product
(
product_id int primary key AUTO_INCREMENT,
p_name varchar(50) not null,
unit varchar(50) not null,
p_price varchar(50) not null,
p_desc varchar(150) not null,
p_image blob,
category varchar(50) not null
);