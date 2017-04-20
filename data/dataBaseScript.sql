CREATE DATABASE restaurantDB;

CREATE TABLE Users (
	uFName VARCHAR(20) NOT NULL,
	uLName VARCHAR(20) NOT NULL,
	userName VARCHAR(15) NOT NULL PRIMARY KEY,
	uPassword VARCHAR(30) NOT NULL,
	uEmail VARCHAR(25) NOT NULL,
	uAddress VARCHAR(70) NOT NULL
);

CREATE TABLE Menu (
	mID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	mName VARCHAR(70) NOT NULL,
	mDescription VARCHAR(70) NOT NULL,
	mPrice INT NOT NULL
);

CREATE TABLE Orders (
	orderID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	oUserName VARCHAR(15) NOT NULL REFERENCES Users(userName),
	oTotalPrice INT NOT NULL,
	oAddress VARCHAR(70) NOT NULL REFERENCES Users(uAddress),
	oToGo BOOLEAN NOT NULL
);

CREATE TABLE OrderItems (
	oiID INT NOT NULL REFERENCES Orders(orderID),
	oiMenuItem VARCHAR(70) NOT NULL REFERENCES Menu(mID),
	PRIMARY KEY (oiID, oiMenuItem)
);

INSERT INTO Users(uFName, uLName, userName, uPassword, uEmail, uAddress)
VALUES ('Luis', 'Flores', 'lucfg', 'password123', 'luis@mail.com', 'Calle 3 1234, Colonia Imag, Mty, NL'),
	   ('Abelardo', 'Gonzalez', 'abegzz', 'abe123', 'abe@mail.com', 'Calle 7 4376, Colonia 3, Mty, NL');

INSERT INTO Menu(mName, mDescription, mPrice)
VALUES ('Camarones Empanizados', 'Camarones empanizados, acompanados de distintos aperitivos', 110),
	   ('Filete Empanizado', 'Filete de pescado empanizado, acompanado de distintos aperitivos', 80),
	   ('Coctel de Camaron', 'Incluye camaron, tomate y cebolla, banado de salsa de tomate', 75),
	   ('Ensalada Regia', 'Contiene lechuga italiana, huevo cocido, chile morron, pollo y tomate', 70),
	   ('Mojarra Frita', 'Mojarra frita, acompanada de distintos aperitivos', 120),
	   ('Rebanada de Pastel', 'Deliciosa rebanada de pastel de queso cubierto de mermelada de fresa', 40),
	   ('Nuggets de Pescado', '6 piezas de nuggets, acompanados de papas y arroz', 50);

INSERT INTO Orders(oUserName, oTotalPrice, oAddress, oToGo)
VALUES ('abegzz', 120, 'Calle 7 4376, Colonia 3, Mty, NL', TRUE),
	   ('lucfg', 110, 'Restuarante', FALSE);

INSERT INTO OrderItems(oiID, oiMenuItem)
VALUES (1, 'Mojarra Frita'),
	   (2, 'Ensalada Regia'),
	   (2, 'Rebanada de Pastel');