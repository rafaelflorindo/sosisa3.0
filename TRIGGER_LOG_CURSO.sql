DELIMITER //
CREATE TRIGGER insertLogCurso 
  AFTER INSERT ON curso FOR EACH ROW
BEGIN
  INSERT Tabela Log
  (new.cod_usuario_coordenador,
                   new.codigo,
				   new.cod_usuario_alteracao);
END //

DELIMITER //
CREATE TRIGGER updateLogCurso 
  AFTER UPDATE ON curso FOR EACH ROW
BEGIN
  INSERT Tabela Log
  (new.cod_usuario_coordenador,
                   new.codigo,
				           new.cod_usuario_alteracao);
END //

DELIMITER //
CREATE PROCEDURE inserirTabelaLog 
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
