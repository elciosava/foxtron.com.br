SELECT empresa.nome, entrada.quantidade AS entrada_quantidade, saida.quantidade AS saida_quantidade FROM empresa INNER JOIN entrada ON empresa.id = entrada.id_pecas INNER JOIN 
saida on empresa.id = saida.id_pecas;
