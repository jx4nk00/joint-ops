CREATE TABLE anticipos (
  id_anticipos INT(3) NOT NULL AUTO_INCREMENT,
  id_miembros INT(3) NOT NULL,
  id_liquidaciones INT(3) NOT NULL,
  valor_anticipo INT(7) NULL,
  PRIMARY KEY(id_anticipos),
  INDEX anticipos_FKIndex1(id_liquidaciones),
  INDEX anticipos_FKIndex2(id_miembros)
);

CREATE TABLE bancos (
  id_banco INT(3) NOT NULL AUTO_INCREMENT,
  nombre_banco VARCHAR(100) NULL,
  PRIMARY KEY(id_banco)
);

CREATE TABLE codigos_servicio (
  id_codigo INT(3) NOT NULL AUTO_INCREMENT,
  id_miembros INT(3) NOT NULL,
  codigo VARCHAR(30) NULL,
  f_creacion DATE NULL,
  PRIMARY KEY(id_codigo),
  INDEX codigos_servicio_FKIndex1(id_miembros)
);

CREATE TABLE datos_miembros (
  id_datos INT(3) NOT NULL AUTO_INCREMENT,
  telefono VARCHAR(10) NULL,
  correo VARCHAR(30) NULL,
  cta_corriente VARCHAR(50) NULL,
  PRIMARY KEY(id_datos)
);

CREATE TABLE gastos_empresa (
  id_gastos_empresa INT(3) NOT NULL AUTO_INCREMENT,
  id_liquidaciones INT(3) NOT NULL,
  id_otros_gastos INT(3) NOT NULL,
  id_inspectores_ayudantes INT(3) NOT NULL,
  id_gc_informes INT(3) NOT NULL,
  id_impresiones INT(3) NOT NULL,
  id_rendiciones_de_gastos INT(3) NOT NULL,
  detalle VARCHAR(200) NULL,
  valor INT(7) NULL,
  PRIMARY KEY(id_gastos_empresa),
  INDEX gastos_empresa_FKIndex1(id_rendiciones_de_gastos),
  INDEX gastos_empresa_FKIndex2(id_impresiones),
  INDEX gastos_empresa_FKIndex3(id_gc_informes),
  INDEX gastos_empresa_FKIndex4(id_inspectores_ayudantes),
  INDEX gastos_empresa_FKIndex5(id_otros_gastos),
  INDEX gastos_empresa_FKIndex6(id_liquidaciones)
);

CREATE TABLE gastos_propios (
  id_gastos_propios INT(3) NOT NULL AUTO_INCREMENT,
  id_tipos_gp INT(3) NOT NULL,
  id_gastos_empresa INT(3) NOT NULL,
  valor INT(7) NULL,
  detalle VARCHAR(100) NULL,
  PRIMARY KEY(id_gastos_propios),
  INDEX gastos_propios_FKIndex1(id_gastos_empresa),
  INDEX gastos_propios_FKIndex2(id_tipos_gp)
);

CREATE TABLE gc_informes (
  id_gc_informes INT(3) NOT NULL AUTO_INCREMENT,
  detalle VARCHAR(200) NULL,
  total_gastos INT(7) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_gc_informes)
);

CREATE TABLE impresiones (
  id_impresiones INT(3) NOT NULL AUTO_INCREMENT,
  valor_hoja INT(4) NULL,
  cant_hojas INT(4) NULL,
  num_copias INT(4) NULL,
  detalle VARCHAR(200) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_impresiones)
);

CREATE TABLE informes (
  id_informes INT(3) NOT NULL AUTO_INCREMENT,
  id_proyectos INT(3) NOT NULL,
  ruta VARCHAR(100) NULL,
  cod_informe VARCHAR(100) NULL,
  PRIMARY KEY(id_informes),
  INDEX informes_FKIndex1(id_proyectos)
);

CREATE TABLE inspectores_ayudantes (
  id_inspectores_ayudantes INT(3) NOT NULL AUTO_INCREMENT,
  id_miembros INT(3) NOT NULL,
  id_liquidaciones INT(3) NOT NULL,
  pago INT(7) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_inspectores_ayudantes),
  INDEX inspectores_ayudantes_FKIndex1(id_miembros),
  INDEX inspectores_ayudantes_FKIndex2(id_liquidaciones)
);

CREATE TABLE liquidaciones (
  id_liquidaciones INT(3) NOT NULL AUTO_INCREMENT,
  id_proyectos INT(3) NOT NULL,
  id_porce_acuerdos INT(3) NOT NULL,
  id_valor_dolar INT(3) NOT NULL,
  id_lugares INT(3) NOT NULL,
  id_otros_gastos INT(3) NOT NULL,
  id_impresiones INT(3) NOT NULL,
  id_rendiciones_de_gastos INT(3) NOT NULL,
  id_valores_facturados INT(3) NOT NULL,
  id_gc_informes INT(3) NOT NULL,
  numero_liq INT(4) NULL,
  fecha_creacion DATE NULL,
  nombre_servicio VARCHAR(50) NULL,
  ref_cliente VARCHAR(50) NULL,
  servicio VARCHAR(200) NULL,
  num_cont INT(3) NULL,
  turnos_trabajados INT(2) NULL,
  tarifado VARCHAR(100) NULL,
  activo BOOL NULL,
  PRIMARY KEY(id_liquidaciones),
  INDEX liquidaciones_FKIndex2(id_lugares),
  INDEX liquidaciones_FKIndex3(id_porce_acuerdos),
  INDEX liquidaciones_FKIndex4(id_otros_gastos),
  INDEX liquidaciones_FKIndex5(id_valor_dolar),
  INDEX liquidaciones_FKIndex6(id_impresiones),
  INDEX liquidaciones_FKIndex7(id_gc_informes),
  INDEX liquidaciones_FKIndex8(id_rendiciones_de_gastos),
  INDEX liquidaciones_FKIndex9(id_valores_facturados),
  INDEX liquidaciones_FKIndex10(id_proyectos)
);

CREATE TABLE lugares (
  id_lugares INT(3) NOT NULL AUTO_INCREMENT,
  nombre_lugar VARCHAR(100) NULL,
  PRIMARY KEY(id_lugares)
);

CREATE TABLE mensajes (
  id_mensaje INT(3) NOT NULL AUTO_INCREMENT,
  mensaje VARCHAR(200) NULL,
  PRIMARY KEY(id_mensaje)
);

CREATE TABLE miembros (
  id_miembros INT(3) NOT NULL AUTO_INCREMENT,
  id_banco INT(3) NOT NULL,
  id_privilegio INT(3) NOT NULL,
  id_usuarios INT(3) NOT NULL,
  id_datos INT(3) NOT NULL,
  p_nombre VARCHAR(20) NULL,
  s_nombre VARCHAR(20) NULL,
  apellido_p VARCHAR(20) NULL,
  apellido_m VARCHAR(20) NULL,
  rut VARCHAR(10) NULL,
  f_nac DATE NULL,
  f_creacion DATE NULL,
  activo BOOL NULL,
  PRIMARY KEY(id_miembros),
  INDEX miembros_FKIndex1(id_usuarios),
  INDEX miembros_FKIndex2(id_banco),
  INDEX miembros_FKIndex3(id_privilegio),
  INDEX miembros_FKIndex4(id_datos)
);

CREATE TABLE otros_gastos (
  id_otros_gastos INT(3) NOT NULL AUTO_INCREMENT,
  detalle VARCHAR(200) NULL,
  valor INT(7) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_otros_gastos)
);

CREATE TABLE porce_acuerdos (
  id_porce_acuerdos INT(3) NOT NULL AUTO_INCREMENT,
  porcentaje DECIMAL(4,2) NULL,
  PRIMARY KEY(id_porce_acuerdos)
);

CREATE TABLE privilegios (
  id_privilegio INT(3) NOT NULL AUTO_INCREMENT,
  nombre_privilegio VARCHAR(50) NULL,
  tipo INT(1) NULL,
  PRIMARY KEY(id_privilegio)
);

CREATE TABLE proyectos (
  id_proyectos INT(3) NOT NULL AUTO_INCREMENT,
  nombre_proyecto VARCHAR(100) NULL,
  fecha_inicio DATE NULL,
  fecha_termino DATE NULL,
  descripcion VARCHAR(100) NULL,
  PRIMARY KEY(id_proyectos)
);

CREATE TABLE registros (
  id_registro INT(3) NOT NULL AUTO_INCREMENT,
  id_miembros INT(3) NULL,
  detalle VARCHAR(200) NULL,
  PRIMARY KEY(id_registro),
  INDEX registros_FKIndex1(id_miembros)
);

CREATE TABLE rendiciones_de_gastos (
  id_rendiciones_de_gastos INT(3) NOT NULL AUTO_INCREMENT,
  codigo_rend VARCHAR(50) NULL,
  total_rend INT(7) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_rendiciones_de_gastos)
);

CREATE TABLE tipos_gp (
  id_tipos_gp INT(3) NOT NULL AUTO_INCREMENT,
  tipo INT(2) NULL,
  nombre_tipo VARCHAR(100) NULL,
  descripcion VARCHAR(100) NULL,
  PRIMARY KEY(id_tipos_gp)
);

CREATE TABLE usuarios (
  id_usuarios INT(3) NOT NULL AUTO_INCREMENT,
  username VARCHAR(40) NULL,
  pass VARCHAR(40) NULL,
  PRIMARY KEY(id_usuarios)
);

CREATE TABLE valores_facturados (
  id_valores_facturados INT(3) NOT NULL AUTO_INCREMENT,
  fact_exenta INT(6) NULL,
  fact_afecta INT(6) NULL,
  bol_honorario INT(6) NULL,
  invoice INT(6) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_valores_facturados)
);

CREATE TABLE valor_dolar (
  id_valor_dolar INT(3) NOT NULL AUTO_INCREMENT,
  fecha_variacion DATE NULL,
  valor INT(7) NULL,
  PRIMARY KEY(id_valor_dolar)
);

