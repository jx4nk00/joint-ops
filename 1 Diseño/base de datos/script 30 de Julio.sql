CREATE TABLE anticipos (
  id_anticipos NUMERIC NOT NULL ,
  id_miembros NUMERIC NOT NULL,
  id_liquidaciones NUMERIC NOT NULL,
  id_miembro NUMERIC NULL,
  valor_anticipo NUMERIC NULL,
  PRIMARY KEY(id_anticipos)
);

CREATE TABLE bancos (
  id_banco NUMERIC NOT NULL ,
  nombre_banco NUMERIC NULL,
  PRIMARY KEY(id_banco)
);

CREATE TABLE codigos_servicio (
  id_codigo NUMERIC NOT NULL ,
  id_miembros NUMERIC NOT NULL,
  id_miembro NUMERIC NULL,
  codigo VARCHAR(30) NULL,
  f_creacion DATE NULL,
  PRIMARY KEY(id_codigo, id_miembros)
);

CREATE TABLE datos_miembros (
  id_datos NUMERIC NOT NULL ,
  telefono VARCHAR(10) NULL,
  correo VARCHAR(30) NULL,
  cta_corriente VARCHAR(50) NULL,
  PRIMARY KEY(id_datos)
);

CREATE TABLE gastos_empresa (
  id_gastos_empresa NUMERIC NOT NULL ,
  id_tipos_gastos NUMERIC NOT NULL,
  id_liquidaciones NUMERIC NOT NULL,
  detalle VARCHAR(200) NULL,
  valor NUMERIC NULL,
  PRIMARY KEY(id_gastos_empresa, id_tipos_gastos)
);

CREATE TABLE gc_informes (
  id_gc_informes NUMERIC NOT NULL ,
  detalle VARCHAR(200) NULL,
  total_gastos NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_gc_informes)
);

CREATE TABLE impresiones (
  id_impresiones NUMERIC NOT NULL ,
  valor_hoja NUMERIC NULL,
  cant_hojas NUMERIC NULL,
  num_copias NUMERIC NULL,
  detalle VARCHAR(200) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_impresiones)
);

CREATE TABLE informes (
  id_informes NUMERIC NOT NULL ,
  ruta VARCHAR(100) NULL,
  cod_informe VARCHAR(100) NULL,
  PRIMARY KEY(id_informes)
);

CREATE TABLE inspectores_ayudantes (
  id_inspectores_ayudantes NUMERIC NOT NULL ,
  id_miembros NUMERIC NOT NULL,
  id_liquidaciones NUMERIC NOT NULL,
  pago NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_inspectores_ayudantes)
);

CREATE TABLE liquidaciones (
  id_liquidaciones NUMERIC NOT NULL ,
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
  PRIMARY KEY(id_liquidaciones)
);

CREATE TABLE lugares (
  id_lugares NUMERIC NOT NULL ,
  nombre_lugar VARCHAR(100) NULL,
  PRIMARY KEY(id_lugares)
);

CREATE TABLE mensajes (
  id_mensaje NUMERIC NOT NULL ,
  mensaje VARCHAR(200) NULL,
  PRIMARY KEY(id_mensaje)
);

CREATE TABLE miembros (
  id_miembros NUMERIC NOT NULL ,
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
  activo NUMERIC NULL,
  PRIMARY KEY(id_miembros),
  INDEX miembros_FKIndex1(id_usuarios)
);

CREATE TABLE otros_gastos (
  id_otros_gastos NUMERIC NOT NULL ,
  detalle VARCHAR(200) NULL,
  valor NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_otros_gastos)
);

CREATE TABLE porce_acuerdos (
  id_porce_acuerdos NUMERIC NOT NULL ,
  porcentaje NUMERIC NULL,
  PRIMARY KEY(id_porce_acuerdos)
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

CREATE TABLE rendiciones_de_gastos (
  id_rendiciones_de_gastos NUMERIC NOT NULL ,
  codigo_rend VARCHAR(50) NULL,
  total_rend NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_rendiciones_de_gastos)
);

CREATE TABLE tipos_gastos (
  id_tipos_gastos NUMERIC NOT NULL ,
  nombre_tipo NUMERIC NULL,
  PRIMARY KEY(id_tipos_gastos)
);

CREATE TABLE usuarios (
  id_usuarios NUMERIC NOT NULL ,
  username VARCHAR(10) NULL,
  pass VARCHAR(20) NULL,
  PRIMARY KEY(id_usuarios)
);

CREATE TABLE valores_facturados (
  id_valores_facturados NUMERIC NOT NULL ,
  fact_exenta NUMERIC NULL,
  fact_afecta NUMERIC NULL,
  bol_honorario NUMERIC NULL,
  invoice NUMERIC NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_valores_facturados)
);

CREATE TABLE valor_dolar (
  id_valor_dolar NUMERIC NOT NULL ,
  fecha_variacion DATE NULL,
  valor NUMERIC NULL,
  PRIMARY KEY(id_valor_dolar)
);

