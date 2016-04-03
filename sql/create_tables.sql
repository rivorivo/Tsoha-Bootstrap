-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE kokkaaja(
	id SERIAL PRIMARY KEY,
	name varchar(50) NOT NULL,
	password varchar(50) NOT NULL
);

CREATE TABLE rakategoria(
	id SERIAL PRIMARY KEY,
);

CREATE TABLE raakaaine(
	id SERIAL PRIMARY KEY,
	rakategoria_id INTEGER REFERENCES rakategoria(id),
	name varchar(50) NOT NULL,
	sesonkiAlku DATE,
	sesonkiLoppu DATE,
	kilohinta decimal
);

CREATE TABLE resepti(
id SERIAL PRIMARY KEY,
kokkaaja_id INTEGER REFERENCES kokkaaja(id),
name varchar(50) NOT NULL,
kuvaus varchar(500) NOT NULL,
lisätty DATE
);

CREATE TABLE ainekset(
resepti_id INTEGER REFERENCES resepti(id),
raakaaine_id INTEGER REFERENCES raakaaine(id)
);

