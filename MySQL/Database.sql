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
acesso varchar(20) not null,
pass varchar(255) not null,
Foto_perfil Varchar(255) default null,
Telefone varchar(20) default null,
localizacao varchar(100) default null,
primary key(id_user)
);

insert into access (acesso,user,email,pass) values ('ADM','Administrador','ADM@gmail.com','$2a$12$0D0MhlhdoUew8gqPDx4vGOgSI.08jLWG7Lj/RViyxeb9.31d4G.3i');

drop table access;
truncate table profissionais;
SELECT * from access;