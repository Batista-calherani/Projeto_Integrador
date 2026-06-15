use Empresa;

alter table profissionais
add column if not exists cpf varchar(14) not null after Idade;

alter table profissionais
add column if not exists Ativo bool not null default 0 after contrato;

alter table profissionais
add column if not exists Obra_Local varchar(100) after descri;
