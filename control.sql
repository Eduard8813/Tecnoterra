CREATE DATABASE TecnoTerra;

USE TecnoTerra;

CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  city VARCHAR(100) NOT NULL,
  region VARCHAR(100) NOT NULL,
  area VARCHAR(100) NOT NULL,
  cultivo VARCHAR(100) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  photo VARCHAR(255) NULL,  
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE cultivos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE areas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE ciudades (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE regiones (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL UNIQUE
);

ALTER TABLE users
ADD CONSTRAINT fk_cultivo FOREIGN KEY (cultivo) REFERENCES cultivos(id),
ADD CONSTRAINT fk_area FOREIGN KEY (area) REFERENCES areas(id),
ADD CONSTRAINT fk_city FOREIGN KEY (city) REFERENCES ciudades(id),
ADD CONSTRAINT fk_region FOREIGN KEY (region) REFERENCES regiones(id);
