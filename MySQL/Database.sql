use Empresa;

create table if not exists profissionais(
id_Prof int auto_increment,
Nome varchar(100) not null,
cargo varchar(100) default 'Servente',
Agenda date not null,
contrato bool not null default 0,
Foto varchar(255),
Status varchar(100) default "Disponivel",
Salario decimal(10,2) default '1518.05',
Tefone varchar(20),
Email varchar(100),
tempo varchar(10),
descri varchar(500),
primary key(id_Prof)
);

create table if not exists access(
id_user int auto_increment,
user varchar(100) not null,
email varchar(50) not null,
pass varchar(255) not null,
primary key(id_user)
);
drop table access;
truncate table profissionais;
SELECT * from access;