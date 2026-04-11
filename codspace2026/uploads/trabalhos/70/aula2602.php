<?php
$preto = $_POST['preto'];
$rgb = $_POST['rgb'];

echo $preto;
echo $rgb;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>preto</title>
    <style>
        
    </style>
</head>
<body>
    <header>
        <style>
        *{
            margin:0;
            padding:0;
        }
        .container{
            width: 300px;
            display:flex;
            justify-content: center;
            align-items: center;
            border :solid 1px black;
            padding: 10px;
        }

        input{
            width:100%;
            box-sizing: border-box;


        }

        header{
            background: #0de088ca;
            height:50px;
            padding: 5px 0 5px 0;
            width:100vw
        }
        body{
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
        }
        .formdata{
        width: 200px;
        }

        input[type="date"]{
            width: 100%;
        box-sizing: border-box;
        }

        

        
        </style>
    </header>
    
    <section id="inicio">
        <div class="container">
            <form action="" method="post">

                <label for="preto">preto</label>
               <input type="text" name="preto" id=""> 
                <label for="rgb">rgb</label>
                <input type="color" name="rgb" id="">
                <button>enviar</button>
            </form>
            
            
        </div>
    </section>
    <section id="corpo">
        <form action="" method="post" class="formdata">

            <label for="datainicial">data inicial</label>
            <input type="date" name="datainicial" id="">

            <label for="datafinal">data final</label>
            <input type="date" name="datafinal" id="">
    
            <button type="submit">enviar</button>
        </form>

    </section>
</body>
</html>