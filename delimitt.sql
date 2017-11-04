DELIMITTER //
CREATE TRIGGER restringirUsuario
BEFORE INSERT ON usuario FOR EACH ROW
BEGIN
	DECLARE
		vPer int;
	SELECT cod_tipo_usuario
		INTO vPer
		FROM permissao p
		WHERE p.cod_usuario = new.cod_usuario_alteracao;

		IF vPer != 1 THEN  --diferente ADM
			IF vPer == 3 THEN -- Professor -------COLOCO AQUI TODAS AS PERMISSÕES.


----EXCEPTION
        raise_application_error (-20001,'VOCÊ NÃO TEM PERMISSÃO - CONSULTE SEU ADMINISTRADOR');

  
		END IF;
END//


PESQUISAR EXCEPTION