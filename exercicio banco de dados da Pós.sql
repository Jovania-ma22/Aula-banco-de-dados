create DATABASE EMPRESA;
USE EMPRESA;

create table PLANTA (
idPlanta int primary key not null auto_increment,
nome varchar(100) not null,
cnpj varchar(15) not null,
idEmpresa int null default null

);
select * from PLANTA;

insert into planta(nome,cnpj)
values('Fametro-Matriz','03817341000142');
insert into planta(nome,cnpj,idEmpresa)
values ('Fametro-zs','02817341000132',1);

alter table PLANTA ADD foreign key (idEmpresa)
references PLANTA(idPlanta);
alter table PLANTA ADD unique(nome,cnpj);
select*from planta;


create table HORARIO(
idHorario int not null auto_increment,
horaInicio time not null,
horaFim time not null,
primary key(idHorario));

alter table HORARIO add constraint UC_horario unique(horaInicio,horaFim);
insert into HORARIO (horaInicio,horaFim)
value('07:00','17:00');

insert into HORARIO(horaInicio,horaFIm)
value('08:00','18:00');

insert into HORARIO(horaInicio,horaFim)
value('08:00','12:00');
select*from horario;

create table CARGO (
idCargo int not null,
descricao varchar(50) not null unique,
valor decimal(10,2) not null
);

alter table CARGO add constraint primary key (idCargo);
alter table CARGO
change idCargo
idCargo int not null auto_increment;
select *from cargo;
insert into CARGO(descricao,valor)
value('Gerente de TI','18.000');

insert into CARGO (descricao,valor)
value ('Analista','20.000');
select*from cargo


Continuação da aula sábado 13/08/2022

create table funcionario (
idFuncionario int not null auto_increment primary key,
idPlanta int not null,
idDepartamento int not null,
idCargo int not null,
chapa varchar(10) not null unique,
nome varchar(60) not null,
foreign key (idDepartamento) references departamento(idDepartamento),
foreign key (idPlanta) references planta(idPlanta),
foreign key (idCargo) references cargo (idCargo)
);

insert into funcionario value
(null,1,1,1,'5351', 'Jurema');

select * from funcionario;


alter table funcionario
add column valorHora decimal(10,2) not null;

alter table funcionario
add column valorMae varchar(60) not null;

select * from funcionario;

alter table funcionario;


update funcionario set valorHora = 6.5
where idFuncionario=1;

 alter table funcionario
 drop column valorMae;
 select * from funcionario;
 
 create table dependente(
 idDependente int not null auto_increment primary key,
 idFuncionario int not null,
 nome varchar(60) not null,
 foreign key(idFuncionario) references funcionario (idFuncionario) 
 );

 alter table funcionario
 add column idJornada int,
 add constraint foreign key (idJornada) references jornada(idJornada);
 
 create table registroPonto( 
 idRegistroPonto int not null auto_increment primary key,
 idFuncionario int not null,
 dataHora datetime not null default now(),
 abonado boolean not null default 0,
 foreign key (idFuncionario) references funcionario(idFuncionario)
 
 );
 insert into funcionario value
 (null,1,1,1,'5351', 'Funcionario1');
 select * from funcionario;


 alter table funcionario
 add column valorHora decimal(10,2) not null;

alter table funcionario
add column valorMae varchar(60) not null;
 select * from funcionario;

 alter table funcionario;


 update funcionario set valorHora = 6.5
 where idFuncionario=1;

  alter table funcionario
  drop column valorMae;
  select * from funcionario;
 
  CREATE TABLE `jornadahorario` (
   idJornadaHorario` int NOT NULL AUTO_INCREMENT,
   idJornada` int NOT NULL,
   idHorario` int NOT NULL,
   dia` enum('1','2','3','4','5','6','7') NOT NULL,
   PRIMARY KEY (`idJornadaHorario`),
   KEY `idJornada` (`idJornada`),
   KEY `idHorario` (`idHorario`),
   CONSTRAINT `jornadahorario_ibfk_1` FOREIGN KEY (`idJornada`) REFERENCES `jornada` (`idJornada`),
   CONSTRAINT `jornadahorario_ibfk_2` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`)
 ); 
 DELIMITER $

-- CREATE FUNCTION criaChapaFuncionario()
-- RETURNS VARCHAR(6)

-- BEGIN
	-- DECLARE chapa_parte1 varchar(4);
	-- 	DECLARE qtdFuncMes int;
		-- 	DECLARE qtdFuncMesformadato varchar(3);

-- SET chapa_parte1 = date_format(now(), '%y%m');
		-- SET quantidadeFuncionarioMes = 
		-- 	(select count(*)+1 from funcionario 
				-- where dt_admissao between 
					-- date_format(now(), '%Y-%m-01') and last_day(now()));
	
			-- set quantidadeMesFormatado =  LPAD(quantidadeFuncionarioMes,3,0);
    
		-- return concat(chapa_parte1,quantidadeFuncionarioMes);

-- END$


-- DELIMITER ;--
 
 
 

