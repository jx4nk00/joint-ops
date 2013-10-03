CREATE TABLE bancos (
  id_banco NUMERIC NOT NULL ,
  nombre_banco NUMERIC NULL,
  PRIMARY KEY(id_banco)
);

CREATE TABLE codigos_servicio (
  id_codigo NUMERIC NOT NULL ,
  id_miembros INT NOT NULL,
  id_miembro NUMERIC NULL,
  codigo VARCHAR(30) NULL,
  f_creacion DATE NULL,
  PRIMARY KEY(id_codigo, id_miembros),
  INDEX codigos_servicio_FKIndex1(id_miembros)
);

CREATE TABLE datos_miembros (
  id_datos NUMERIC NOT NULL ,
  telefono VARCHAR(10) NULL,
  correo VARCHAR(30) NULL,
  cta_corriente VARCHAR(50) NULL,
  activo NUMERIC NULL,
  PRIMARY KEY(id_datos)
);

CREATE TABLE liquidaciones (
  id_liquidaciones NUMERIC NOT NULL ,
  nombre_servicio VARCHAR(30) NULL,
  id_codigo NUMERIC NULL,
  referencia_cte VARCHAR(50) NULL,
  lugar_servicio VARCHAR(50) NULL,
  inspectores VARCHAR(50) NULL,
  participantes VARCHAR(50) NULL,
  PRIMARY KEY(id_liquidaciones)
);

CREATE TABLE mensajes (
  id_mensaje NUMERIC NOT NULL ,
  mensaje VARCHAR(200) NULL,
  PRIMARY KEY(id_mensaje)
);

CREATE TABLE miembros (
  id_miembros INT NOT NULL ,
  id_banco NUMERIC NOT NULL,
  id_privilegio NUMERIC NOT NULL,
  id_usuarios NUMERIC NOT NULL,
  id_datos NUMERIC NOT NULL,
  p_nombre VARCHAR(10) NULL,
  s_nombre VARCHAR(10) NULL,
  apellido_p VARCHAR(20) NULL,
  apellido_m VARCHAR(20) NULL,
  rut VARCHAR(10) NULL,
  f_nac DATE NULL,
  f_creacion DATE NULL,
  activo INT NULL,
  PRIMARY KEY(id_miembros),
  INDEX miembros_FKIndex1(id_datos),
  INDEX miembros_FKIndex2(id_usuarios),
  INDEX miembros_FKIndex3(id_privilegio),
  INDEX miembros_FKIndex4(id_banco)
);

CREATE TABLE privilegios (
  id_privilegio NUMERIC NOT NULL ,
  nombre_privilegio NUMERIC NULL,
  tipo NUMERIC NULL,
  PRIMARY KEY(id_privilegio)
);

CREATE TABLE registros (
  id_registro NUMERIC NOT NULL ,
  id_miembro NUMERIC NULL,
  detalle VARCHAR(200) NULL,
  PRIMARY KEY(id_registro)
);

CREATE TABLE usuarios (
  id_usuarios NUMERIC NOT NULL ,
  username VARCHAR(10) NULL,
  pass VARCHAR(20) NULL,
  activo NUMERIC NULL,
  PRIMARY KEY(id_usuarios)
);

