<?php

    require 'conexao.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $codigo = (int)$_POST["codigo"];
        $nome = $_POST["nome"];
        $idade = (int)$_POST["idade"];
        $email = $_POST["email"];

        $sql = "UPDATE PESSOA SET NOME = ?, IDADE = ?, EMAIL = ? WHERE CODIGO = ?";
        $stm = $conexao->prepare($sql);
        $stm->bind_param("sisi", $nome, $idade, $email, $codigo);

        if($stm->execute())
            echo "Usuário $codigo atualizado com sucesso";
        else
            echo "Erro ao atualizar usuário $stm->error";

        $stm->close();

        $conexao->close();
    }