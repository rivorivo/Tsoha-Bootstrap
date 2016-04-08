-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE kokkaajat(
	id SERIAL PRIMARY KEY,
	name varchar(50) NOT NULL,
	password varchar(50) NOT NULL
);

CREATE TABLE rakategoriat(
	id SERIAL PRIMARY KEY,
	name varchar(50) NOT NULL
);

CREATE TABLE raakaaineet(
	id SERIAL PRIMARY KEY,
	rakategoria_id INTEGER REFERENCES rakategoriat(id),
	name varchar(50) NOT NULL,
	sesonkiAlku DATE,
	sesonkiLoppu DATE,
	kilohinta decimal
);

CREATE TABLE reseptit(
id SERIAL PRIMARY KEY,
kokkaaja_id INTEGER REFERENCES kokkaajat(id),
name varchar(50) NOT NULL,
kuvaus varchar(500) NOT NULL,
lisatty DATE
);

CREATE TABLE ainekset(
resepti_id INTEGER REFERENCES reseptit(id),
raakaaine_id INTEGER REFERENCES raakaaineet(id)
);

