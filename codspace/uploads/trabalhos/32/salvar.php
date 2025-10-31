SELECT pecas.pecas, entrada.quantidade AS saida_quantidade FROM pecas INNER JOIN entrada ON pecas.id = entrada.id_pecas INNER JOIN saida ON pecas.id = saida.id_pecas;
