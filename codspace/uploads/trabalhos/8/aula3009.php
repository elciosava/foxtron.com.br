<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
            margin: 0;
            padding: 0;
        }
     header {
                display: flex;
                justify-content: space-around;
                align-items: center;
                height: 50px;
                padding: 10px;
                background: purple;
            }
            .inicio {
                height: calc(100vh - 70px);
                background: blue;
            }
            .container {
                display: grid;
                grid-template-columns: 1fr 3fr;
                gap: 10px;
            }
            .coluna {
                height: calc(100vh - 70px);
                background: rgb(255,0,0);
            }
</style>
<body>
     <header>
        <h2>Luiz Sloboda</h2>
     </header>

     <section class="inicio">
        <div class="container">
            <div class="coluna"> </div>
            <div class="coluna"> </div>
        </div>
        
     </section>
      
</body>
</html>