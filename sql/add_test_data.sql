-- Lisää INSERT INTO lauseet tähän tiedostoon
-- kokkaaja-taulun testidata --
INSERT INTO kokkaajat (username, password) VALUES ('Rikke','Kikke23');
INSERT INTO kokkaajat (username, password) VALUES ('Sakke','Sakke32');
-- rakategoria-taulun testidata --
INSERT INTO rakategoriat (name) VALUES ('linssit ja pavut');
INSERT INTO rakategoriat (name) VALUES ('vihannekset');

INSERT INTO raakaaineet (rakategoria_id, name, kilohinta) VALUES ('1','linssi','10.00');
INSERT INTO raakaaineet (rakategoria_id, name, kilohinta) VALUES 
('2','tomaatti','4.00');

INSERT INTO reseptit (kokkaaja_id, name, kuvaus, lisatty) VALUES ('1','linssikeitto','lisää lisnssit ja ym.',NOW());
INSERT INTO reseptit (kokkaaja_id, name, kuvaus, lisatty) VALUES ('2','lämpimät leivät','Voitele leivät, lisää 6viipaletta juustoa/leipä ja laita mikroon täysille minuutiksi.',NOW());

INSERT INTO ainekset (resepti_id, raakaaine_id) VALUES ('1','1');
