DROP DATABASE IF EXISTS servdeskqroma;

CREATE DATABASE servdeskqroma;

USE servdeskqroma;

CREATE TABLE tba_perfilusuario(
	CodPerfil INT AUTO_INCREMENT PRIMARY KEY,
	NombrePerfil VARCHAR(100)
);

CREATE TABLE tba_usuarios(
	CodUsuario INT AUTO_INCREMENT PRIMARY KEY,
	NombreUsuario VARCHAR(100) NOT NULL,
	AreaUsuario VARCHAR(100) NOT NULL,
	CorreoUsuario VARCHAR(100) NOT NULL,
	CodPerfil INT NOT NULL,
	PasswordUsuario VARCHAR(150) NOT NULL,
	UltimaConexion DATE NOT NULL,
	
	FOREIGN KEY (CodPerfil) REFERENCES tba_perfilusuario(CodPerfil)
);

INSERT INTO `tba_perfilusuario` VALUES (1, 'Administrador');
INSERT INTO `tba_perfilusuario` VALUES (2, 'Solicitante');
INSERT INTO `tba_perfilusuario` VALUES (3, 'Asistente');