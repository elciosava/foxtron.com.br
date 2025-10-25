<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $id = $_GET['id'];

        if(!empty($id && !empty($nome) && !empty($quantidade) && !empty($valor))){
            try{

        $sql = "UPDATE produto SET nome = :nome, quantidade = :quantidade, valor = :valor WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();

        echo "Deu certo seu anão.";
    }catch (PDOException $erro ){
        echo "Não procedeu. A tesoura comeu!!!" . $erro->getMessage();
    }
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Cinzel Decorative", serif; /* Fonte com cara mais vitoriana e agressiva */
    letter-spacing: 0.05em;
}

body {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(135deg, #1a120b 0%, #3e2c18 50%, #2b1d0e 100%);
    color: #d6c2a3; /* cor de latão envelhecido */
    text-shadow: 1px 1px 3px #2f1e0e;
}

h1 {
    margin-top: 40px;
    font-size: 3rem;
    text-transform: uppercase;
    color: #d17f2a; /* cobre oxidado */
    text-shadow:
      0 0 10px #a05b10,
      2px 2px 8px #4a2e0a,
      4px 4px 6px #301f07;
    border-bottom: 3px solid #a05b10;
    padding-bottom: 10px;
    font-weight: 900;
    font-family: "Cinzel Decorative", serif;
}

form {
    background: linear-gradient(145deg, #3b2f15, #2a220c);
    border: 3px solid #7f5217;
    border-radius: 12px;
    padding: 25px;
    width: 320px;
    box-shadow:
      inset 0 0 15px #7a5a1a,
      0 10px 20px rgba(0, 0, 0, 0.9);
}

form label {
    display: block;
    margin-top: 15px;
    font-weight: 900;
    color: #b5822a; /* ouro sujo */
    text-shadow: 1px 1px 2px #3a270a;
    font-size: 1.1rem;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 7px;
    border: 2px solid #8c6e27;
    border-radius: 6px;
    background-color: #241a06;
    color: #d6c2a3;
    font-weight: 600;
    font-family: "Cinzel Decorative", serif;
    box-shadow: inset 2px 2px 8px #3f2e0a;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input:focus {
    outline: none;
    border-color: #ffb700;
    box-shadow: 0 0 15px #ffb700, inset 0 0 8px #ffb700;
    background-color: #2f2309;
}

button {
    margin-top: 20px;
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(90deg, #7f5f1a, #d8a83a);
    color: #2a1e00;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    cursor: pointer;
    box-shadow:
      0 5px 15px rgba(216, 168, 58, 0.8),
      inset 0 -3px 5px #7f5f1a;
    transition: background 0.4s ease, box-shadow 0.4s ease, color 0.4s ease;
    font-family: "Cinzel Decorative", serif;
}

button:hover {
    background: linear-gradient(90deg, #d8a83a, #7f5f1a);
    box-shadow:
      0 0 25px #ffdd55,
      inset 0 0 10px #ffdd55;
    color: #1f1400;
    transform: scale(1.05);
}

.resultados {
    margin-top: 50px;
    width: 90%;
    max-width: 900px;
    background: linear-gradient(145deg, #3a2f16, #2e2309);
    border-radius: 14px;
    padding: 25px;
    border: 3px solid #a67e2a;
    box-shadow:
      inset 0 0 15px #7f5f1a,
      0 10px 25px rgba(50, 40, 15, 0.85);
    font-family: "Cinzel Decorative", serif;
    color: #ceb87d;
    font-weight: 600;
    letter-spacing: 0.05em;
}

.cabecalho, .linha {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    border-bottom: 2px solid #a67e2a;
}

.cabecalho {
    background: rgba(166, 126, 42, 0.3);
    font-weight: 900;
    color: #ffdd55;
    text-shadow: 0 0 5px #b38700;
    font-size: 1.2rem;
}

.cel_cabecalho {
    flex: 1;
    text-align: center;
}

.linha:nth-child(even) {
    background-color: rgba(255, 255, 255, 0.08);
    box-shadow: inset 0 0 10px #7a5a1a;
}

.acoes {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.acoes form {
    display: inline;
    margin: 0;
    padding: 0;
    border: none;
    background: none;
}

.acoes button {
    min-width: 110px;
    padding: 12px 18px;
    border-radius: 14px;
    font-size: 0.9rem;
    margin: 0;
    text-align: center;
    font-weight: 900;
    font-family: "Cinzel Decorative", serif;
    box-shadow: 0 3px 8px rgba(166, 126, 42, 0.7);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    letter-spacing: 0.12em;
}

.acoes form:first-child button {
    background: linear-gradient(90deg, #a67e2a, #d8b547);
    color: #3b2f09;
    border: 2px solid #7f5f1a;
}

.acoes form:last-child button {
    background: linear-gradient(90deg, #7b1a0e, #d02a15);
    color: #f0c6b1;
    border: 2px solid #520800;
    box-shadow: 0 3px 10px rgba(208, 42, 21, 0.8);
}

.acoes button:hover {
    transform: scale(1.1);
    box-shadow:
      0 0 15px #ffdd55,
      0 0 25px #ffb347;
    color: #1f1400;
}
</style>
    <section>
        <div class="colunameio">
            <form action="" method="post">

                <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">

               <label for="nome">Produto</label>
               <input type="text" name="nome" id="nome" required>

               <label for="quantidade">Quantidade</label>
               <input type="number" name="quantidade" id="">

               <label for="valor">Valor</label>
               <input type="number" name="valor" id="">

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
    </body>
    </html>