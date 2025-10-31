SELECT pecas.nome_peca, entrada.quantidade
AS entrada_quantidade, saida.quantidade AS
saida_quantidade FROM pecas INNER JOIN 
entrada ON pecas.id = entrada.id_pecas INNER
JOIN saida on pecas.id = saida.id_pecas;