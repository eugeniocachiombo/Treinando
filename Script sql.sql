create database cach;

use cach;

create table cadastro (
id int primary key auto_increment,
nome varchar(50) ,
bi int ,
idade int ,
genero varchar(50),
categoria varchar(50)
);

select * from cadastro;

drop table sms;

create table cadastroProduto (
codProd int primary key auto_increment,
nomeProd varchar(50) ,
tipoProd varchar(50),
preco float
);

create table sms (
id int primary key  auto_increment,
n int,
sms varchar(2000)
);


