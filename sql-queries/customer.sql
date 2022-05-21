create table customer
(
cust_id int primary key AUTO_INCREMENT,
f_name varchar(50) not null,
m_name varchar(50),
l_name varchar(50),
locality varchar(100) not null,
city varchar(100) not null,
state varchar(100) not null,
country varchar(100) not null,
dob Date not null,
number char(10) not null UNIQUE,
mail varchar(50) not null UNIQUE,
password varchar(100) not null
);
