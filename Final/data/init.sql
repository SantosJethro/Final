CREATE DATABASE final;

use final;

CREATE TABLE Replied (
	Topic id INT(11)  PRIMARY KEY, 
	name VARCHAR(30) NOT NULL,
	reply VARCHAR(30) NOT NULL

	);

CREATE TABLE Topic (
	id INT(11) PRIMARY KEY, 
	name VARCHAR(30) NOT NULL,
 	topic VARCHAR(30) NOT NULL
);