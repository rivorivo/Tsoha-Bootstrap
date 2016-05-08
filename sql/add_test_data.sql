-- Lisää INSERT INTO lauseet tähän tiedostoon
-- kokkaaja-taulun testidata --
INSERT INTO kokkaajat (username, password) VALUES ('Testikokki','Testisana');
INSERT INTO kokkaajat (username, password) VALUES ('admin','admin1');
-- rakategoria-taulun testidata --
INSERT INTO rakategoriat (name) VALUES ('linssit ja pavut');
INSERT INTO rakategoriat (name) VALUES ('vihannekset');
INSERT INTO rakategoriat (name) VALUES ('hedelmät');
INSERT INTO rakategoriat (name) VALUES ('juurekset');
INSERT INTO rakategoriat (name) VALUES ('lihat');
INSERT INTO rakategoriat (name) VALUES ('kalat ja äyriäiset');
INSERT INTO rakategoriat (name) VALUES ('maitotuotteet');
INSERT INTO rakategoriat (name) VALUES ('viljatuotteet');

INSERT INTO raakaaineet (rakategoria_id, name, kilohinta) VALUES ('1','linssi','10.00');
INSERT INTO raakaaineet (rakategoria_id, name, kilohinta) VALUES 
('2','tomaatti','4.00');
INSERT INTO raakaaineet (rakategoria_id, name, kilohinta) VALUES 
('7','kermajuusto','6.00');
INSERT INTO raakaaineet (rakategoria_id, name, kilohinta) VALUES 
('8','ruisleipä','5.00');

INSERT INTO reseptit (kokkaaja_id, name, kuvaus, lisatty) VALUES ('1','linssikeitto','lisää lisnssit ja ym.',NOW());
INSERT INTO reseptit (kokkaaja_id, name, kuvaus, lisatty) VALUES ('2','lämpimät leivät','Voitele leivät, lisää 6viipaletta juustoa/leipä ja laita mikroon täysille minuutiksi.',NOW());
