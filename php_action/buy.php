<?php
session_start();

require_once  'db_connect.php';

if (isset($_POST['btn-criar-venda'])) :
    $total = mysqli_escape_string($connect, 0);
    $confirmado = mysqli_escape_string($connect, false);
    $sql = "INSERT INTO documento (total, confirmado)  VALUES ('$total', '$confirmado')";

    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = "Compra criada com sucesso!";
    else :
        $_SESSION['mensagem'] = "Erro ao iniciar nova compra.";
    endif;
    header('Location: ../index.php');
elseif (isset($_POST['btn-finalizar-venda'])) :
    $total = mysqli_escape_string($connect, $_POST['total']);
    $confirmado = mysqli_escape_string($connect, true);
    $sql = "UPDATE documento SET total = '$total', confirmado = true where confirmado = false";
    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = "Compra finalizada com sucesso!";
    else :
        $_SESSION['mensagem'] = "Erro ao finalizar nova compra.";
    endif;
    header('Location: ../index.php');
endif;
