drop table if exists t_imp;

create table imp (
imp_id integer not null primary key auto_increment,
imp_name varchar(50) not null,
imp_ip varchar(50) not null,
imp_location varchar(100) not null,
ipm_achat varchar(10) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table t_user (
    usr_id integer not null primary key auto_increment,
    usr_name varchar(50) not null,
    usr_password varchar(88) not null,
    usr_salt varchar(23) not null,
    usr_role varchar(50) not null 
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table cartridge (
    car_id integer not null primary key auto_increment,
    car_printerstype varchar(100) not null,
    car_inktype varchar(88) not null,
    car_inkname varchar(23) not null,
    car_quantite integer not null 
) engine=innodb character set utf8 collate utf8_unicode_ci;