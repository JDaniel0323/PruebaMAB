create database MAB;
use MAB;

Create table PRODUCTOS(
	id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre varchar(150) not null,
    Precio int not null,
    stock int not null
);

insert into PRODUCTOS values (null, "Computador", 3300000, 5);