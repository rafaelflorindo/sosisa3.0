DELIMITER //
CREATE TRIGGER insertPermissaoUsuario
  BEFORE INSERT ON usuario FOR EACH ROW
BEGIN
  INSERT Tabela usuario
  (new.cod_usuario_coordenador,
                   new.codigo,
				   new.cod_usuario_alteracao);
END //

DELIMITER //
CREATE TRIGGER updatePermissaoUsuario 
  BEFORE UPDATE ON usuario FOR EACH ROW
BEGIN
  INSERT Tabela usuario
  (new.cod_usuario_coordenador,
                   new.codigo,
				           new.cod_usuario_alteracao);
END //





  

delimiter //
CREATE TRIGGER nomedoTrigger after INSERT ON usuario_voto
FOR EACH ROW
BEGIN
Aqui você coloca a estrutura do trigger.
END //
delimiter ;





DELIMITER //
CREATE PROCEDURE inserirPermissaoUsuario
(cod_usuario_coordenador int,
 codigo int, 
 cod_usuario_alteracao int)
BEGIN
  INSERT INTO log
  (nome_tabela, log, chave, data, cod_usuario)
  VALUES
  ('curso', 
   concat('inseriu Coord: ', cod_usuario_coordenador), 
   concat('codigo=', codigo),
   now(),
   cod_usuario_alteracao);
END
