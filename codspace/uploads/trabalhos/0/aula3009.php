<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Document</title>
    <style>
        *{       
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .inicio{
            height: calc(100vh - 70px);
            background-color: aliceblue;     
        }
        header{
            height: 60px;
            background: blanchedalmond;        
            display: flex;
            align-items: center;
            padding-left: 20px;
        }
        .container{
            display: grid;          
            grid-template-columns: 1fr 3fr;
            gap: 10px;
            height: 100%;
            padding: 20px;
        } 
        .coluna{
            background-color: aquamarine;        
            overflow-y: auto;
            padding: 20px;
        }
        .coluna img {
            display: block;         
            margin: 20px auto 15px auto;
            max-width: 100%;
            height: auto;
        }
        .coluna p {
            font-size: 18px;          
            margin-bottom: 20px;
        }
        .emoji-container {
            font-size: 40px;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background: #e0f7fa;
            padding: 15px;
            border-radius: 8px;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        form textarea {
            width: 100%;
            height: 100px;        
            padding: 8px;        
            resize: vertical;        
            font-size: 16px;        
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
        }
        form button {
            background-color: #00796b;
            color: white;      
            border: none;
            padding: 10px 15px;      
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>
    <header>
        <h2>guilherme jv</h2>
    </header>
    <section class="inicio">
        <div class="container">
           
            <div class="coluna">
                <div class="emoji-container">
                    🦎 🐍 🌿
                </div>
                <p>
                    Camaleão é nome dado aos animais pertencentes à Família Chamaeleonidae. Acredita-se que existam entre 150 e 160 espécies diferentes de camaleões. Aqui daremos destaque a uma dessas espécies, o camaleão comum (Chamaeleo chamaeleon). Esses animais apresentam uma cabeça angulosa, onde estão presentes olhos que se movimentam independentemente, e uma língua expandida e coberta por muco. O seu corpo é estreito e apresenta uma cauda preênsil (capaz de prender).

                    Uma das características desses animais que mais chamam atenção é a sua capacidade de mudar de cor, o que lhes permite camuflar-se no ambiente, mas que possui também outras funções. Segundo a Lista Vermelha de Espécies Ameaçadas da União Internacional para a Conservação da Natureza e dos Recursos Naturais (IUCN), o camaleão comum está classificado como pouco preocupante (LC).
                </p>
                <form action="#" method="post">
                    <label for="mensagem">Deixe sua mensagem:</label>             
                    <textarea name="mensagem" id="mensagem" placeholder="Escreva aqui..."></textarea>
                    <button type="submit">Enviar</button>
                </form>
            </div>  

            <div class="coluna">
                <img src="MainBefore.jpg" alt="Imagem básica" />
            </div>      
        </div>
    </section>
</body>
</html>
