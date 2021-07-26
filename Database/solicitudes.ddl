-- Generado por Oracle SQL Developer Data Modeler 21.1.0.092.1221
--   en:        2021-07-26 16:09:55 COT
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g



-- predefined type, no DDL - MDSYS.SDO_GEOMETRY

-- predefined type, no DDL - XMLTYPE

CREATE TABLE dias (
    id      INTEGER NOT NULL,
    nombre  VARCHAR2(10) NOT NULL
);

ALTER TABLE dias ADD CONSTRAINT dias_pk PRIMARY KEY ( id );

CREATE TABLE dias_solicitudes (
    solicitudes_id  INTEGER NOT NULL,
    dias_id         INTEGER NOT NULL
);

ALTER TABLE dias_solicitudes ADD CONSTRAINT dias_solicitudes_pk PRIMARY KEY ( solicitudes_id,
                                                                              dias_id );

INSERT INTO `dias` (`id`, `nombre`) VALUES
(1, 'lunes'),
(2, 'martes'),
(3, 'miércoles'),
(4, 'jueves'),
(5, 'viernes'),
(6, 'sábado'),
(7, 'domingo');

CREATE TABLE jefes (
    id                INTEGER NOT NULL,
    nombre            VARCHAR2(85) NOT NULL,
    primer_apellido   VARCHAR2(85) NOT NULL,
    segundo_apellido  VARCHAR2(85),
    celular           VARCHAR2(20) NOT NULL,
    identificacion    VARCHAR2(15) NOT NULL,
    email             VARCHAR2(100) NOT NULL,
    create_at         DATE NOT NULL
);

ALTER TABLE jefes ADD CONSTRAINT jefes_pk PRIMARY KEY ( id );

INSERT INTO `jefes` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `celular`, `identificacion`, `email`, `create_at`) VALUES
(1, 'Zlatan', 'Ibrahimovic', '', '12345678','12345678',, '987456321' 'zi@correo.com', '2021-07-24'),
(2, 'Lionel Andrés ', 'Messi', 'Cuccittini', '741258963', 'lamc@correo.com', '2021-07-24'),
(3, 'Cristiano', 'Ronaldo', '', '9513578462', '856134654', 'cr@correo.com', '2021-07-24');

CREATE TABLE personas (
    id                INTEGER NOT NULL,
    nombre            VARCHAR2(85) NOT NULL,
    primer_apellido   VARCHAR2(85) NOT NULL,
    segundo_apellido  VARCHAR2(85),
    email             VARCHAR2(200) NOT NULL,
    identificacion    VARCHAR2(10) NOT NULL,
    create_at         DATE NOT NULL,
    jefes_id          INTEGER NOT NULL
);

INSERT INTO `personas` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`,`identificacion`, `email`, `create_at`,  `jefes_id`) VALUES
(1, 'Sergio', 'Aguero', NULL, '645132', 'sa@correo.com', '2021-07-24', 1),
(2, 'Mario', 'Gotze', NULL, '8431321','mg@correo.com', '2021-07-24',  3),
(3, 'Sergio ', 'Ramos', NULL, 'sr@correo.com', '2021-07-24', '84313', 1),
(4, 'David', 'de Gea', 'Quintana', '113315545', 'ddq@correo.co', '2021-07-24',  1),
(5, 'Kalidou', 'Koulibaly', NULL, '555313','kk@correo.com', '2021-07-24',  2),
(6, 'N\'Golo ', 'Kanté ', NULL, '16311355','nk@correo.com', '2021-07-24',  2),
(7, 'Marco', 'Reus', NULL, '55333135','mr@correo.com', '2021-07-24',  3),
(8, 'Eden', 'Hazard', NULL,  '555656','eh@correo.com', '2021-07-24', 3),
(9, 'Luis Alberto', 'Suarez', 'Díaz', '335546486','lasd@correo.com', '2021-07-24',  2),
(10, 'Neymar', 'Junior', NULL, '45313513','nj@correo.com', '2021-07-24',  3);


ALTER TABLE personas ADD CONSTRAINT personas_pk PRIMARY KEY ( id );

CREATE TABLE solicitantes (
    id                INTEGER NOT NULL,
    nombre            VARCHAR2(85),
    primer_apellido   VARCHAR2(85),
    segundo_apellido  VARCHAR2(85),
    celular           VARCHAR2(15) NOT NULL,
    create_at         DATE NOT NULL,
    jefes_id          INTEGER NOT NULL
);

ALTER TABLE solicitantes ADD CONSTRAINT solicitantes_pk PRIMARY KEY ( id );

CREATE TABLE solicitudes (
    id               INTEGER NOT NULL,
    fecha_solicitud  DATE NOT NULL,
    tipo_ausentismo  VARCHAR2(100) NOT NULL,
    fecha_inicio     DATE NOT NULL,
    fecha_fin        DATE NOT NULL,
    hora_inicio      DATE NOT NULL,
    hora_fin         DATE NOT NULL,
    frecuencia       VARCHAR2(50) NOT NULL,
    explicacion      VARCHAR2(200) NOT NULL,
    estado           CHAR(1) NOT NULL,
    solicitantes_id  INTEGER NOT NULL,
    jefes_id         INTEGER NOT NULL,
    personas_id      INTEGER NOT NULL,
);

ALTER TABLE solicitudes ADD CONSTRAINT solicitudes_pk PRIMARY KEY ( id );

ALTER TABLE dias_solicitudes
    ADD CONSTRAINT dias_solicitudes_dias_fk FOREIGN KEY ( dias_id )
        REFERENCES dias ( id );

--  ERROR: FK name length exceeds maximum allowed length(30) 
ALTER TABLE dias_solicitudes
    ADD CONSTRAINT dias_solicitudes_solicitudes_fk FOREIGN KEY ( solicitudes_id )
        REFERENCES solicitudes ( id );

ALTER TABLE personas
    ADD CONSTRAINT personas_jefes_fk FOREIGN KEY ( jefes_id )
        REFERENCES jefes ( id );

ALTER TABLE solicitantes
    ADD CONSTRAINT solicitantes_jefes_fk FOREIGN KEY ( jefes_id )
        REFERENCES jefes ( id );

ALTER TABLE solicitudes
    ADD CONSTRAINT solicitudes_jefes_fk FOREIGN KEY ( jefes_id )
        REFERENCES jefes ( id );

ALTER TABLE solicitudes
    ADD CONSTRAINT solicitudes_personas_fk FOREIGN KEY ( personas_id )
        REFERENCES personas ( id );

ALTER TABLE solicitudes
    ADD CONSTRAINT solicitudes_solicitantes_fk FOREIGN KEY ( solicitantes_id )
        REFERENCES solicitantes ( id );



-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                             6
-- CREATE INDEX                             0
-- ALTER TABLE                             13
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE MATERIALIZED VIEW LOG             0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   1
-- WARNINGS                                 0
