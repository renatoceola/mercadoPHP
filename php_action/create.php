<?php
session_start();

require_once  'db_connect.php';

if (isset($_POST['btn-cadastrar'])) :
    $descricao = mysqli_escape_string($connect, $_POST['descricao']);
    $preco = mysqli_escape_string($connect, $_POST['preco']);

    if ($descricao != null && $preco != null) :
        $sql = "INSERT INTO produto (descricao, preco)  VALUES ('$descricao', '$preco')";

        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        else :
            $_SESSION['mensagem'] = "Erro ao cadastrar";
        endif;
        header('Location: ../lista_produtos.php');
    else :
        $_SESSION['mensagem'] = "Por favor informe um valor para todos os campos.";
        header('Location: ../adicionar.php');
    endif;
endif;
