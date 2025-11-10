<?php







?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 body {
    margin: 0;
    padding: 0;
    font-family: "Segoe UI", Arial, sans-serif;
    font-size: 16px;
    background: #f0f4f8; /* fundo claro e suave */
    color: #222; /* texto padrão escuro */
}

#sql {
    display: flex;
    justify-content: center;
    padding: 30px 0;
}

.sql {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

/* estilos base dos blocos */
.texto, .quadrinho {
    border: none;
    width: 700px;
    height: 100px;
    padding: 20px;
    border-radius: 16px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

/* quando passa o mouse */
.texto:hover, .quadrinho:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25);
}

/* bloco texto - azul degradê */
.texto {
    background: linear-gradient(135deg, #268542ff, #30a553ff);
    color: #fff;
}

/* bloco quadrinho - roxo com contraste */
.quadrinho {
    background: linear-gradient(135deg, #8e44ad, #6c3483);
    color: #fff;
}
    </style>
</head>
<body>
   <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>INSERT</h2>
            <p>funçao: usado para adicionar novos dados em uma tabela.
              pode receber informaçao diretamente de variaveis/constantes
              ou de campos em um formularios.
           
            </p>
         </div>
         <div class="quadrinho">
            <p>INSERT INTO clientes (nome, idade, cidade,)
                VALUES ('joao', 30, 'sao paulo');</p>
            



         </div>
    </div>
   </section> 
    <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>SELECT</h2>
            <p>funçao: utilizado para conultar e recuperar dados de uma tabela.
            </p>
         </div>
         <div class="quadrinho">
            <p>SELECT * FROM clientes WHERE condiçao;</p>
            



         </div>
    </div>
   </section> 
    <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>UPDATE</h2>
            <p>funçao: utilizado para conultar e recuperar dados de uma tabela.
            </p>
         </div>
         <div class="quadrinho">
            <p>UPDATE clientes SET coluna1 = valor1 WHERE condiçao;</p>
            



         </div>
    </div>
   </section> 
   <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>DELETE</h2>
            <p>funçao: remover daos de uma tabela.
            </p>
         </div>
         <div class="quadrinho">
            <p>DELETE  FROM clientes WHERE condiçoes;</p>
            



         </div>
    </div>
   </section> 
   <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>CREATE TABLE</h2>
            <p>funçao: cria uma tabela no bando de dados, por regra o primeiro
                campo deve ser unico na tabela e usado como chave primaria.
            </p>
         </div>
         <div class="quadrinho">
            <p>CREATE TABLE nome_da_tabela (
                id int AUTO_INCREMENT PRIMART KEY,
                coluna2 tipo_dado,
                ...
            );
            </p>
            

         </div>
    </div>
   </section> 
   <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>VARIAVEL</h2>
            <p>funçao: variaveis podem ser usadasq de duas formas pricipais,
                com uma informaçao ja carregada no proprio programa ou
                recebendo informaçaode algum campo ou formulario.

            </p>
         </div>
         <div class="quadrinho">
            <p>$nome ='joao da silva'; <</br>
            $nome = $_POST['nome'];
            </p>
            

         </div>
    </div>
   </section> 
   <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>IF</h2>
            <p>funçao: verificar dentro do documento se alguma condiçoes aplica
                antes de fazer alguma coisa.

            </p>
         </div>
         <div class="quadrinho">
            <p>if ($_SERVER['REQUEST_METHOD'] === 'POST'){</br>
            $nome = $_POST['nome']; </br> 
        }
            </p>
            

         </div>
    </div>
   </section> 
   <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>CONEXAO</h2>
            <p>funçao: o arquivo de conexao serve para fazer a ligacao entre o
                programa e o banco. utiliza 4 variaveis pricipais:

            </p>
         </div>
         <div class="quadrinho">
            <p> $local = 'localhost';</br>
                $banco = 'nomedobanco';</br>
                $usuario = 'usuario';</br>
                $senha = '';</br>
            </p>
            

         </div>
    </div>
   </section> 
   

   
   

</body>
</html>