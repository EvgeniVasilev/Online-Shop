create table if not exists customers(
    customers_custnum int (11) not null auto_increment,
    customers_firstname varchar (12) not null,
    customers_lastname varchar (50) not null,
    customers_add1 varchar (50) not null,
    customers_add2 varchar (50),
    customers_city varchar (50) not null,
    customers_zip varchar (50) not null,
    customers_phone varchar (50) not null,
    customers_email varchar (50) not null,
    Primary Key (customers_custnum)
)