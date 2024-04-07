DROP TABLE IF EXISTS Actividad CASCADE
;

DROP TABLE IF EXISTS Calificacion CASCADE
;

DROP TABLE IF EXISTS Ciudad CASCADE
;

DROP TABLE IF EXISTS Cliente CASCADE
;

DROP TABLE IF EXISTS Horario CASCADE
;

DROP TABLE IF EXISTS Mensajero CASCADE
;

DROP TABLE IF EXISTS Pago CASCADE
;

DROP TABLE IF EXISTS PagoServicio CASCADE
;

DROP TABLE IF EXISTS Servicio CASCADE
;

DROP TABLE IF EXISTS Tarifa CASCADE
;

/* Create Tables */

CREATE TABLE Actividad
(
	n_direccion varchar(50) NOT NULL,    -- Conjunto de letras y números el cual identifica el lugar donde tiene que ir el mensajero a entregar un paquete, llevar o pagar un documento 
	n_descripcion varchar(1256) NOT NULL,    -- Cadena de texto en el cual el cliente da con detalles lo que tiene que realizar el mensajero 
	k_idTrayecto serial NOT NULL,    -- Consecutivo con el que se identifica el trayecto que tiene que hacer un mensajero en determinado servicio 
	k_idServicio serial NOT NULL
)
;

CREATE TABLE Calificacion
(
	k_idCalificacion serial NOT NULL,    -- Consecutivo con el que se identifica la calificación que hizo un cliente por el servicio que se le brindó
	q_calificacion smallint NOT NULL,    -- Clasificación del nivel de satisfacción por el servicio de mensajeria que se le brindó. Es una lista de opciones que va de 1 a 5 
	n_observacion varchar(200) NOT NULL,    -- Nota escrita que aclara con detalles como fue el servicio que se le brindó. Este es una cadena de texto 
	k_idServicio serial NOT NULL
)
;

CREATE TABLE Ciudad
(
	k_codigoPostal numeric(12) NOT NULL,    -- Combinación de números que se asigna a ciertas zonas para identificarlas y hacer más fácil la clasificación y entrega del correo o paquetes 
	v_porcentajeComision smallint NOT NULL,    -- Dinero calculado dependiendo de la ciudad 
	n_nombre varchar(50) NOT NULL    -- Conjunto de palabras con el que se diferencia una ciudad. Es una cadena de texto 
)
;

CREATE TABLE Cliente
(
	k_idCliente serial NOT NULL,    -- Número unico con el que se identifica un cliente 
	n_nombre varchar(50) NOT NULL,    -- Conjunto de palabras con el que se distingue al cliente. Es una cadena de texto
	n_apellido varchar(50) NOT NULL,    -- Nombre que sigue al nombre de pila del cliente y que se transmite de padres a hijos. Es una cadena de texto
	n_correo varchar(50) NOT NULL,    -- Servicio en línea que permite enviar y recibir mensajes del cliente
	n_direccion varchar(50) NOT NULL,    -- Conjunto de letras y números que distinguen el lugar de residencia del cliente 
	k_idServicio numeric(36) NULL,
	q_telefono numeric(12) NOT NULL    -- Número telefónico con el que se puede comunicar con el cliente. Se compone por 10 dígitos
)
;

CREATE TABLE Horario
(
	k_idHorario serial NOT NULL,    -- Consecutivo con el que se identifica el horario y la disponibilidad de un mensajero 
	n_dia varchar(50) NOT NULL,    -- dia de la semana que tiene disponible el mensajero
	v_horaInicio time without time zone NOT NULL,    -- Hora desde la que el mensajero esta disponible
	v_horaFin time without time zone NOT NULL,    -- Hora limite en la que el mensajero puede llegar a prestar el servicio
	k_documentoMensajero numeric(12) NOT NULL,    -- Numero de documento del mensajero al que corresponde el horario
	k_tipoDocumento varchar(22) NOT NULL    -- Tipo de documento del mensajero al que corresponde el horario
)
;

CREATE TABLE Mensajero
(
	k_documento numeric(12) NOT NULL,    -- Numero de documento del mensajero
	k_tipoDocumento varchar(22) NOT NULL,    -- Describe si el documento del mensajero es una cedula de ciudadanía, extranjera o pasaporte
	n_tipoServicio varchar(50) NOT NULL,    -- Describe lo que va a realizar el mensajero, ya sea entregar paquetes, o documentos
	n_vehiculo varchar(50) NOT NULL,    --  Tipo de medio con el que presta el servicio, ya sea moto o bicicleta
	v_seguridadSocial boolean NOT NULL,    -- Indica si cotiza seguridad social o no 
	n_correo varchar(50) NOT NULL,    -- Servicio en línea que permite enviar y recibir mensajes del mensajero
	n_nacionalidad varchar(50) NOT NULL,    -- Indica la nación u Estado donde nació el mensajero
	f_fechaNacimiento date NOT NULL,    -- Fecha que indica el día el cual nació una persona. Está compuesta por el día, mes y año
	q_telefono numeric(12) NOT NULL,    --  Número telefónico con el que se puede comunicar con el mensajero. Se compone por 10 dígitos
	n_sexo varchar(10) NOT NULL    --  Identidad de genero del mensajero. Este se describe por una cadena de texto
)
;

CREATE TABLE Pago
(
	k_idPago serial NOT NULL,    -- Consecutivo con el que se identifica la comision pagada al mensajero 
	f_fechaInicio date NOT NULL,    -- Fecha de inicio el cual se le paga la comisión al mensajero. Este se registra con los datos de día, mes y año
	f_fechaFIn date NOT NULL,    -- Fecha de finalización el cual se le paga la comisión al mensajero. Este se registra con los datos de día, mes y año
	n_estado varchar(50) NOT NULL,    -- Clasificacion de como se encuentra el pago al mensajero. Tiene las opciones de realizado o no realizado 
	k_documentoMensajero numeric(12) NULL,    -- Numero de documento del mensajero al que pagar
	k_tipoDocumento varchar(22) NULL    -- Tipo de documento del mensajero al que pagar
)
;

CREATE TABLE PagoServicio
(
	k_numRef serial NOT NULL,    -- Consecutivo con el que se identifica el pago que hizo un cliente por el servicio 
	q_valorPagado integer NOT NULL,    -- Cantidad de dinero que un cliente paga por el servicio de mensajeria que se le ha prestado 
	n_formaPago varchar(24) NOT NULL,    -- Clasificación de como el cliente paga el servicio. Estan las opciones de pagar en efectivo o con PSE
	k_idServicio serial NOT NULL    -- Identificador del servicio al que se está realizando el pago
)
;

CREATE TABLE Servicio
(
	k_idServicio serial NOT NULL,    -- Consecutivo con el que se identifica un servicio 
	n_tipoPaquete varchar(16) NOT NULL,    -- Clasificación de lo que tiene que transportar el mensajero. Esta la opción de paquete pequeño, mediano, grande o documento 
	f_fechaSolicitud date NOT NULL,    -- Fecha en donde el cliente solicita el servicio de mensajeria. Queda registrado con los datos de día, mes y año
	n_estado varchar(12) NOT NULL,    -- Clasificación de como se encuentra el servicio que solicitó un cliente. Tiene las opciones de iniciado, cancelado o terminado 
	k_codigoPostal numeric(12) NOT NULL,    -- Combinación de números que se asigna a ciertas zonas para clasificarlas y hacer más fácil la clasificación y entrega del correo o paquetes 
	k_idCliente serial NOT NULL,
	h_hora time without time zone NOT NULL,    -- Indica la hora a la que debe iniciar el servicio
	i_tipoServicio varchar(13) NOT NULL,    -- Clasifica el tipo de servicio: si es solo ida o ida y vuelta
	k_documentoMensajero numeric(12) NULL,    -- Numero de documento del mensajero asignado a realizar el servicio
	k_tipoDocumento varchar(22) NULL    -- Tipo de documento del mensajero asignado a realizar el servicio
)
;

CREATE TABLE Tarifa
(
	k_idTarifa serial NOT NULL,    -- Consecutivo con el que se identifica la tarifa que tiene un servicio en cada ciudad 
	n_tipoPaquete varchar(50) NOT NULL,    -- Clasificación de lo que tiene que transportar el mensajero. Esta la opción de paquete pequeño, mediano, grande o documento 
	q_costo integer NOT NULL,    -- Precio que tiene el servicio de mensajeria que un cliente haya solicitado 
	k_codigoPostal numeric(12) NOT NULL    -- Código postal de la ciudad a la cual pertenece esta tarifa.
)
;

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE Actividad ADD CONSTRAINT PK_Actividad
	PRIMARY KEY (k_idTrayecto)
;

ALTER TABLE Calificacion ADD CONSTRAINT CK_Calificacion CHECK (q_calificacion >= 1 and q_calificacion <= 5)
;

ALTER TABLE Ciudad ADD CONSTRAINT PK_Ciudad
	PRIMARY KEY (k_codigoPostal)
;

ALTER TABLE Ciudad ADD CONSTRAINT CK_PorcentajeComision CHECK (v_porcentajeComision >= 0 and v_porcentajeComision <= 100)
;

ALTER TABLE Cliente ADD CONSTRAINT PK_Cliente
	PRIMARY KEY (k_idCliente)
;

ALTER TABLE Cliente ADD CONSTRAINT CK_correo CHECK (n_correo LIKE '%@%.%')
;

ALTER TABLE Horario ADD CONSTRAINT PK_Horario
	PRIMARY KEY (k_idHorario)
;

ALTER TABLE Mensajero ADD CONSTRAINT PK_Mensajero
	PRIMARY KEY (k_documento,k_tipoDocumento)
;

ALTER TABLE Mensajero ADD CONSTRAINT CK_correo CHECK (n_correo LIKE '%@%.%')
;

ALTER TABLE Mensajero ADD CONSTRAINT CK_tipoDocumento CHECK (k_tipoDocumento IN ('Cédula de Ciudadanía', 'Cédula de Extranjería', 'Pasaporte'))
;

ALTER TABLE Pago ADD CONSTRAINT PK_Pago
	PRIMARY KEY (k_idPago)
;

ALTER TABLE Pago ADD CONSTRAINT CK_fechaFin CHECK (f_fechaFIn > f_fechaInicio)
;

ALTER TABLE PagoServicio ADD CONSTRAINT PK_PagoServicio
	PRIMARY KEY (k_numRef)
;

ALTER TABLE PagoServicio ADD CONSTRAINT CK_ValorPagado CHECK (q_valorPagado >= 0)
;

ALTER TABLE Servicio ADD CONSTRAINT PK_idServicio
	PRIMARY KEY (k_idServicio)
;

ALTER TABLE Servicio ADD CONSTRAINT CK_tipoServicio CHECK (i_tipoServicio IN ('solo ida', 'ida y vuelta'))
;

ALTER TABLE Servicio ADD CONSTRAINT CK_estado CHECK (n_estado IN ('En cola', 'Finalizado', 'En ejecución'))
;

ALTER TABLE Tarifa ADD CONSTRAINT PK_Tarifa
	PRIMARY KEY (k_idTarifa)
;

ALTER TABLE Tarifa ADD CONSTRAINT CK_Costo CHECK (q_costo >= 0)
;

/* Create Foreign Key Constraints */

ALTER TABLE Actividad ADD CONSTRAINT FK_Actividad_Servicio
	FOREIGN KEY (k_idServicio) REFERENCES Servicio (k_idServicio) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE Calificacion ADD CONSTRAINT "FK_Calificación_Servicio"
	FOREIGN KEY (k_idServicio) REFERENCES Servicio (k_idServicio) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE PagoServicio ADD CONSTRAINT FK_PagoServicio_Servicio
	FOREIGN KEY (k_idServicio) REFERENCES Servicio (k_idServicio) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE Servicio ADD CONSTRAINT FK_Servicio_Ciudad
	FOREIGN KEY (k_codigoPostal) REFERENCES Ciudad (k_codigoPostal) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE Servicio ADD CONSTRAINT FK_Servicio_Cliente
	FOREIGN KEY (k_idCliente) REFERENCES Cliente (k_idCliente) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE Tarifa ADD CONSTRAINT FK_Tarifa_Ciudad
	FOREIGN KEY (k_codigoPostal) REFERENCES Ciudad (k_codigoPostal) ON DELETE No Action ON UPDATE No Action
;

/* Create Table Comments, Sequences for Autonumber Columns */

COMMENT ON TABLE Actividad
	IS 'Trayecto o actividad a realizar en un servicio'
;

COMMENT ON COLUMN Actividad.n_direccion
	IS 'Conjunto de letras y números el cual identifica el lugar donde tiene que ir el mensajero a entregar un paquete, llevar o pagar un documento '
;

COMMENT ON COLUMN Actividad.n_descripcion
	IS 'Cadena de texto en el cual el cliente da con detalles lo que tiene que realizar el mensajero '
;

COMMENT ON COLUMN Actividad.k_idTrayecto
	IS 'Consecutivo con el que se identifica el trayecto que tiene que hacer un mensajero en determinado servicio '
;

 

 

COMMENT ON TABLE Calificacion
	IS 'Es una clasificacion de 1 a 5 del nivel de satisfaccion que tuvo por el servcio que le han brindado '
;

COMMENT ON COLUMN Calificacion.k_idCalificacion
	IS 'Consecutivo con el que se identifica la calificación que hizo un cliente por el servicio que se le brindó'
;

COMMENT ON COLUMN Calificacion.q_calificacion
	IS 'Clasificación del nivel de satisfacción por el servicio de mensajeria que se le brindó. Es una lista de opciones que va de 1 a 5 '
;

COMMENT ON COLUMN Calificacion.n_observacion
	IS 'Nota escrita que aclara con detalles como fue el servicio que se le brindó. Este es una cadena de texto '
;

 

 

COMMENT ON TABLE Ciudad
	IS 'Es el lugar en donde se realiza el servicio. Esta la ciudad de Bogotá y de Cali'
;

COMMENT ON COLUMN Ciudad.k_codigoPostal
	IS 'Combinación de números que se asigna a ciertas zonas para identificarlas y hacer más fácil la clasificación y entrega del correo o paquetes '
;

COMMENT ON COLUMN Ciudad.v_porcentajeComision
	IS 'Dinero calculado dependiendo de la ciudad '
;

COMMENT ON COLUMN Ciudad.n_nombre
	IS 'Conjunto de palabras con el que se diferencia una ciudad. Es una cadena de texto '
;

COMMENT ON TABLE Cliente
	IS 'Es la persona que pide un servicio en el software de mensajeria'
;

COMMENT ON COLUMN Cliente.k_idCliente
	IS 'Número unico con el que se identifica un cliente '
;

COMMENT ON COLUMN Cliente.n_nombre
	IS 'Conjunto de palabras con el que se distingue al cliente. Es una cadena de texto'
;

COMMENT ON COLUMN Cliente.n_apellido
	IS 'Nombre que sigue al nombre de pila del cliente y que se transmite de padres a hijos. Es una cadena de texto'
;

COMMENT ON COLUMN Cliente.n_correo
	IS 'Servicio en línea que permite enviar y recibir mensajes del cliente'
;

COMMENT ON COLUMN Cliente.n_direccion
	IS 'Conjunto de letras y números que distinguen el lugar de residencia del cliente '
;

COMMENT ON COLUMN Cliente.q_telefono
	IS 'Número telefónico con el que se puede comunicar con el cliente. Se compone por 10 dígitos'
;

 

COMMENT ON TABLE Horario
	IS 'Es la disponibilidad y horario que tiene el mensajero para hacer los servicios '
;

COMMENT ON COLUMN Horario.k_idHorario
	IS 'Consecutivo con el que se identifica el horario y la disponibilidad de un mensajero '
;

COMMENT ON COLUMN Horario.n_dia
	IS 'dia de la semana que tiene disponible el mensajero'
;

COMMENT ON COLUMN Horario.v_horaInicio
	IS 'Hora desde la que el mensajero esta disponible'
;

COMMENT ON COLUMN Horario.v_horaFin
	IS 'Hora limite en la que el mensajero puede llegar a prestar el servicio'
;

COMMENT ON COLUMN Horario.k_documentoMensajero
	IS 'Numero de documento del mensajero al que corresponde el horario'
;

COMMENT ON COLUMN Horario.k_tipoDocumento
	IS 'Tipo de documento del mensajero al que corresponde el horario'
;

 

COMMENT ON TABLE Mensajero
	IS 'Persona quien trabaja como mensajero '
;

COMMENT ON COLUMN Mensajero.k_documento
	IS 'Numero de documento del mensajero'
;

COMMENT ON COLUMN Mensajero.k_tipoDocumento
	IS 'Describe si el documento del mensajero es una cedula de ciudadanía, extranjera o pasaporte'
;

COMMENT ON COLUMN Mensajero.n_tipoServicio
	IS 'Describe lo que va a realizar el mensajero, ya sea entregar paquetes, o documentos'
;

COMMENT ON COLUMN Mensajero.n_vehiculo
	IS ' Tipo de medio con el que presta el servicio, ya sea moto o bicicleta'
;

COMMENT ON COLUMN Mensajero.v_seguridadSocial
	IS 'Indica si cotiza seguridad social o no '
;

COMMENT ON COLUMN Mensajero.n_correo
	IS 'Servicio en línea que permite enviar y recibir mensajes del mensajero'
;

COMMENT ON COLUMN Mensajero.n_nacionalidad
	IS 'Indica la nación u Estado donde nació el mensajero'
;

COMMENT ON COLUMN Mensajero.f_fechaNacimiento
	IS 'Fecha que indica el día el cual nació una persona. Está compuesta por el día, mes y año'
;

COMMENT ON COLUMN Mensajero.q_telefono
	IS ' Número telefónico con el que se puede comunicar con el mensajero. Se compone por 10 dígitos'
;

COMMENT ON COLUMN Mensajero.n_sexo
	IS ' Identidad de genero del mensajero. Este se describe por una cadena de texto'
;

COMMENT ON TABLE Pago
	IS 'Es la comision que le pagan al mensajero por hacer los servicios de mensajeria '
;

COMMENT ON COLUMN Pago.k_idPago
	IS 'Consecutivo con el que se identifica la comision pagada al mensajero '
;

COMMENT ON COLUMN Pago.f_fechaInicio
	IS 'Fecha de inicio el cual se le paga la comisión al mensajero. Este se registra con los datos de día, mes y año'
;

COMMENT ON COLUMN Pago.f_fechaFIn
	IS 'Fecha de finalización el cual se le paga la comisión al mensajero. Este se registra con los datos de día, mes y año'
;

COMMENT ON COLUMN Pago.n_estado
	IS 'Clasificacion de como se encuentra el pago al mensajero. Tiene las opciones de realizado o no realizado '
;

COMMENT ON COLUMN Pago.k_documentoMensajero
	IS 'Numero de documento del mensajero al que pagar'
;

COMMENT ON COLUMN Pago.k_tipoDocumento
	IS 'Tipo de documento del mensajero al que pagar'
;

 

COMMENT ON TABLE PagoServicio
	IS 'Se refiere el cobro que se le realiza al cliente por el servicio'
;

COMMENT ON COLUMN PagoServicio.k_numRef
	IS 'Consecutivo con el que se identifica el pago que hizo un cliente por el servicio '
;

COMMENT ON COLUMN PagoServicio.q_valorPagado
	IS 'Cantidad de dinero que un cliente paga por el servicio de mensajeria que se le ha prestado '
;

COMMENT ON COLUMN PagoServicio.n_formaPago
	IS 'Clasificación de como el cliente paga el servicio. Estan las opciones de pagar en efectivo o con PSE'
;

COMMENT ON COLUMN PagoServicio.k_idServicio
	IS 'Identificador del servicio al que se está realizando el pago'
;

 

 

COMMENT ON TABLE Servicio
	IS 'Software de servicio de mensajeria '
;

COMMENT ON COLUMN Servicio.k_idServicio
	IS 'Consecutivo con el que se identifica un servicio '
;

COMMENT ON COLUMN Servicio.n_tipoPaquete
	IS 'Clasificación de lo que tiene que transportar el mensajero. Esta la opción de paquete pequeño, mediano, grande o documento '
;

COMMENT ON COLUMN Servicio.f_fechaSolicitud
	IS 'Fecha en donde el cliente solicita el servicio de mensajeria. Queda registrado con los datos de día, mes y año'
;

COMMENT ON COLUMN Servicio.n_estado
	IS 'Clasificación de como se encuentra el servicio que solicitó un cliente. Tiene las opciones de iniciado, cancelado o terminado '
;

COMMENT ON COLUMN Servicio.k_codigoPostal
	IS 'Combinación de números que se asigna a ciertas zonas para clasificarlas y hacer más fácil la clasificación y entrega del correo o paquetes '
;

COMMENT ON COLUMN Servicio.h_hora
	IS 'Indica la hora a la que debe iniciar el servicio'
;

COMMENT ON COLUMN Servicio.i_tipoServicio
	IS 'Clasifica el tipo de servicio: si es solo ida o ida y vuelta'
;

COMMENT ON COLUMN Servicio.k_documentoMensajero
	IS 'Numero de documento del mensajero asignado a realizar el servicio'
;

COMMENT ON COLUMN Servicio.k_tipoDocumento
	IS 'Tipo de documento del mensajero asignado a realizar el servicio'
;

 

 

COMMENT ON TABLE Tarifa
	IS 'Es el valor calculado para el cobro del servicio, este depende del trayecto y de la ciudad '
;

COMMENT ON COLUMN Tarifa.k_idTarifa
	IS 'Consecutivo con el que se identifica la tarifa que tiene un servicio en cada ciudad '
;

COMMENT ON COLUMN Tarifa.n_tipoPaquete
	IS 'Clasificación de lo que tiene que transportar el mensajero. Esta la opción de paquete pequeño, mediano, grande o documento '
;

COMMENT ON COLUMN Tarifa.q_costo
	IS 'Precio que tiene el servicio de mensajeria que un cliente haya solicitado '
;

COMMENT ON COLUMN Tarifa.k_codigoPostal
	IS 'Código postal de la ciudad a la cual pertenece esta tarifa.'
;

INSERT INTO Ciudad
VALUES(110, 20, 'Bogotá'),
(76000, 30, 'Cali');

INSERT INTO Tarifa(n_TipoPaquete, q_costo, k_codigoPostal)
VALUES('Documento', 5000, 110),
('Paquete Pequeño', 10000, 110),
('Paquete Mediano', 15000, 110),
('Paquete Grande', 20000, 110),
('Documento', 6000, 76000),
('Paquete Pequeño', 12000, 76000),
('Paquete Mediano', 18000, 76000),
('Paquete Grande', 24000, 76000);
	
INSERT INTO Cliente(n_nombre, n_apellido, n_correo, n_direccion, q_telefono)
VALUES('Prueba', 'Fundamentos', 'puebaFB@gmail.com', 'Sede 40', 3134561245);
 
INSERT INTO Mensajero
VALUES(1045684536, 'Cédula de Ciudadanía', 'Documento', 'Moto', true, '104@gmail.com', 'Colombiano', '01/12/1998', 3234561289, 'F');

INSERT INTO Servicio(n_tipoPaquete, f_fechaSolicitud, n_estado, k_codigoPostal, k_idCliente, h_hora, i_tipoServicio, k_documentoMensajero, k_tipoDocumento)
VALUES('Documento', '28/11/2023', 'En cola', '110', 1, '15:04', 'solo ida', 1045684536, 'Cédula de Ciudadanía');

SELECT * FROM Servicio;