<?php
    $local = 'localhost';
    $banco = 'pedropacheco';
    $usuario = 'root';
    $senha ='';


        try {
            $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
            $conexao->setAtributte(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die("deu ruim coisa!!" . $e->getmessage());
        } 

?>







SELECT professores.nome, materias.materia
FROM `professores` AS professores INNER JOIN
 materias AS materias WHERE professores.id = 
 materias.id_professores;