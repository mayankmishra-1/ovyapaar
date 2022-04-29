create table customer
(
cust_id int primary key,
f_name varchar(50) not null,
m_name varchar(50),
l_name varchar(50),
locality varchar(100) not null,
city varchar(100) not null,
state varchar(100) not null,
country varchar(100) not null,
dob Date not null,
number char(10),
mail varchar(50) not null,
password varchar(100) not null
);

ALTER TABLE ovyapaar ADD CONSTRAINT UNIQUE(number);
ALTER TABLE ovyapaar ADD CONSTRAINT UNIQUE(mail);