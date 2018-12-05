create database nombrebd
  default character set utf8
  collate utf8_general_ci;



create user usuariobd@localhost
  identified by 'clavebd';

grant all
  on nombrebd.*
  to usuariobd@localhost;

flush privileges;


create table producto (
    id bigint not null auto_increment primary key,
    nombre varchar(30) not null,
    precio numeric(10,3) not null,
    observaciones text
) engine = innodb
  character set utf8
  collate utf8_general_ci;
  
  
  
  
  create table fecha (
    id bigint not null auto_increment prima22ry key,
    fecha date,
    fechahora datetime,
    marcatiempo timestamp default current_timestamp on update current_timestamp
) engine = innodb
  character set utf8
  collate utf8_general_ci;
  
  
  
  create table usuario (
    id bigint not null auto_increment  primary key,
    correo varchar(60) not null unique,
    alias varchar(30) unique null,
    nombre varchar(30) not null,
    clave varchar(255) not null,
    activo bit(1) not null default 0,
    fechaalta timestamp default current_timestamp,
    admin bit(1) not null default 0
) engine = innodb
  character set utf8
  collate utf8_general_ci;
  
/*curdate,curtime,current_timestamp,now

insert into fecha values(null,curdate(),now(),null)
*/