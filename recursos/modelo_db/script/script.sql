/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     16/10/2017 03:52:33 p. m.                    */
/*==============================================================*/


drop table if exists ACTIVIDAD_ACADEMICA;

drop table if exists ACTIVIDAD_INFORMATIVA;

drop table if exists ASIGNATURA;

drop table if exists ASIGNATURA_PERIODO;

drop table if exists AULA;

drop table if exists CALIFICACION_PLANTILLA;

drop table if exists CALIFICACION_PLANTILLA_DETALLE;

drop table if exists CARRERA;

drop table if exists ESTUDIANTE;

drop table if exists ESTUDIANTE_ASIGNATURA;

drop table if exists NOTA;

drop table if exists PARCIAL_PLANTILLA;

drop table if exists PARCIAL_PLANTILLA_DETALLE;

drop table if exists PERIODO_ACADEMICO;

drop table if exists PROFESOR;

drop table if exists RESPUESTAS;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: ACTIVIDAD_ACADEMICA                                   */
/*==============================================================*/
create table ACTIVIDAD_ACADEMICA
(
   ID_ACTIVIDAD_ACADEMICA int not null,
   ID_ASIGNATURA_PERIODO int,
   NOTA                 decimal(2,2),
   DESCRIPCION          varchar(1024),
   REF_CALIFICACION_PLANTILLA varchar(256),
   REF_PARCIAL_PLANTILLA varchar(256),
   FECHA_PRESENTACION   date,
   primary key (ID_ACTIVIDAD_ACADEMICA)
);

/*==============================================================*/
/* Table: ACTIVIDAD_INFORMATIVA                                 */
/*==============================================================*/
create table ACTIVIDAD_INFORMATIVA
(
   ID_ACTIVIDAD_INFORMATIVA int not null,
   ID_ASIGNATURA_PERIODO int,
   TITULO               varchar(64),
   DESCRIPCION          varchar(1024),
   IMAGEN               varchar(256),
   ARCHIVO_ADJUNTO      varchar(256),
   LINK                 varchar(256),
   FECHA_PUBLICACION    datetime,
   primary key (ID_ACTIVIDAD_INFORMATIVA)
);

/*==============================================================*/
/* Table: ASIGNATURA                                            */
/*==============================================================*/
create table ASIGNATURA
(
   ID_ASIGNATURA        int not null,
   NOMBRE               varchar(64),
   DESCRIPCION          varchar(1024),
   NIVEL                int,
   CREDITOS             int,
   primary key (ID_ASIGNATURA)
);

/*==============================================================*/
/* Table: ASIGNATURA_PERIODO                                    */
/*==============================================================*/
create table ASIGNATURA_PERIODO
(
   ID_ASIGNATURA_PERIODO int not null,
   ID_PERIODO_ACADEMICO int,
   ID_ASIGNATURA        int,
   ID_AULA              int,
   ID_PROFESOR          int,
   ID_CALIFICACION_PLANTILLA int,
   ESTADO               char(1),
   CREDITOS             int,
   HORA_INICIO          date,
   HORA_FIN             date,
   CAPACIDAD            int,
   primary key (ID_ASIGNATURA_PERIODO)
);

/*==============================================================*/
/* Table: AULA                                                  */
/*==============================================================*/
create table AULA
(
   ID_AULA              int not null,
   UBICACION            varchar(256),
   CAPACIDAD            int,
   OBSERVACIONES        varchar(1024),
   ESTADO               char(1),
   primary key (ID_AULA)
);

/*==============================================================*/
/* Table: CALIFICACION_PLANTILLA                                */
/*==============================================================*/
create table CALIFICACION_PLANTILLA
(
   ID_CALIFICACION_PLANTILLA int not null,
   NOMBRE               varchar(64),
   ESTADO               char(1),
   primary key (ID_CALIFICACION_PLANTILLA)
);

/*==============================================================*/
/* Table: CALIFICACION_PLANTILLA_DETALLE                        */
/*==============================================================*/
create table CALIFICACION_PLANTILLA_DETALLE
(
   ID_CALIFICACION_PLANTILLA_DETALLE int not null,
   ID_CALIFICACION_PLANTILLA int,
   NOMBRE               varchar(64),
   PORCENTAJE           int,
   primary key (ID_CALIFICACION_PLANTILLA_DETALLE)
);

/*==============================================================*/
/* Table: CARRERA                                               */
/*==============================================================*/
create table CARRERA
(
   ID_CARRERA           int not null,
   NOMBRE               varchar(64),
   DESCRIPCION          varchar(1024),
   ESTADO               char(1),
   primary key (ID_CARRERA)
);

/*==============================================================*/
/* Table: ESTUDIANTE                                            */
/*==============================================================*/
create table ESTUDIANTE
(
   ID_ESTUDIANTE        int not null,
   NICK                 varchar(64),
   ID_CARRERA           int,
   IDENTIFICACION       varchar(14),
   TIPO_IDENTIFICACION  varchar(64),
   NOMBRES              varchar(64),
   FECHA_NACIMIENTO     date,
   CELULAR              varchar(12),
   TELEFONO             varchar(12),
   EMAIL                varchar(64),
   DIRECCION            varchar(256),
   primary key (ID_ESTUDIANTE)
);

/*==============================================================*/
/* Table: ESTUDIANTE_ASIGNATURA                                 */
/*==============================================================*/
create table ESTUDIANTE_ASIGNATURA
(
   ID_ESTUDIANTE_ASIGNATURA int not null,
   ID_ASIGNATURA_PERIODO int,
   ID_ESTUDIANTE        int,
   ESTADO               char(1),
   NOTA_FINAL           decimal(2,2),
   primary key (ID_ESTUDIANTE_ASIGNATURA)
);

/*==============================================================*/
/* Table: NOTA                                                  */
/*==============================================================*/
create table NOTA
(
   ID_NOTA              int not null,
   ID_ESTUDIANTE_ASIGNATURA int,
   ID_ACTIVIDAD_ACADEMICA int,
   NOTA_FINAL           decimal(2,2),
   ESTADO               char(1),
   primary key (ID_NOTA)
);

/*==============================================================*/
/* Table: PARCIAL_PLANTILLA                                     */
/*==============================================================*/
create table PARCIAL_PLANTILLA
(
   ID_PARCIAL_PLANTILLA int not null,
   NOMBRE               varchar(64),
   DESCRIPCION          varchar(1024),
   NOTA_APRUEBA         decimal(2,2),
   primary key (ID_PARCIAL_PLANTILLA)
);

/*==============================================================*/
/* Table: PARCIAL_PLANTILLA_DETALLE                             */
/*==============================================================*/
create table PARCIAL_PLANTILLA_DETALLE
(
   ID_PARCIAL_PLANTILLA_DETALLE int not null,
   ID_PARCIAL_PLANTILLA int,
   PORCENTAJE           int,
   primary key (ID_PARCIAL_PLANTILLA_DETALLE)
);

/*==============================================================*/
/* Table: PERIODO_ACADEMICO                                     */
/*==============================================================*/
create table PERIODO_ACADEMICO
(
   ID_PERIODO_ACADEMICO int not null,
   ID_PARCIAL_PLANTILLA int,
   FECHA_INICIO         date,
   FECHA_FIN            date,
   ESTADO               char(1),
   primary key (ID_PERIODO_ACADEMICO)
);

/*==============================================================*/
/* Table: PROFESOR                                              */
/*==============================================================*/
create table PROFESOR
(
   ID_PROFESOR          int not null,
   NICK                 varchar(64),
   IDENTIFICACION       varchar(14),
   TIPO_IDENTIFICACION  varchar(64),
   NOMBRES              varchar(64),
   FECHA_NACIMIENTO     date,
   TITULO               varchar(64),
   CELULAR              varchar(12),
   TELEFONO             varchar(12),
   EMAIL                varchar(64),
   CARGO                varchar(64),
   DIRECCION            varchar(256),
   primary key (ID_PROFESOR)
);

/*==============================================================*/
/* Table: RESPUESTAS                                            */
/*==============================================================*/
create table RESPUESTAS
(
   ID_RESPUESTA         int not null,
   RES_ID_RESPUESTA     int,
   ID_ACTIVIDAD_INFORMATIVA int,
   NICK                 varchar(64),
   MENSAJE              varchar(256),
   FECHA                datetime,
   primary key (ID_RESPUESTA)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   NICK                 varchar(64) not null,
   CLAVE                varchar(64),
   TIPO                 varchar(64),
   FECHA_CREACION       datetime,
   ESTADO               char(1),
   primary key (NICK)
);

alter table ACTIVIDAD_ACADEMICA add constraint FK_RELATIONSHIP_27 foreign key (ID_ASIGNATURA_PERIODO)
      references ASIGNATURA_PERIODO (ID_ASIGNATURA_PERIODO) on delete restrict on update restrict;

alter table ACTIVIDAD_INFORMATIVA add constraint FK_RELATIONSHIP_18 foreign key (ID_ASIGNATURA_PERIODO)
      references ASIGNATURA_PERIODO (ID_ASIGNATURA_PERIODO) on delete restrict on update restrict;

alter table ASIGNATURA_PERIODO add constraint FK_RELATIONSHIP_2 foreign key (ID_PERIODO_ACADEMICO)
      references PERIODO_ACADEMICO (ID_PERIODO_ACADEMICO) on delete restrict on update restrict;

alter table ASIGNATURA_PERIODO add constraint FK_RELATIONSHIP_20 foreign key (ID_PROFESOR)
      references PROFESOR (ID_PROFESOR) on delete restrict on update restrict;

alter table ASIGNATURA_PERIODO add constraint FK_RELATIONSHIP_26 foreign key (ID_CALIFICACION_PLANTILLA)
      references CALIFICACION_PLANTILLA (ID_CALIFICACION_PLANTILLA) on delete restrict on update restrict;

alter table ASIGNATURA_PERIODO add constraint FK_RELATIONSHIP_3 foreign key (ID_ASIGNATURA)
      references ASIGNATURA (ID_ASIGNATURA) on delete restrict on update restrict;

alter table ASIGNATURA_PERIODO add constraint FK_RELATIONSHIP_4 foreign key (ID_AULA)
      references AULA (ID_AULA) on delete restrict on update restrict;

alter table CALIFICACION_PLANTILLA_DETALLE add constraint FK_RELATIONSHIP_11 foreign key (ID_CALIFICACION_PLANTILLA)
      references CALIFICACION_PLANTILLA (ID_CALIFICACION_PLANTILLA) on delete restrict on update restrict;

alter table ESTUDIANTE add constraint FK_RELATIONSHIP_22 foreign key (NICK)
      references USUARIO (NICK) on delete restrict on update restrict;

alter table ESTUDIANTE add constraint FK_RELATIONSHIP_25 foreign key (ID_CARRERA)
      references CARRERA (ID_CARRERA) on delete restrict on update restrict;

alter table ESTUDIANTE_ASIGNATURA add constraint FK_RELATIONSHIP_21 foreign key (ID_ESTUDIANTE)
      references ESTUDIANTE (ID_ESTUDIANTE) on delete restrict on update restrict;

alter table ESTUDIANTE_ASIGNATURA add constraint FK_RELATIONSHIP_6 foreign key (ID_ASIGNATURA_PERIODO)
      references ASIGNATURA_PERIODO (ID_ASIGNATURA_PERIODO) on delete restrict on update restrict;

alter table NOTA add constraint FK_RELATIONSHIP_16 foreign key (ID_ESTUDIANTE_ASIGNATURA)
      references ESTUDIANTE_ASIGNATURA (ID_ESTUDIANTE_ASIGNATURA) on delete restrict on update restrict;

alter table NOTA add constraint FK_RELATIONSHIP_17 foreign key (ID_ACTIVIDAD_ACADEMICA)
      references ACTIVIDAD_ACADEMICA (ID_ACTIVIDAD_ACADEMICA) on delete restrict on update restrict;

alter table PARCIAL_PLANTILLA_DETALLE add constraint FK_RELATIONSHIP_12 foreign key (ID_PARCIAL_PLANTILLA)
      references PARCIAL_PLANTILLA (ID_PARCIAL_PLANTILLA) on delete restrict on update restrict;

alter table PERIODO_ACADEMICO add constraint FK_RELATIONSHIP_13 foreign key (ID_PARCIAL_PLANTILLA)
      references PARCIAL_PLANTILLA (ID_PARCIAL_PLANTILLA) on delete restrict on update restrict;

alter table PROFESOR add constraint FK_RELATIONSHIP_23 foreign key (NICK)
      references USUARIO (NICK) on delete restrict on update restrict;

alter table RESPUESTAS add constraint FK_RELATIONSHIP_19 foreign key (ID_ACTIVIDAD_INFORMATIVA)
      references ACTIVIDAD_INFORMATIVA (ID_ACTIVIDAD_INFORMATIVA) on delete restrict on update restrict;

alter table RESPUESTAS add constraint FK_RELATIONSHIP_24 foreign key (NICK)
      references USUARIO (NICK) on delete restrict on update restrict;

alter table RESPUESTAS add constraint FK_RESPUESTAS_RELACIONADAS foreign key (RES_ID_RESPUESTA)
      references RESPUESTAS (ID_RESPUESTA) on delete restrict on update restrict;

