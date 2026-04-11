<?php 



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        * {
            margin: 0;
            padding: 0;
        }

      header {
        height: 80px;
        padding: 10px;
        background: black;
        color: white;
      }

      .inicio {
        background: black;
        height: calc(100vh - 100px);
      }

.container { 
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 10px;
}

.coluna {
    height: calc(100vh - 70px);
    background: gray;
}

li {
   display: flex;
   width: 80px;
   height: 80px;
   margin: 15px;

}

ul { 
    display: flex;
    width: 50px;
    height: 50vh;
    margin: 25px;
}

form { 
    display: flex;
    justify-content: center;
    padding-top: 20px;

}

.coluna input {
    width: 100%;
    padding: 5px;
    font-size: 1.1rem;
 }

 button {
    padding: 5px 10px;
    margin-top: 20px;

 }

 .coluna p {
    display: flex;
    padding: 10px 20px;
 }

    </style>
</head>
<body>

    <header>
       <h2>Anderson</h2>
    </header>

    <section class="inicio">
        <div class="container">

    <div class="coluna">

        <li><img src="envelope-solid-full.svg" alt=""></li>
        <li><img src="paperclip-solid-full.svg" alt=""></li>
        <li><img src="paper-plane-solid-full.svg" alt=""></li>

    </div>

    <div class="coluna">

        <ul><img src="in_Utero_(Nirvana)_album_cover.jpg" alt=""></ul>
        <h2>Nirvana</h2>
        <p>O Nirvana é uma banda de rock associada principalmente ao género grunge, mas também ao rock alternativo e ao punk rock.
             A banda de Seattle, formada em 1987, foi uma das principais representantes do grunge,
             popularizando o género na década de 1990 com a sua sonoridade agressiva,
              que combinava distorção, guitarras barulhentas, melodia e berros. </p>

        <form action="" method="get">
            <label for="nome">Usurario</label>
            <input type="text" name="nome" id="" >

            <label for="email">Email</label>
            <input type="email" name="email" id="" >

            <label for="email">Destino</label>
            <input type="email" name="email" id="" >

            <label:text>Mensagem</label:text>
            <input type="text" name="text" id="">

            <button type="submit">Enviar</button>

        

    </div>

        </div>
    </section>

</body>
</html>