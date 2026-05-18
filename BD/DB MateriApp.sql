DROP DATABASE IF EXISTS materiapp;

CREATE DATABASE materiapp;
USE materiapp;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombresCompletos VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    celular VARCHAR(20),
    rol VARCHAR(50) NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    fechaRegistro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cedulas_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    activa BOOLEAN DEFAULT TRUE
);

CREATE TABLE inventario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    serial VARCHAR(100) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    marca VARCHAR(50),
    referencia VARCHAR(100),
    codigoProducto VARCHAR(50),
    cantidad INT NOT NULL DEFAULT 0,
    bodega VARCHAR(100),
    codigoBodega VARCHAR(50)
);

CREATE TABLE solicitudes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuarioId INT NOT NULL,
    estado VARCHAR(50) NOT NULL,
    fechaSolicitud DATETIME DEFAULT CURRENT_TIMESTAMP,
    aprobadoPor INT,
    motivoRechazo TEXT,

    CONSTRAINT fk_solicitud_usuario
        FOREIGN KEY (usuarioId)
        REFERENCES usuarios(id),

    CONSTRAINT fk_solicitud_aprobador
        FOREIGN KEY (aprobadoPor)
        REFERENCES usuarios(id)
);

CREATE TABLE detalle_solicitud (
    id INT AUTO_INCREMENT PRIMARY KEY,
    solicitudId INT NOT NULL,
    inventarioId INT NOT NULL,
    cantidad INT NOT NULL,
    observaciones TEXT,

    CONSTRAINT fk_detalle_solicitud
        FOREIGN KEY (solicitudId)
        REFERENCES solicitudes(id),

    CONSTRAINT fk_detalle_inventario
        FOREIGN KEY (inventarioId)
        REFERENCES inventario(id)
);

CREATE TABLE historial_movimientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    solicitudId INT NOT NULL,
    usuarioId INT NOT NULL,
    accion VARCHAR(100) NOT NULL,
    fechaAccion DATETIME DEFAULT CURRENT_TIMESTAMP,
    estadoAnterior VARCHAR(50),
    estadoNuevo VARCHAR(50),

    CONSTRAINT fk_historial_solicitud
        FOREIGN KEY (solicitudId)
        REFERENCES solicitudes(id),

    CONSTRAINT fk_historial_usuario
        FOREIGN KEY (usuarioId)
        REFERENCES usuarios(id)
);