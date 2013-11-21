CREATE TABLE anticipos (
  id_anticipos NUMERIC NOT NULL AUTO_INCREMENT,
  id_miembros INT NOT NULL,
  id_liquidaciones NUMERIC NOT NULL,
  valor_anticipo NUMERIC NULL,
  PRIMARY KEY(id_anticipos),
  INDEX anticipos_FKIndex1(id_miembros),
  INDEX anticipos_FKIndex2(id_liquidaciones)
);

CREATE TABLE bancos (
  id_banco NUMERIC NOT NULL AUTO_INCREMENT,
  nombre_banco NUMERIC NULL,
  PRIMARY KEY(id_banco)
);

CREATE TABLE codigos_servicio (
  id_codigo NUMERIC NOT NULL AUTO_INCREMENT,
  id_miembros INT NOT NULL,
  codigo VARCHAR(30) NULL,
  f_creacion DATE NULL,
  PRIMARY KEY(id_codigo),
  INDEX codigos_servicio_FKIndex1(id_miembros)
);

CREATE TABLE datos_miembros (
  id_datos NUMERIC NOT NULL AUTO_INCREMENT,
  telefono VARCHAR(10) NULL,
  correo VARCHAR(30) NULL,
  cta_corriente VARCHAR(50) NULL,
  PRIMARY KEY(id_datos)
);

CREATE TABLE gastos_empresa (
  id_gastos_empresa NUMERIC NOT NULL AUTO_INCREMENT,
  id_liquidaciones NUMERIC NOT NULL,
  id_otros_gastos NUMERIC NOT NULL,
  id_inspectores_ayudantes NUMERIC NOT NULL,
  id_gc_informes NUMERIC NOT NULL,
  id_impresiones NUMERIC NOT NULL,
  id_rendiciones_de_gastos NUMERIC NOT NULL,
  detalle VARCHAR(200) NULL,
  valor NUMERIC NULL,
  PRIMARY KEY(id_gastos_empresa),
  INDEX gastos_empresa_FKIndex1(id_rendiciones_de_gastos),
  INDEX gastos_empresa_FKIndex2(id_impresiones),
  INDEX gastos_empresa_FKIndex3(id_gc_informes),
  INDEX gastos_empresa_FKIndex4(id_inspectores_ayudantes),
  INDEX gastos_empresa_FKIndex5(id_otros_gastos),
  INDEX gastos_empresa_FKIndex6(id_liquidaciones)
);

CREATE TABLE gastos_propios (
  id_gastos_propios INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_gastos_empresa NUMERIC NOT NULL,
  id_tipos_gp INTEGER UNSIGNED NOT NULL,
  valor INTEGER UNSIGNED NULL,
  detalle VARCHAR(100) NULL,
  PRIMARY KEY(id_gastos_propios),
  INDEX gastos_propios_FKIndex1(id_tipos_gp),
  INDEX gastos_propios_FKIndex2(id_gastos_empresa)
);

CREATE TABLE gc_informes (
  id_gc_informes NUMERIC NOT NULL AUTO_INCREMENT,
  detalle VARCHAR(200) NULL,
  total_gastos NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_gc_informes)
);

CREATE TABLE impresiones (
  id_impresiones NUMERIC NOT NULL AUTO_INCREMENT,
  valor_hoja NUMERIC NULL,
  cant_hojas NUMERIC NULL,
  num_copias NUMERIC NULL,
  detalle VARCHAR(200) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_impresiones)
);

CREATE TABLE informes (
  id_informes NUMERIC NOT NULL AUTO_INCREMENT,
  ruta VARCHAR(100) NULL,
  cod_informe VARCHAR(100) NULL,
  PRIMARY KEY(id_informes)
);

CREATE TABLE inspectores_ayudantes (
  id_inspectores_ayudantes NUMERIC NOT NULL AUTO_INCREMENT,
  id_miembros INT NOT NULL,
  id_liquidaciones NUMERIC NOT NULL,
  pago NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_inspectores_ayudantes),
  INDEX inspectores_ayudantes_FKIndex1(id_miembros),
  INDEX inspectores_ayudantes_FKIndex2(id_liquidaciones)
);

CREATE TABLE liquidaciones (
  id_liquidaciones NUMERIC NOT NULL AUTO_INCREMENT,
  id_informes NUMERIC NOT NULL,
  id_porce_acuerdos NUMERIC NOT NULL,
  id_valor_dolar NUMERIC NOT NULL,
  id_lugares NUMERIC NOT NULL,
  id_otros_gastos NUMERIC NOT NULL,
  id_impresiones NUMERIC NOT NULL,
  id_rendiciones_de_gastos NUMERIC NOT NULL,
  id_valores_facturados NUMERIC NOT NULL,
  id_gc_informes NUMERIC NOT NULL,
  numero_liq NUMERIC NULL,
  fecha_creacion DATE NULL,
  nombre_servicio VARCHAR(50) NULL,
  ref_cliente VARCHAR(50) NULL,
  servicio VARCHAR(200) NULL,
  num_cont NUMERIC NULL,
  turnos_trabajados NUMERIC NULL,
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
  id_lugares NUMERIC NOT NULL AUTO_INCREMENT,
  nombre_lugar VARCHAR(100) NULL,
  PRIMARY KEY(id_lugares)
);

CREATE TABLE mensajes (
  id_mensaje NUMERIC NOT NULL AUTO_INCREMENT,
  mensaje VARCHAR(200) NULL,
  PRIMARY KEY(id_mensaje)
);

CREATE TABLE miembros (
  id_miembros INT NOT NULL AUTO_INCREMENT,
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
  INDEX miembros_FKIndex1(id_usuarios),
  INDEX miembros_FKIndex2(id_banco),
  INDEX miembros_FKIndex3(id_privilegio),
  INDEX miembros_FKIndex4(id_datos)
);

CREATE TABLE otros_gastos (
  id_otros_gastos NUMERIC NOT NULL AUTO_INCREMENT,
  detalle VARCHAR(200) NULL,
  valor NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_otros_gastos)
);

CREATE TABLE porce_acuerdos (
  id_porce_acuerdos NUMERIC NOT NULL AUTO_INCREMENT,
  porcentaje NUMERIC NULL,
  PRIMARY KEY(id_porce_acuerdos)
);

CREATE TABLE privilegios (
  id_privilegio NUMERIC NOT NULL AUTO_INCREMENT,
  nombre_privilegio NUMERIC NULL,
  tipo NUMERIC NULL,
  PRIMARY KEY(id_privilegio)
);

CREATE TABLE registros (
  id_registro NUMERIC NOT NULL AUTO_INCREMENT,
  id_miembros INT NULL,
  detalle VARCHAR(200) NULL,
  PRIMARY KEY(id_registro),
  INDEX registros_FKIndex1(id_miembros)
);

CREATE TABLE rendiciones_de_gastos (
  id_rendiciones_de_gastos NUMERIC NOT NULL AUTO_INCREMENT,
  codigo_rend VARCHAR(50) NULL,
  total_rend NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_rendiciones_de_gastos)
);

CREATE TABLE tipos_gp (
  id_tipos_gp INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo INTEGER UNSIGNED NULL,
  nombre_tipo VARCHAR(100) NULL,
  descripcion VARCHAR(100) NULL,
  PRIMARY KEY(id_tipos_gp)
);

CREATE TABLE usuarios (
  id_usuarios NUMERIC NOT NULL AUTO_INCREMENT,
  username VARCHAR(10) NULL,
  pass VARCHAR(20) NULL,
  PRIMARY KEY(id_usuarios)
);

CREATE TABLE valores_facturados (
  id_valores_facturados NUMERIC NOT NULL AUTO_INCREMENT,
  fact_exenta NUMERIC NULL,
  fact_afecta NUMERIC NULL,
  bol_honorario NUMERIC NULL,
  invoice NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_valores_facturados)
);

CREATE TABLE valor_dolar (
  id_valor_dolar NUMERIC NOT NULL AUTO_INCREMENT,
  fecha_variacion DATE NULL,
  valor NUMERIC NULL,
  PRIMARY KEY(id_valor_dolar)
);


