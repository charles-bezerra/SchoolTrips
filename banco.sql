drop database schooltrips;

create database schooltrips;
use schooltrips;

create table Usuario
(
	matricula varchar(25) primary key,
    senha varchar(50) not null unique,
    nome varchar(120) not null,
    email varchar(130) not null,
    campus varchar(50) not null
);
create table Administrador(
	matricula varchar(25) primary key,
	senha varchar(50) not null unique,
    nome varchar(120) not null
);
create table Onibus(
	id integer primary key auto_increment,
    placa varchar(20),
    lugares integer not null, 
	marca varchar(25)
);
create table Agendamento
(
	id integer primary key auto_increment,
    cod_usuario varchar(25) not null,
    cod_onibus integer not null,
    data_saida varchar(10) not null,
    quantidade_dias integer not null,
	quantidade_ocupantes integer not null,
    aprovacao varchar(15) not null,
    detalhes varchar(500) not null,
    destino varchar(30) not null,
    foreign key (cod_usuario) references Usuario(matricula),
    foreign key (cod_onibus) references Onibus(id)
);
	
insert into Onibus (placa,lugares,marca) values ('1124BBC',40,'Volkswagen');
insert into Agendamento (cod_usuario,cod_onibus,data_saida,quantidade_dias,quantidade_ocupantes,aprovacao,detalhes,destino) values ('20151104010436',1,'23/09/2018',4,23,'Em processo', 'dnklendklenekldnekldn', 'Recife-PE');
select * from Onibus;

insert into Administrador values ('20183005149','12345678','Admin');

SELECT u.nome, u.matricula, a.data_saida, a.quantidade_ocupantes, a.quantidade_dias, o.marca, o.placa, a.destino, a.id FROM Usuario AS u, Agendamento AS a, Onibus AS o WHERE a.cod_usuario = u.matricula AND a.cod_onibus = o.id AND a.aprovacao = 'Em processo' GROUP BY u.nome, a.data_saida ORDER BY STR_TO_DATE(data_saida,'%d-%m-%Y') DESC;
select * from Usuario;
select * from Agendamento;
select * from Onibus;
select * from Usuario u where u.matricula = 20151104010436 or u.senha = 'jun';

UPDATE Agendamento SET aprovacao = 'Aprovado' WHERE id = 1;
SELECT u.nome, u.matricula, a.data_saida, a.quantidade_ocupantes, a.quantidade_dias, o.marca, o.placa, a.destino, a.id FROM Usuario AS u, Agendamento AS a, Onibus AS o WHERE a.cod_usuario = u.matricula AND a.cod_onibus = o.id AND a.aprovacao = 'Em processo' AND a.data_saida LIKE '2018-09%';
SELECT u.nome, u.matricula, a.data_saida, a.quantidade_ocupantes, o.marca, o.placa, a.destino FROM Usuario AS u, Agendamento AS a, Onibus AS o WHERE a.cod_usuario = u.matricula AND a.cod_onibus = o.id AND a.aprovacao = 'Aprovado' AND  a.data_saida LIKE '2018-09%' GROUP BY u.nome, a.data_saida ORDER BY STR_TO_DATE(data_saida,'%d-%m-%Y') DESC