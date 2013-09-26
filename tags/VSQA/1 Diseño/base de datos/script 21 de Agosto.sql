CREATE TABLE anticipos (
  id_anticipos int(3) NOT NULL AUTO_INCREMENT,
  id_miembros int(3) NOT NULL,
  id_liquidaciones int(3) NOT NULL,
  valor_anticipo int(3) NULL,
  PRIMARY KEY(id_anticipos),
  INDEX anticipos_FKIndex1(id_liquidaciones),
  INDEX anticipos_FKIndex2(id_miembros)
);

CREATE TABLE bancos (
  id_banco int(3) NOT NULL AUTO_INCREMENT,
  nombre_banco int(3) NULL,
  PRIMARY KEY(id_banco)
);

CREATE TABLE codigos_servicio (
  id_codigo int(3) NOT NULL AUTO_INCREMENT,
  id_miembros int(3) NOT NULL,
  codigo VARCHAR(30) NULL,
  f_creacion DATE NULL,
  PRIMARY KEY(id_codigo),
  INDEX codigos_servicio_FKIndex1(id_miembros)
);

CREATE TABLE datos_miembros (
  id_datos int(3) NOT NULL AUTO_INCREMENT,
  telefono VARCHAR(10) NULL,
  correo VARCHAR(30) NULL,
  cta_corriente VARCHAR(50) NULL,
  PRIMARY KEY(id_datos)
);

CREATE TABLE gastos_empresa (
  id_gastos_empresa int(3) NOT NULL AUTO_INCREMENT,
  id_liquidaciones int(3) NOT NULL,
  id_otros_gastos int(3) NOT NULL,
  id_inspectores_ayudantes int(3) NOT NULL,
  id_gc_informes int(3) NOT NULL,
  id_impresiones int(3) NOT NULL,
  id_rendiciones_de_gastos int(3) NOT NULL,
  detalle VARCHAR(200) NULL,
  valor int(3) NULL,
  PRIMARY KEY(id_gastos_empresa),
  INDEX gastos_empresa_FKIndex1(id_rendiciones_de_gastos),
  INDEX gastos_empresa_FKIndex2(id_impresiones),
  INDEX gastos_empresa_FKIndex3(id_gc_informes),
  INDEX gastos_empresa_FKIndex4(id_inspectores_ayudantes),
  INDEX gastos_empresa_FKIndex5(id_otros_gastos),
  INDEX gastos_empresa_FKIndex6(id_liquidaciones)
);

CREATE TABLE gastos_propios (
  id_gastos_propios int(3) NOT NULL AUTO_INCREMENT,
  id_tipos_gp int(3) NOT NULL,
  id_gastos_empresa int(3) NOT NULL,
  valor int(3) NULL,
  detalle VARCHAR(100) NULL,
  PRIMARY KEY(id_gastos_propios),
  INDEX gastos_propios_FKIndex1(id_gastos_empresa),
  INDEX gastos_propios_FKIndex2(id_tipos_gp)
);

CREATE TABLE gc_informes (
  id_gc_informes int(3) NOT NULL AUTO_INCREMENT,
  detalle VARCHAR(200) NULL,
  total_gastos int(3) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_gc_informes)
);

CREATE TABLE impresiones (
  id_impresiones int(3) NOT NULL AUTO_INCREMENT,
  valor_hoja int(3) NULL,
  cant_hojas int(3) NULL,
  num_copias int(3) NULL,
  detalle VARCHAR(200) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_impresiones)
);

CREATE TABLE informes (
  id_informes int(3) NOT NULL AUTO_INCREMENT,
  ruta VARCHAR(100) NULL,
  cod_informe VARCHAR(100) NULL,
  PRIMARY KEY(id_informes)
);

CREATE TABLE inspectores_ayudantes (
  id_inspectores_ayudantes int(3) NOT NULL AUTO_INCREMENT,
  id_miembros int(3) NOT NULL,
  id_liquidaciones int(3) NOT NULL,
  pago int(3) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_inspectores_ayudantes),
  INDEX inspectores_ayudantes_FKIndex1(id_miembros),
  INDEX inspectores_ayudantes_FKIndex2(id_liquidaciones)
);

CREATE TABLE liquidaciones (
  id_liquidaciones int(3) NOT NULL AUTO_INCREMENT,
  id_informes int(3) NOT NULL,
  id_porce_acuerdos int(3) NOT NULL,
  id_valor_dolar int(3) NOT NULL,
  id_lugares int(3) NOT NULL,
  id_otros_gastos int(3) NOT NULL,
  id_impresiones int(3) NOT NULL,
  id_rendiciones_de_gastos int(3) NOT NULL,
  id_valores_facturados int(3) NOT NULL,
  id_gc_informes int(3) NOT NULL,
  numero_liq int(3) NULL,
  fecha_creacion DATE NULL,
  nombre_servicio VARCHAR(50) NULL,
  ref_cliente VARCHAR(50) NULL,
  servicio VARCHAR(200) NULL,
  num_cont int(3) NULL,
  turnos_trabajados int(3) NULL,
  tarifado VARCHAR(100) NULL,
  activo BOOL NULL,
  PRIMARY KEY(id_liquidaciones),
  INDEX liquidaciones_FKIndex1(id_informes),
  INDEX liquidaciones_FKIndex2(id_lugares),
  INDEX liquidaciones_FKIndex3(id_porce_acuerdos),
  INDEX liquidaciones_FKIndex4(id_otros_gastos),
  INDEX liquidaciones_FKIndex5(id_valor_dolar),
  INDEX liquidaciones_FKIndex6(id_impresiones),
  INDEX liquidaciones_FKIndex7(id_gc_informes),
  INDEX liquidaciones_FKIndex8(id_rendiciones_de_gastos),
  INDEX liquidaciones_FKIndex9(id_valores_facturados)
);

CREATE TABLE lugares (
  id_lugares int(3) NOT NULL AUTO_INCREMENT,
  nombre_lugar VARCHAR(100) NULL,
  PRIMARY KEY(id_lugares)
);

CREATE TABLE mensajes (
  id_mensaje int(3) NOT NULL AUTO_INCREMENT,
  mensaje VARCHAR(200) NULL,
  PRIMARY KEY(id_mensaje)
);

CREATE TABLE miembros (
  id_miembros int(3) NOT NULL AUTO_INCREMENT,
  id_banco int(3) NOT NULL,
  id_privilegio int(3) NOT NULL,
  id_usuarios int(3) NOT NULL,
  id_datos int(3) NOT NULL,
  p_nombre VARCHAR(10) NULL,
  s_nombre VARCHAR(10) NULL,
  apellido_p VARCHAR(20) NULL,
  apellido_m VARCHAR(20) NULL,
  rut VARCHAR(10) NULL,
  f_nac DATE NULL,
  f_creacion DATE NULL,
  activo int(3) NULL,
  PRIMARY KEY(id_miembros),
  INDEX miembros_FKIndex1(id_usuarios),
  INDEX miembros_FKIndex2(id_banco),
  INDEX miembros_FKIndex3(id_privilegio),
  INDEX miembros_FKIndex4(id_datos)
);

CREATE TABLE otros_gastos (
  id_otros_gastos int(3) NOT NULL AUTO_INCREMENT,
  detalle VARCHAR(200) NULL,
  valor int(3) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_otros_gastos)
);

CREATE TABLE porce_acuerdos (
  id_porce_acuerdos int(3) NOT NULL AUTO_INCREMENT,
  porcentaje int(3) NULL,
  PRIMARY KEY(id_porce_acuerdos)
);

CREATE TABLE privilegios (
  id_privilegio int(3) NOT NULL AUTO_INCREMENT,
  nombre_privilegio int(3) NULL,
  tipo int(3) NULL,
  PRIMARY KEY(id_privilegio)
);

CREATE TABLE registros (
  id_registro int(3) NOT NULL AUTO_INCREMENT,
  id_miembros int(3) NULL,
  detalle VARCHAR(200) NULL,
  PRIMARY KEY(id_registro),
  INDEX registros_FKIndex1(id_miembros)
);

CREATE TABLE rendiciones_de_gastos (
  id_rendiciones_de_gastos int(3) NOT NULL AUTO_INCREMENT,
  codigo_rend VARCHAR(50) NULL,
  total_rend int(3) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_rendiciones_de_gastos)
);

CREATE TABLE tipos_gp (
  id_tipos_gp int(3) NOT NULL AUTO_INCREMENT,
  tipo int(3) NULL,
  nombre_tipo VARCHAR(100) NULL,
  descripcion VARCHAR(100) NULL,
  PRIMARY KEY(id_tipos_gp)
);

CREATE TABLE usuarios (
  id_usuarios int(3) NOT NULL AUTO_INCREMENT,
  username VARCHAR(10) NULL,
  pass VARCHAR(20) NULL,
  PRIMARY KEY(id_usuarios)
);

CREATE TABLE valores_facturados (
  id_valores_facturados int(3) NOT NULL AUTO_INCREMENT,
  fact_exenta int(3) NULL,
  fact_afecta int(3) NULL,
  bol_honorario int(3) NULL,
  invoice int(3) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_valores_facturados)
);

CREATE TABLE valor_dolar (
  id_valor_dolar int(3) NOT NULL AUTO_INCREMENT,
  fecha_variacion DATE NULL,
  valor int(3) NULL,
  PRIMARY KEY(id_valor_dolar)
);


