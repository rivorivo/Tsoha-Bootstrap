-- Lisää INSERT INTO lauseet tähän tiedostoon
-- kokkaaja-taulun testidata --
INSERT INTO kokkaajat (name, password) VALUES ('Rikke','Kikke23');
INSERT INTO kokkaajat (name, password) VALUES ('Sakke','Sakke32');
-- rakategoria-taulun testidata --
INSERT INTO rakategoriat (name) VALUES ('linssit ja pavut');

INSERT INTO reseptit (kokkaaja_id, name, kuvaus, lisatty) VALUES ('1','linssikeitto','lisää lisnssit ja ym.','03.03.2016');
INSERT INTO reseptit (kokkaaja_id, name, kuvaus, lisatty) VALUES ('2', 'lämpimät leivät', 'Voitele leivät, lisää 6viipaletta juustoa/leipä ja laita mikroon täysille minuutiksi.', '08.04.2016');