CREATE TABLE anticipos (
  id_anticipos INT(3) NOT NULL AUTO_INCREMENT,
  valor_anticipo INT(7) NULL,
  PRIMARY KEY(id_anticipos)
);

CREATE TABLE bancos (
  id_banco INT(3) NOT NULL AUTO_INCREMENT,
  nombre_banco VARCHAR(100) NULL,
  PRIMARY KEY(id_banco)
);

CREATE TABLE codigos_servicio (
  id_codigo INT(3) NOT NULL AUTO_INCREMENT,
  codigo VARCHAR(30) NULL,
  f_creacion DATE NULL,
  PRIMARY KEY(id_codigo)
);

CREATE TABLE datos_miembros (
  id_datos INT(3) NOT NULL AUTO_INCREMENT,
  telefono VARCHAR(10) NULL,
  correo VARCHAR(30) NULL,
  cta_corriente VARCHAR(50) NULL,
  PRIMARY KEY(id_datos)
);

CREATE TABLE depositos (
  id_depositos INT(6) NOT NULL AUTO_INCREMENT,
  id_miembros INT(3) NOT NULL,
  id_anticipos INT(3) NOT NULL,
  gastos_incurridos INT(6) NULL,
  retencion_bh INT(6) NULL,
  total_depositar INT(6) NULL,
  PRIMARY KEY(id_depositos),
  INDEX depositos_FKIndex1(id_anticipos),
  INDEX depositos_FKIndex2(id_miembros)
);

CREATE TABLE gastos_empresa (
  id_gastos_empresa INT(3) NOT NULL AUTO_INCREMENT,
  id_liquidaciones INT(3) NOT NULL,
  gastos_traduccion VARCHAR(100) NULL,
  total_gastos_traduccion INT(6) NULL,
  work_in_office VARCHAR(100) NULL,
  total_wif INT(6) NULL,
  revision_entrega VARCHAR(100) NULL,
  total_re INT(6) NULL,
  entrega_envio VARCHAR(100) NULL,
  total_ee INT(6) NULL,
  gestion_comercial VARCHAR(100) NULL,
  total_gestion_comercial INT(6) NULL,
  administracion_contable VARCHAR(100) NULL,
  total_admin_contable INT(6) NULL,
  total_gastos_empresa INT(6) NULL,
  PRIMARY KEY(id_gastos_empresa),
  INDEX gastos_empresa_FKIndex6(id_liquidaciones)
);

CREATE TABLE gc_informes (
  id_gc_informes INT(3) NOT NULL AUTO_INCREMENT,
  detalle VARCHAR(200) NULL,
  total_gastos INT(7) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_gc_informes)
);

CREATE TABLE honorarios_proforma (
  id_honorarios_proforma INT(3) NOT NULL AUTO_INCREMENT,
  id_proformas INT(3) NOT NULL,
  fecha DATE NULL,
  calificacion VARCHAR(4) NULL,
  unidad_cobro VARCHAR(50) NULL,
  cant_htd INT(3) NULL,
  total INT(6) NULL,
  PRIMARY KEY(id_honorarios_proforma),
  INDEX honorarios_proforma_FKIndex1(id_proformas)
);

CREATE TABLE impresiones (
  id_impresiones INT(3) NOT NULL AUTO_INCREMENT,
  valor_hoja INT(4) NULL,
  cant_hojas INT(4) NULL,
  num_copias INT(4) NULL,
  detalle VARCHAR(200) NULL,
  total_impresion INT(6) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_impresiones)
);

CREATE TABLE informes (
  id_informes INT(3) NOT NULL AUTO_INCREMENT,
  id_proyectos INT(3) NOT NULL,
  ruta VARCHAR(100) NULL,
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
  id_valor_dolar INT(3) NOT NULL,
  id_otros_gastos INT(3) NOT NULL,
  id_impresiones INT(3) NOT NULL,
  id_rendiciones_de_gastos INT(3) NOT NULL,
  id_valores_facturados INT(3) NOT NULL,
  id_gc_informes INT(3) NOT NULL,
  numero_liq INT(4) NULL,
  fecha_creacion DATE NULL,
  ref_cliente VARCHAR(50) NULL,
  num_cont INT(3) NULL,
  turnos_trabajados INT(2) NULL,
  tarifado VARCHAR(100) NULL,
  total_gastos_empresa INT(6) NULL,
  total_inspectores INT(6) NULL,
  total_servicio_chp INT(6) NULL,
  total_servicio_usd INT(6) NULL,
  activo BOOL NULL,
  PRIMARY KEY(id_liquidaciones),
  INDEX liquidaciones_FKIndex4(id_otros_gastos),
  INDEX liquidaciones_FKIndex5(id_valor_dolar),
  INDEX liquidaciones_FKIndex6(id_impresiones),
  INDEX liquidaciones_FKIndex7(id_gc_informes),
  INDEX liquidaciones_FKIndex8(id_rendiciones_de_gastos),
  INDEX liquidaciones_FKIndex9(id_valores_facturados),
  INDEX liquidaciones_FKIndex10(id_proyectos)
);

CREATE TABLE liquidaciones_servicios (
  id_liquidaciones_servicios INT(3) NOT NULL AUTO_INCREMENT,
  id_liquidaciones INT(3) NOT NULL,
  valor_Facturado INT(6) NULL,
  total_gastos INT(6) NULL,
  utilidad INT(6) NULL,
  porcentaje_acuerdo DECIMAL(4,2) NULL,
  total_a_cancelar INT(6) NULL,
  PRIMARY KEY(id_liquidaciones_servicios),
  INDEX liquidaciones_servicios_FKIndex1(id_liquidaciones)
);

CREATE TABLE lugares (
  id_lugares INT(3) NOT NULL AUTO_INCREMENT,
  nombre_lugar VARCHAR(100) NULL,
  direccion VARCHAR(100) NULL,
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

CREATE TABLE ppms (
  id_ppms INT(6) NOT NULL AUTO_INCREMENT,
  porcentaje INT(3) NULL,
  fecha_ingreso DATE NULL,
  PRIMARY KEY(id_ppms)
);

CREATE TABLE privilegios (
  id_privilegio INT(3) NOT NULL AUTO_INCREMENT,
  nombre_privilegio VARCHAR(50) NULL,
  tipo INT(1) NULL,
  PRIMARY KEY(id_privilegio)
);

CREATE TABLE proformas (
  id_proformas INT(3) NOT NULL AUTO_INCREMENT,
  id_proyectos INT(3) NOT NULL,
  total_proforma INT(6) NULL,
  PRIMARY KEY(id_proformas),
  INDEX proformas_FKIndex1(id_proyectos)
);

CREATE TABLE proyectos (
  id_proyectos INT(3) NOT NULL AUTO_INCREMENT,
  id_lugares INT(3) NOT NULL,
  id_miembros INT(3) NOT NULL,
  id_codigo INT(3) NOT NULL,
  nombre_proyecto VARCHAR(100) NULL,
  nombre_nave VARCHAR(50) NULL,
  fecha_inicio DATE NULL,
  fecha_termino DATE NULL,
  descripcion LONGTEXT NULL,
  PRIMARY KEY(id_proyectos),
  INDEX proyectos_FKIndex1(id_codigo),
  INDEX proyectos_FKIndex2(id_miembros),
  INDEX proyectos_FKIndex3(id_lugares)
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

CREATE TABLE servicios (
  id_servicio INT(3) NOT NULL AUTO_INCREMENT,
  id_miembros INT(3) NOT NULL,
  id_proyectos INT(3) NOT NULL,
  nombre_servicio VARCHAR(100) NULL,
  PRIMARY KEY(id_servicio),
  INDEX servicios_FKIndex1(id_proyectos),
  INDEX servicios_FKIndex2(id_miembros)
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
  total_fact_exenta INT(6) NULL,
  total_fact_afecta INT(6) NULL,
  total_bol_honorario INT(6) NULL,
  total_invoice INT(6) NULL,
  inspector BOOL NULL,
  PRIMARY KEY(id_valores_facturados)
);

CREATE TABLE valor_dolar (
  id_valor_dolar INT(3) NOT NULL AUTO_INCREMENT,
  fecha_variacion DATE NULL,
  valor INT(7) NULL,
  PRIMARY KEY(id_valor_dolar)
);


