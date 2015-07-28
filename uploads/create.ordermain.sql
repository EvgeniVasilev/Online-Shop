create table if not exists ordermain(
ordermain_ordernum int (11) not null auto_increment,
ordermain_orderdate date not null,
ordermain_cusum int (11) not null,
ordermain_subtotal DEC (7,2) not null,
ordermain_shipping DEC (6,2) not null,
ordermain_tax DEC (6,2) not null,
ordermain_total DEC (7,2) not null,
ordermain_shipfirst varchar (50) not null,
ordermain_shiplast varchar (50) not null,
ordermain_shipcompay varchar (50) not null,
ordermain_shipadd1 varchar (50) not null,
ordermain_shipadd2 varchar(50) not null,
ordermain_shipcity varchar (50) NOT NULL,
ordermain_shipzip varchar (50) not null,
ordermain_shipphone varchar (50) not null,
ordermain_shipemail varchar (50) not null,
Primary Key(ordermain_ordernum)
)