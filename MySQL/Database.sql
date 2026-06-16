use Empresa;

create table if not exists profissionais(
id_Prof int auto_increment,
Nome varchar(100) not null,
cpf varchar(14) not null unique,
cargo varchar(100) default 'Servente',
Agenda date not null,
Local varchar(100) not null,
Obra_Local varchar(100) default null,
Idade int not null,
contrato bool not null default 0,
Ativo bool not null default 0,
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
cpf varchar(14) null,
acesso varchar(20) not null,
pass varchar(255) not null,
Foto_perfil Varchar(255) default null,
Telefone varchar(20) default null,
localizacao varchar(100) default null,
primary key(id_user)
);


INSERT INTO profissionais
(Nome, cpf, cargo, Agenda, Local, Obra_Local, Idade, contrato, Ativo, Foto, Status, Salario, Tefone, Email, tempo, descri)
VALUES
('Carlos Henrique Souza',
'123.456.789-01',
'Servente',
'2026-06-20',
'Campinas - SP',
'Residencial Jardim das Flores',
28,
0,
0,
'img/teste_imagem.png',
'Disponivel',
1800.00,
'(19) 99123-4567',
'carlos.souza@email.com',
'2 anos',
'Profissional dedicado, experiência em apoio a obras residenciais e organização de materiais.'
),
(
'João Pedro Almeida',
'234.567.890-12',
'Servente',
'2026-06-22',
'Valinhos - SP',
'Condomínio Parque Verde',
24,
0,
0,
'img/teste_imagem.png',
'Disponivel',
1850.00,
'(19) 99234-5678',
'joao.almeida@email.com',
'3 anos',
'Experiência em transporte de materiais, preparação de concreto e suporte à equipe de construção.'
),
(
'Marcos Antônio Ferreira',
'345.678.901-23',
'Pedreiro',
'2026-06-18',
'Vinhedo - SP',
'Edifício Central Business',
39,
0,
0,
'img/teste_imagem.png',
'Disponivel',
3500.00,
'(19) 99345-6789',
'marcos.ferreira@email.com',
'15 anos',
'Especialista em alvenaria estrutural, revestimentos e acabamento de alto padrão.'
),
(
'Roberto Silva Santos',
'456.789.012-34',
'Pedreiro',
'2026-06-19',
'Louveira - SP',
'Residencial Bosque Azul',
42,
0,
0,
'img/teste_imagem.png',
'Disponivel',
3700.00,
'(19) 99456-7890',
'roberto.santos@email.com',
'18 anos',
'Profissional com ampla experiência em construção residencial e comercial.'
),
(
'José Carlos Oliveira',
'567.890.123-45',
'Mestre',
'2026-06-17',
'Campinas - SP',
'Shopping Nova Campinas',
51,
0,
0,
'img/teste_imagem.png',
'Disponivel',
7500.00,
'(19) 99567-8901',
'jose.oliveira@email.com',
'28 anos',
'Responsável por coordenação de equipes, planejamento e acompanhamento de cronogramas de obras.'
),
(
'Antônio Mendes Pereira',
'678.901.234-56',
'Mestre',
'2026-06-21',
'Valinhos - SP',
'Centro Empresarial Horizonte',
48,
0,
0,
'img/teste_imagem.png',
'Disponivel',
7800.00,
'(19) 99678-9012',
'antonio.pereira@email.com',
'25 anos',
'Experiência em gestão de grandes obras, controle de qualidade e liderança de equipes multidisciplinares.'
);

insert into access (acesso,user,email,pass,cpf) values ('ADM','Administrador','ADM@gmail.com','$2a$12$0D0MhlhdoUew8gqPDx4vGOgSI.08jLWG7Lj/RViyxeb9.31d4G.3i','034.821.324-29');

drop table access;
drop table profissionais;
truncate table profissionais;
SELECT * from access;
