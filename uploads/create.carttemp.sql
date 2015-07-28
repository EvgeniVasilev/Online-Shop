
create table if not exists carttemp(
carttemp_hidden int (10) not null auto_increment,
carttemp_sess char (50) not null,
carttemp_prod_id int (11) not null,
carttemp_quan int (11) not null,
primary key (carttemp_hidden),
key (carttemp_sess)
)