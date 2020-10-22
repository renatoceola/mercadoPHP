<?php
session_start();

require_once  'db_connect.php';

if (isset($_GET['documento'])) :
    $documento = mysqli_escape_string($connect, $_GET['documento']);
    $produto = mysqli_escape_string($connect, $_GET['produto']);

    if ($documento != null && $produto != null) :
        $sql = "INSERT INTO ITEM (documento, produto) values ($documento, $produto)";

        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        else :
            $_SESSION['mensagem'] = "Não foi possível adicionar o produto a venda.";
        endif;
        header('Location: ../lista_produtos.php');
    else :
        $_SESSION['mensagem'] = "Não foi possível adicionar o produto a venda.";
    endif;
    header('Location: ../index.php');
else :
    $_SESSION['mensagem'] = "Não foi possível adicionar o produto a venda.";
    header('Location: ../index.php');
endif;
