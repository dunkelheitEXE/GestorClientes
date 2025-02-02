-- Active: 1733938264051@@127.0.0.1@3306@gestor
CREATE DATABASE gestor;
USE gestor;

CREATE TABLE client (
    client_id BIGINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    address VARCHAR(400),
    phone VARCHAR(10),
    email VARCHAR(255),
    PRIMARY KEY(client_id)
);

CREATE TABLE device (
    device_id BIGINT NOT NULL AUTO_INCREMENT,
    client_id BIGINT NOT NULL,
    type VARCHAR(255),
    brand VARCHAR(255),
    model VARCHAR(255),
    serial_number VARCHAR(255),
    purchase_date DATETIME,
    PRIMARY KEY(device_id),
    FOREIGN KEY (client_id) REFERENCES client(client_id)
);

CREATE TABLE technician (
    technician_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    specialization VARCHAR(255),
    phone VARCHAR(10),
    email VARCHAR(255),
    PRIMARY KEY(technician_id)
);

CREATE TABLE maintenancefile (
    file_id BIGINT NOT NULL AUTO_INCREMENT,
    device_id BIGINT NOT NULL,
    technician_id INT NOT NULL,
    start_date DATETIME,
    final_date DATETIME,
    description VARCHAR(500),
    diagnostic VARCHAR(255),
    state VARCHAR(255),
    PRIMARY KEY(file_id),
    FOREIGN KEY(device_id) REFERENCES device(device_id),
    FOREIGN KEY(technician_id) REFERENCES technician(technician_id) 
);

ALTER TABLE maintenancefile MODIFY start_date DATETIME NOT NULL;
ALTER TABLE maintenancefile MODIFY final_date DATETIME NOT NULL;
ALTER TABLE maintenancefile MODIFY description VARCHAR(500) NOT NULL;
ALTER TABLE maintenancefile MODIFY diagnostic VARCHAR(255) NOT NULL;

CREATE TABLE sparepart (
    id BIGINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(500) NOT NULL,
    unit_price DOUBLE NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE sparepartused (
    id BIGINT NOT NULL AUTO_INCREMENT,
    file_id BIGINT NOT NULL,
    sparepart BIGINT NOT NULL,
    amount BIGINT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(file_id) REFERENCES maintenancefile(file_id),
    FOREIGN KEY(sparepart) REFERENCES sparepart(id)
);

CREATE TABLE services (
    service_id BIGINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(500) NOT NULL,
    price DOUBLE NOT NULL,
    PRIMARY KEY(service_id)
);

CREATE TABLE invoices (
    invoice_id BIGINT NOT NULL AUTO_INCREMENT,
    file_id BIGINT NOT NULL,
    realse DATETIME NOT NULL,
    total DOUBLE NOT NULL,
    PRIMARY KEY(invoice_id),
    FOREIGN KEY(file_id) REFERENCES maintenancefile(file_id)
);


CREATE TABLE payment (
    payment_id BIGINT NOT NULL AUTO_INCREMENT,
    file_id BIGINT NOT NULL,
    date DATETIME NOT NULL,
    amount DOUBLE NOT NULL,
    payment_method VARCHAR(255),
    PRIMARY KEY(payment_id),
    FOREIGN KEY(file_id) REFERENCES maintenancefile(file_id)
);

CREATE TABLE servicedone (
    id BIGINT NOT NULL AUTO_INCREMENT,
    file_id BIGINT NOT NULL,
    service_id BIGINT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(file_id) REFERENCES maintenancefile(file_id),
    FOREIGN KEY(service_id) REFERENCES services(service_id)
);

--
-- ADMIN TABLES
--

CREATE TABLE user(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(500) NOT NULL,
    PRIMARY KEY(id)
);

ALTER TABLE `user` MODIFY name VARCHAR(255) NOT NULL UNIQUE;
