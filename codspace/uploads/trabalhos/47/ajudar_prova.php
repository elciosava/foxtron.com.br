<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        #sql {
            display: flex;
            justify-content: center;
        }
        .sql{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .texto, .quadrinho{
            border: red 1px solid;
            width: 500px;
            height: 300px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .quadrinho{
            background: #242424;
            color: white;
        }

    </style>
</head>
<body>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>insert</h2>
                <p>função: usado para adicionar novos dados em uma tabela.
                    pode receber informações diretamente de variaveis/constantes ou de campo em um formulario.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">INSERT INTO </span>clientes (nome, idade, cidade)
                    <span class="azul">VALUES >('joão', '30', 'são paulo')
                </p>
            </div></div>
     </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>insert</h2>
                <p>função: usado para consulta e recuperar a tabela
                </p>
            </div>
            <div class="quadrinho">
                <p>SELECT * FROM clientes WHERE condição
                </p>
            </div></div>
     </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>UPDATE</h2>
                <p>função atualiza dados existentes em uma tabela</p>
            </div>
            <div class="quadrinho">
                <p>UPDATE clientes SET coluna1 = valor1 WHERE condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELET</h2>
                <p>remove dados da tebela</p>
            </div>
            <div class="quadrinho">
                <p>UPDATE clientes SET coluna1 = valor1 WHERE condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
           <div class="texto">
                <h2>CREAT</h2>
                <p>cria uma tabela no banco de dados, por regra o primeiro campo deve ser o unico na 
                    tabela e ussdo como chave primaria(PRIMARY KEY)</p>
            </div>
            <div class="quadrinho">
                <p>CREAT TABLE nome_da_tabela (
                    id int
                    )</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
           <div class="texto">
                <h2>VARIAVEIS</h2>
                <p>função: variaveis podem ser usadas de duas formas principais, com uma 
                    informação já carregada no proprio programa ou recebendo informações de algum campo ou formulario</p>
            </div>
            <div class="quadrinho">
                <p> 
                    $nome = 'joão da silva'; </br>
                    $nome = $POST['nome'];
                </p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
           <div class="texto">
                <h2>IF</h2>
                <p>função: verificar dentro do documento se algua condição se
                    aplica antes de fazer alguma coisa, por exemplo verificar 
                    se o formulario foi enviado. 
                </p>
            </div>
            <div class="quadrinho">
                <p> 
                    $if = ($_SERER['REQUEST_METHOD'] === 'POST'){</br>}
                     $nome = $POST['nome']; </br>
                   
                </p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
           <div class="texto">
                <h2>CONEXAO</h2>
                <p>função: o arquivo serve para fazer ligação entre o programa
                    e o banco de dados. ultiliza 4 variaveis principais:
                </p>
            </div>
            <div class="quadrinho">
                <p> 
                    $local = 'localhost';</br>
                    $banco = 'nomedobanco';</br>
                    $usuario = 'root';</br>
                    $senha = '';</br>
                   
                </p>
            </div>
        </div>
    </section>
</body>
</html>