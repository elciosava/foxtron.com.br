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
            background: green;        
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
            background-color: green;        
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
        <h2>Felipe</h2>
    </header>
    <section class="inicio">
        <div class="container">
           
            <div class="coluna">
                <div class="emoji-container">
                    
                </div>
               
                <form action="#" method="post">
                    <label for="mensagem">Deixe sua mensagem:</label>             
                    <textarea name="mensagem" id="mensagem" placeholder="Escreva aqui..."></textarea>
                    <button type="submit">Enviar</button>
                </form>
            </div>  

            <div class="coluna">
                <img src="png.1.jpg" alt="Imagem básica" />
                <p>
                Cariani explica que a motivação não é constante, e que haverá dias em que ela será inexistente. Nesses momentos, a disciplina se torna essencial, pois é ela que impulsiona a pessoa a agir e cumprir suas obrigações, mesmo sem vontade. A disciplina permite superar a falta de motivação, levando a pessoa a levantar e fazer o que precisa ser feito, reconhecendo que seu esforço, vontade e disciplina são fundamentais. 
                </p>
            </div>      
        </div>
    </section>
</body>
</html>